<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    // Show Login Form
    public function showLogin() {
        return view('pages.index');
    }

    // Authenticate User
    public function authenticate(Request $request) {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if(auth()->attempt($formFields)) {
            $request->session()->regenerate();
            Alert::success('Success', 'Login Successfully!');

            if(auth()->user()->level_of_access == 'Administrator') {
                return redirect('/user/lists');
            }
            elseif(auth()->user()->level_of_access == 'Staff') {
                return redirect('/profile');
            }
            else {
                return redirect('/profile');
            }
        } else {
            Alert::error('Error', 'Invalid Credentials!');
            return back();
        }
    }

    // Show Forgot Password
    public function showForgotPassword() {
        return view('pages.forgot-password');
    }

    // Forgot Password
    public function forgotPassword(Request $request) {
        $request->validate([
            'email' => 'required|email|exists:users,email'
        ]);

        $token = Str::random(60);

        DB::table('password_resets')->insert(
            ['email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()]
        );

        Mail::send('auth.reset-verify-email',['token' => $token, 'email' => $request->email], function($message) use ($request) {
            $message->from('jbevangelista.0107@gmail.com');
            $message->to($request->email);
            $message->subject('Reset Password Notification');
        });

        Alert::success('Success', 'We have e-mailed your password reset link!');
        return back();
    }

    // Show Reset Password 
    public function showResetPassword($token) {
        return view('auth.reset', ['token' => $token]);
    }

    // Reset Password
    public function resetPassword(Request $request) {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required',
        ]);
        
        $updatePassword = DB::table('password_resets')
                            ->where(['email' => $request->email, 'token' => $request->token])
                            ->first();

        if(!$updatePassword){
            Alert::error('Error', 'Invalid Token!');
            return back();
        } else {
            User::where('email', $request->email)
                ->update(['password' => Hash::make($request->password)]);
        
            DB::table('password_resets')->where(['email'=> $request->email])->delete();

            Alert::success('Success', 'Your Password Reset Successfully!');
            return redirect('/');
        }
    }

    // Routes Without Parameter
    // Show Create Password
    public function showCreatePassword($token) {
        return view('auth.create', ['token' => $token]);
    }

    // Create Password
    public function createPassword(Request $request) {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required',
        ]);
        
        $updatePassword = DB::table('password_create')
                            ->where(['email' => $request->email, 'token' => $request->token])
                            ->first();

        if(!$updatePassword){
            Alert::error('Error', 'Invalid Token!');
            return back();
        } else {
            $user = User::where('email', $request->email)
                      ->update(['password' => Hash::make($request->password)]);
        
            DB::table('password_create')->where(['email'=> $request->email])->delete();

            Alert::success('Success', 'Your Password Created Successfully!');
            return redirect('/');
        }
    }

    // Logout User
    public function logout(Request $request) {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        Alert::success('Success', 'Logout Successfully!');
        return redirect('/');
    }

    // Show Profile
    public function showProfile() {
        return view('pages.profile');
    }

    // Show Edit Profile
    public function showEditProfile() {
        return view('pages.edit-profile');
    }

    // Update Profile
    public function updateProfile(Request $request) {
        if($request->id != auth()->user()->id) {
            abort(403, 'Unauthorized Action');  
        }

        if($request->old_password) {
            $hashedPassword = auth()->user()->password;
            if(!Hash::check($request->old_password  ,$hashedPassword)) {
                Alert::error('Error', 'Invalid Old Password!');
                return back();
            }

            $formFields = $request->validate([
                'name' => ['required'],
                'email' => ['required'],
                'contact_number' => ['required'],
                'address' => 'required',
                'birthdate' => 'required',
                'profile_image' => 'mimes:jpeg,png,jpg,gif,svg',
                'password' => 'required|confirmed|min:6'
            ]);

            // Hash Password
            $formFields['password'] = bcrypt($formFields['password']);

            if($request->hasFile('profile_image')) {
                $formFields['profile_image'] = $request->file('profile_image')->store('profile-images', 'public');
            }

            // Update Profile
            User::where('email', $request->email)
                ->update($formFields);

            Alert::success('Success', 'Account Updated Successfully!');
            return redirect('/profile');
        } else {
            $formFields = $request->validate([
                'name' => ['required'],
                'email' => ['required'],
                'contact_number' => ['required'],
                'address' => 'required',
                'birthdate' => 'required',
                'profile_image' => 'mimes:jpeg,png,jpg,gif,svg'
            ]);

            if($request->hasFile('profile_image')) {
                $formFields['profile_image'] = $request->file('profile_image')->store('profile-images', 'public');
            }

            // Create User
            User::where('email', $request->email)
                ->update($formFields);

            Alert::success('Success', 'Account Updated Successfully!');
            return redirect('/profile');
        }
    }

    // Show Users List
    public function showUsersList () {
        return view('pages.users-list', [
            'users' => User::latest()->filter(request(['search']))->paginate(10)
        ]);
    }

    // Show Add User
    public function showAddUser () {
        return view('pages.add-user');
    }

    // Create New User
    public function createUser(Request $request) {
        // dd($request('store'));
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'contact_number' => ['required', Rule::unique('users', 'contact_number')],
            'address' => 'required',
            'store' => ['nullable', Rule::unique('users', 'store')],
            'birthdate' => 'required',
            'level_of_access' => 'required'
        ]);
        
        $token = Str::random(60);

        DB::table('password_create')->insert(
            ['email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()]
        );

        Mail::send('auth.create-verify-email',['token' => $token, 'email' => $request->email], function($message) use ($request) {
            $message->from('jbevangelista.0107@gmail.com');
            $message->to($request->email);
            $message->subject('Create Password Notification');
        });

        // Create User
        User::create($formFields);

        Alert::success('Success', 'Successfully Add New Record');
        return redirect('/user/lists');
    }

    // Show Edit User
    public function showEditUser(User $user) {
        return view('pages.edit-user', ['user' => $user]);
    }

    // Update User
    public function updateUser(Request $request, User $user) {
        $formFields = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'contact_number' => ['required'],
            'address' => 'required',
            'store' => ['nullable'],
            'birthdate' => 'required',
            'level_of_access' => 'required'
        ]);

        // Update User
        $user->update($formFields);

        Alert::success('Success', 'Successfully Update User');
        return redirect('/user/lists');
    }

    // Delete User
    public function deleteUser(User $user) {
        // Delete User
        $user->delete();

        Alert::success('Success', 'Successfully Delete User');
        return redirect('/user/lists');
    }

    public function searchProfile() {
        if (request('search')) {
            $users = User::where('name', 'like', '%' . request('search') . '%')
                    ->orWhere('email', 'like', '%' . request('search') . '%')
                    ->orWhere('contact_number', 'like', '%' . request('search') . '%')
                    ->orWhere('address', 'like', '%' . request('search') . '%')
                    ->orWhere('store', 'like', '%' . request('search') . '%')
                    ->orWhere('level_of_access', 'like', '%' . request('search') . '%')->get();
        } else {
            $users = User::all();
        }

        return view('pages.search-profile', [
            'users' => $users
        ]);
    }

    // Show Error Page
    public function showErrorPage() {
        if(auth()->user()->level_of_access == 'Administrator') {
            return redirect('/user/lists');
        }
        elseif(auth()->user()->level_of_access == 'Staff') {
            return redirect('/profile');
        }
        else {
            return redirect('/profile');
        }
    }
}
