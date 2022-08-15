<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreProduct extends Model
{
    use HasFactory;

    public function scopeFilter($query, array $filters) {
        if($filters['search'] ?? false) {
            $query->where('product_id', 'like', '%' . request('search') . '%')
            ->orWhere('brand_name', 'like', '%' . request('search') . '%')
            ->orWhere('item_description', 'like', '%' . request('search') . '%')
            ->orWhere('model', 'like', '%' . request('search') . '%')
            ->orWhere('color', 'like', '%' . request('search') . '%')
            ->orWhere('quantity', 'like', '%' . request('search') . '%')
            ->orWhere('price_per_unit', 'like', '%' . request('search') . '%')
            ->orWhere('store', 'like', '%' . request('search') . '%');
        }
    }
}
