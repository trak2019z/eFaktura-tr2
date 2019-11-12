<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

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
	
    //Relations
    public function client()
    {
        return $this->hasOne('App\Client');
    }

    public function roles()
    {
        return $this->belongsToMany(Roles::class, 'roles_has_users', 'users_id', 'roles_id')->withTimestamps();
    }

    //Roles

    public function hasAnyRole($roles)
    {
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
            }
        } else {
            if ($this->hasRole($roles)) {
                return true;
            }
        }

        return false;

    }

    public function hasRole($role)
    {
        if ($this->roles()->where('name', $role)->first()) {
            return true;
        }
        return false;
    }
  
    public function hasID($email)
    {
        if (strpos($email, '@') !== false) {
              return true;
        }
        else{
          return false;
        }
    }

    //User

    public function getName()
    {
        $user = Auth::user();
        if ($this->client()->where('user_id', $user->id)->first()) {
            return "{$this->client->firstName} {$this->client->lastName}";
        }

        return false;

    }

    //Objects

    public function paginateObjects($pages)
    {
        return $this->object()->paginate($pages);
    }

    //Addresses

    public function userHasAddress()
    {
        $user = Auth::user();
        if($this->address()->where('user_id', $user->id)->first()){
            return true;
        }
        return false;
    }


}

