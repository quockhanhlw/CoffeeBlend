<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'booking_id';

    protected $table = 'bookings';

    protected $fillable = [
        'first_name',
        'last_name',
        'date',
        'time',
        'phone',
        'message',
        'user_id',
        'status',
    ];

    public $timestamps = true;

    // Relationship with User
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }
}
