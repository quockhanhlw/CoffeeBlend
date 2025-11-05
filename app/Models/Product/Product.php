<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'product_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */

    protected $table = 'products';
    
    protected $fillable = [
        'product_name',  // Changed from 'name'
        'product_image', // Changed from 'image'
        'price',
        'quantity',
        'description',
        'type',
    ];

    public $timestamps = true;

    // Accessor for backward compatibility (if needed)
    public function getNameAttribute()
    {
        return $this->product_name;
    }

    public function getImageAttribute()
    {
        return $this->product_image;
    }
}