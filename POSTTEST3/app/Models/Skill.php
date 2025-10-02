<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category',
        'description',
        'level',
        'is_featured',
        'color'
    ];

    protected $casts = [
        'is_featured' => 'boolean'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}