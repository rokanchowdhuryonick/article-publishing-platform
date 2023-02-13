<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'user_type'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = [
        'is_admin',
        'is_premium_user'
    ];

    public function getIsAdminAttribute(){
        if($this->user_type=='1'){
            return true;
        }
        return false;
    }
    
    public function subscription(){
        return $this->hasOne(UserSubscriptionsModel::class, 'user_id');
    }

    public function getIsPremiumUserAttribute(){
        $subscription = $this->subscription()->first();
        if($subscription->status =='active'){
            $plan = $subscription->plan()->first();
            // dd($plan);
            if( $plan->price > 0){
                return true;
            }
        }
        return false;
    }

    public function posts(){
        return $this->hasMany(PostModel::class, 'user_id');
    }

    public function upgradeToPremium()
    {
        // $this->subscription()->create();
    }

    public function downgradeToFree()
    {
        
    }

    
}
