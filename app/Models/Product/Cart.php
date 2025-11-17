<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'cart_id';

    protected $table = 'cart';

    protected $fillable = [
        'product_id',  // Changed from 'pro_id'
        'name',
        'image',
        'price',
        'quantity',
        'user_id',
    ];

    public $timestamps = true;

    // Relationship with Product
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    // Relationship with User
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }
}
