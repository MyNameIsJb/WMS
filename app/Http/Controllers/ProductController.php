<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    // Show Product Registration
    public function showProductsList() {
        return view('pages.products-list', [
            'products' => Product::latest()->filter(request(['search']))->paginate(10)
        ]);
    }

    // Show Add Product
    public function showAddProduct() {
        return view('pages.add-product');
    }

    // Add Product
    public function createProduct(Request $request) {
        $formFields = $request->validate([
            'product_id' => ['required', 'min:3', Rule::unique('products', 'product_id')],
            'brand_name' => 'required',
            'item_description' => 'required',
            'model' => 'required',
            'color' => 'required',
            'quantity' => 'required',
            'price_per_unit' => 'required'
        ]);

        // Create Product
        Product::create($formFields);

        Alert::success('Success', 'Successfully Add New Record');
        return redirect('/product/lists');
    }

    public function showEditProduct(Product $product) {
        return view('pages.edit-product', ['product' => $product]);
    }

    public function updateProduct(Request $request, Product $product) {
        $formFields = $request->validate([
            'product_id' => ['required'],
            'brand_name' => 'required',
            'item_description' => 'required',
            'model' => 'required',
            'color' => 'required',
            'quantity' => 'required',
            'price_per_unit' => 'required'
        ]);

        $product->update($formFields);

        Alert::success('Success', 'Successfully Update Product');
        return redirect('/product/lists');
    }

    public function deleteProduct(Product $product) {
        // Delete Product
        $product->delete();

        Alert::success('Success', 'Successfully Delete Product');
        return redirect('/product/lists');
    }

    public function showWarehouseInventory() {
        return view('pages.warehouse-inventory', [
            'products' => Product::latest()->filter(request(['search']))->paginate(10)
        ]);
    }
}
