<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    // protected $table='products';
    // protected $primaryKey = 'id';
    protected $fillable = [
      'name',
      'description',
      'color',
      'size',
      'sale_price',
      'regular_price',
      'discount',
      'thumbnail',
      'category_id',
      'stock_qty',
      'user_id',
    ];

}
