<x-layout>
    <!-- Main content -->
    <div class="content pt-5">
        <div class="d-flex justify-content-center">
            <!-- /.col-md-6 -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="col-6">
                            <h5 class="m-0">Edit Profile</h5>
                        </div>
                        <div class="col-6 d-flex justify-content-end">
                            <!-- Button trigger modal -->
                            <a class="btn btn-primary" href="/profile" role="button">
                                <i class="fa-solid fa-arrow-left"></i>
                                <span class="button-text">Go Back</span>
                            </a>
                        </div>
                    </div>
                    <form method="POST" action="/user/edit-profile" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="mb-3">
                                <h3>Account Information</h3>
                                <div class="mb-3">
                                    <label for="name" class="col-sm-3 col-form-label">Name</label>
                                    <input type="hidden" name="id" id="my_id" value="{{ auth()->user()->id }}">
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Enter your name" value="{{ auth()->user()->name }}">

                                    @error('name')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="col-sm-3 col-form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="Enter your email" value="{{ auth()->user()->email }}">

                                    @error('email')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="birthdate" class="col-sm-3 col-form-label">Birthdate</label>
                                    <input type="date" class="form-control" id="birthdate" name="birthdate"
                                        value="{{ auth()->user()->birthdate }}">

                                    @error('birthdate')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="contact-number" class="col-sm-3 col-form-label">Contact Number</label>
                                    <input type="text" class="form-control" id="contact-number" name="contact_number"
                                        name="contact_number" placeholder="Enter your contact number"
                                        value="{{ auth()->user()->contact_number }}">

                                    @error('contact_number')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="address" class="col-sm-3 col-form-label">Address</label>
                                    <input type="text" class="form-control" id="address" name="address"
                                        placeholder="Enter your address" value="{{ auth()->user()->address }}">

                                    @error('address')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="profile_image" class="col-sm-3 col-form-label">Profile Image</label>
                                    <input class="form-control" type="file" id="profile_image" name="profile_image"
                                        value="{{ auth()->user()->profile_image }}">

                                    @error('profile_image')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                                <h3>Change Password</h3>
                                <div class="mb-3">
                                    <label for="old_password" class="col-sm-3 col-form-label">Old Password</label>
                                    <input type="password" class="form-control" id="old_password" name="old_password"
                                        value="{{ old('old_password') }}">

                                    @error('old_password')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="col-sm-3 col-form-label">New Password</label>
                                    <input type="password" class="form-control" id="password" name="password"
                                        value="{{ old('password') }}">

                                    @error('password')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="password_confirmation" class="col-sm-3 col-form-label">Confirm
                                        Password</label>
                                    <input type="password" class="form-control" id="password_confirmation"
                                        name="password_confirmation" value="{{ old('password_confirmation') }}">

                                    @error('password_confirmation')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa-solid fa-check"></i>
                                Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.col-md-6 -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</x-layout>