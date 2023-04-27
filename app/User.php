<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens,Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function customer_orders()
    {
        return $this->hasMany(Order::class,'user_id')->where('status','!=','not_ready');
    }

    public function orders()
    {
        return $this->hasMany(Order::class,'provider_id')->where('status','!=','not_ready');
    }
    public function cities()
    {
        return $this->belongsToMany('App\City','user_city');
    }

    public function services()
    {
        return $this->belongsToMany('App\Service','user_service')->where('state','approved')->withPivot(['id','profit_in_percentage','feature']);
    }

    public function notApprovedService()
    {
        return $this->belongsToMany('App\Service','user_service')->where('state','!=','approved')->withPivot(['id','profit_in_percentage','feature']);

    }

    public function nonApprovedServices()
    {
        return $this->belongsToMany('App\Service','user_service')->where('state','!=','approved');
    }

    public function details()
    {
        return $this->hasOne('App\ServiceProviderDetail');
    }

    public function image_url()
    {
        return $this->image!=null? asset('uploads/user/'.$this->image):

            asset('uploads/default-user.png');
    }

    public function userdetail()
    {
        return $this->hasOne('App\UserOtherDetail');
    }

    public function plans()
    {
        return $this->hasMany(SubscribeplanUser::class,'user_id');
    }

    public function wallet()
    {
        return $this->hasOne(Wallet::class,'user_id');
    }

    public function walletRecords()
    {
        return $this->hasMany(WalletDebitCredit::class,'user_id');
    }

    public function refers()
    {
        return $this->hasMany(Refer::class,'refer_by_user')->where('used',0);
    }

    public function minServicePrices()
    {
        return $this->hasMany(UserService::class,'user_id');
    }

}
