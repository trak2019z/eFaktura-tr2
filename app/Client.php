<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'firstName',
        'lastName',
        'category',
        'points',
        'company',
        'address_id',
        'phone_number',
        'NIP',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
