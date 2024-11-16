<?php

namespace App\Models;

use App\Observers\TransactionObserver;
use App\Policies\TransactionPolicy;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// #[ObservedBy(TransactionObserver::class)]

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
        'user_id',
    ];

    // add api guard to the model
    protected $guard = 'api';

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
