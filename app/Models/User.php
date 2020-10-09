<?php

namespace App\Models;
use App\Models\Address;
use App\Models\PaymentMethod;
use App\Models\WishList;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
use Cache;
  
class User extends Authenticatable implements JWTSubject,MustVerifyEmail
{
    use Notifiable,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
 

    protected $fillable = [
        'name', 'email', 'email_verified_at','password','status','usergroup_id','image',
        'login_status','last_login_at','remember_token',
        'gateway_customer_id'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    protected $appends=['adminavailable_balance','selleravailable_balance'];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            $user->password = bcrypt($user->password);
        });
    }

  public function getRememberToken()
  {
      return $this->remember_token;
  }

  public function setRememberToken($value)
  {
      $this->remember_token = $value;
  }

  public function getRememberTokenName()
  {
      return 'remember_token';
  }

    /**
     * [getJWTIdentifier description]
     * @return [type] [description]
     */
    public function getJWTIdentifier()
    {
        return $this->id;
    }

    /**
     * [getJWTCustomClaims description]
     * @return [type] [description]
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
      public function usergroup() 
    {
        return $this->belongsTo( 'App\Models\Usergroup','usergroup_id','id');
    }

    public function cart()
    {
        return $this->belongsToMany(ProductVariation::class, 'cart_user')
            ->withPivot('quantity','to_email','message','from_mail','card_image')
            ->withTimestamps();
    }

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function paymentMethods()
    {
        return $this->hasMany(PaymentMethod::class);
    }
//sowmi
    public function order()
    {
        return $this->hasMany(Order::class);
    }

    public function product()
    {
        return $this->belongsTo('App\Models\Product','user_id','id');
    }

    public function store()
    {
        return $this->belongsTo('App\Models\Store','user_id','id');
    }



     public function scopeSellerActive($query){
        return $query->where('status',1)->where('usergroup_id',3);
    }

    public function getAdminAvailableBalanceAttribute() 
    {
        return $this->adminBalance($this);
    }

    public function getSellerAvailableBalanceAttribute() 
    {
        return $this->sellerBalance($this);
    }


        public function adminBalance($user)
        {
           $balance=Transaction::where('user_id',ADMIN_ID)->selectRaw("user_id, SUM(case when type='credit'  then amount else 0 end) - SUM(case when type='debit' then amount else 0 end)  as balance")->groupBy('user_id')->pluck('balance');
            
            return $balance;
              //  return $balance;
        }

         public function sellerBalance($user)
        {

           $balance=Transaction::where('user_id',$user->id)->selectRaw("user_id, SUM(case when type='credit'  then amount else 0 end) - SUM(case when type='debit' then amount else 0 end)  as balance")->groupBy('user_id')->pluck('balance');
            
            return $balance;
              //  return $balance;
        }

 

    public function scopeByUserType($query,$group_id)
    {
        return $query->where('usergroup_id',$group_id);
    }

    public function defaultAddress()
    {
        return $this->hasOne(Address::class)->where('default',1);
    }

    public function ratingReview()
    {
       return $this->hasMany('App\Models\RatingReview','user_id','id');
    }
    
    public function scopePreUser($query,$id,$usergroupid)
    {
       
        return $query->where('id','<',$id)->orderby('id','desc')->ByUserType($usergroupid);
    }
    public function scopeNextUser($query,$id,$usergroupid)
    {
        return $query->where('id','>',$id)->ByUserType($usergroupid);
    }
    public function mystores()
    {
        return $this->hasMany(Store::class);
    }

    public function myproducts()
    {
       return $this->hasMany('App\Models\Product');
    }

    public function orderItem()
    {
        return $this->hasMany('App\Models\OrderItem','seller_id','id');
    }

    public function sellerprofile()
    {
      return $this->hasOne('App\Models\SellerProfile','user_id','id');
    }
     
    public function invoice()
    {
      return $this->hasOne('App\Models\Invoice','user_id','id');
    }


    public function activitylog()
    {
        return $this->hasMany('App\Models\ActivityLog','causer_id','id');
    }


    public function lastLoginFrom()
    {
        $activitylog=$this->activitylog()->orderby('id','desc')->first();

        return $activitylog->properties['ip'];
    }

    public function lasloginat()
    {
        if($this->last_login_at!=null)
        {
         return Carbon::createFromFormat('Y-m-d H:i:s', $this->last_login_at)->diffForHumans();
           
        }


   }
    public function orderItemBuyer()
    {
        return $this->hasMany('App\Models\OrderItem','buyer_id','id');
    }
   public function buyerItemCount()
   {
     return $this->orderItemBuyer()->count();
   }


// public function getAvailableBalance($user)
      //   {
      //      $balance=Transaction::where('user_id',$user->id)->selectRaw("user_id,currency_id, SUM(case when type='credit' and status In('approve','unlocked','released','cancel')  and (action not in('custody-in')  or action IS NULL) then amount else 0 end) - SUM(case when type='debit' and status In('locked','pending','approve') and (action not in('custody-out') or action IS NULL )then amount else 0 end)  as balance")->groupBy('user_id','currency_id')->pluck('balance','currency_id');
      //       $bal=$this->getBalance($balance);
      //       return $bal;
      //         //  return $balance;
      //   }
  
 

}
