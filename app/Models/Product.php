<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'price_sale',
        'quantity',
        'pl',
        'image',
        'category_id',
        'stock',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
