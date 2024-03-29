<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'avatar',
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


      public function timeline(){
          $ids=$this->follows()->pluck('id');
          $ids->push($this->id);

          return Tweet::whereIn('user_id',$ids)->withLikes()->latest()->paginate(50);;
             }



      public function tweets(){
          return $this->hasMany(tweet::class);
      }


      public function follow(User $user)
      {
           return $this->follows()->save($user);
      }


    public function follows(){
             return $this->belongsToMany(User::class,'follows','user_id','following_user_id');
             }

   public function isFollowing(User $user){
      return $this->follows()
          ->where('following_user_id',$user->id)
          ->exists();
   }

   public function unFollow(User $user){
       $this->follows()->detach($user);
   }

    public function getRouteKeyName()
    {
        return 'username';
    }


}
