<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'gig_id',
        'status',
        'total_amount',
        'delivery_date',
        'notes'
    ];

    protected $casts = [
        'total_amount' => 'decimal:2',
        'delivery_date' => 'date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function gig()
    {
        return $this->belongsTo(Gig::class);
    }

    public function review()
    {
        return $this->hasOne(Review::class);
    }
}