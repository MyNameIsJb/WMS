<?php

namespace App\Http\Controllers;

use App\Models\IncomingProduct;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class IncomingProductController extends Controller
{
    // Show Incoming Product
    public function showIncomingProduct() {
        return view('pages.incoming-product', [
            'products' => IncomingProduct::latest()->filter(request(['search']))->paginate(10)
        ]);
    }

    // Show Order Product
    public function showOrderProduct() {
        return view('pages.order-product', ['users' => User::all()]);
    }

    public function orderProduct(Request $request) {
        // dd($request);
        $formFields = $request->validate([
            'staff' => 'required',
            'brand_name' => 'required',
            'item_description' => 'required',
            'model' => 'required',
            'color' => 'required',
            'quantity' => 'required',
            'price' => 'required'
        ]);

        // Create Product
        IncomingProduct::create($formFields);

        Alert::success('Success', 'Successfully Add New Record');
        return redirect('/incoming-product');
    }
}
