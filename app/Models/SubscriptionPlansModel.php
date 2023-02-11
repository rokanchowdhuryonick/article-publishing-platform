<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionPlansModel extends Model
{
    use HasFactory;

    protected $table="subscription_plans";

    protected $fillable = [
        'name',
        'price',
        'currency',
        'interval'
    ];
}
