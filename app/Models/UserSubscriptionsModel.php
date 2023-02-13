<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSubscriptionsModel extends Model
{
    use HasFactory;
    protected $table="user_subscriptions";

    protected $fillable = [
        'user_id',
        'subscription_plan_id',
        'status',
        'renewal_at',
    ];
    
    public function plan(){
        return $this->belongsTo(SubscriptionPlansModel::class, 'subscription_plan_id');
    }
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    
}
