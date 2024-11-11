<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'amount',
        'status',
        'reference',
        'phone_number',
        'load_service',
        'description',
    ];

    // add api guard to the model
    protected $guard = 'api';

    // add boot method to automatically set user_id to the authenticated user
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($transaction) {
            $transaction->user_id = auth()->id();
        });
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
