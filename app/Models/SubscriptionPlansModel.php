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

    public static function freePlan()
    {
        return static::where('price', 0)->first();
    }

    public function subscriptions(){
        return $this->hasMany(UserSubscriptionsModel::class, 'subscription_plan_id');
    }
}
