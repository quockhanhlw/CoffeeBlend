<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'order_id';

    protected $table = 'orders';

    protected $fillable = [
        'first_name',
        'last_name',
        'state',
        'address',
        'city',
        'zip_code',
        'phone',
        'email',
        'price',
        'user_id',
        'status',
    ];

    // Relationship with OrderItems
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'order_id', 'order_id');
    }

    // Relationship with User
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'user_id');
    }
}
