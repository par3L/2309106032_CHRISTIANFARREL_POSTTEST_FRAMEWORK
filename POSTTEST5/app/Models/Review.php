<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'gig_id',
        'order_id',
        'rating',
        'comment',
        'helpful_count'
    ];

    protected $casts = [
        'rating' => 'integer',
        'helpful_count' => 'integer'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function gig()
    {
        return $this->belongsTo(Gig::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}