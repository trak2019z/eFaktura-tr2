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

        public function fillClient(Array $params, Client $client)
    {
        if (count($params) == 11) {
            $client->category = $params['category'];
            $client->name = $params['name'];
			$client->NIP = $params['NIP'];
			$client->firstName = $params['firstName'];
			$client->lastName = $params['lastName'];
			$client->street = $params['street'];
			$client->town = $params['town'];
			$client->postcode = $params['postcode'];
			$client->postcode_town = $params['postcode_town'];
			$client->property_number = $params['property_number'];
			$client->phone_number = $params['phone_number'];
            return $client;
        } else {
            return false;
        }
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function invoice()
    {
        return$this->hasMany('App\Invoice');
    }

}
