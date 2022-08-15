<?php

namespace App\Http\Controllers;

use App\Models\StoreProduct;
use Illuminate\Http\Request;

class StoreProductController extends Controller
{
    // Show Store Inventory
    public function showStoreInventory() {
        return view('pages.store-inventory', [
            'products' => StoreProduct::latest()->filter(request(['search']))->paginate(10)
        ]);
    }
}
