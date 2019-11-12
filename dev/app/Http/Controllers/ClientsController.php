<?php

namespace App\Http\Controllers;

use App\Client;
use App\User;
use App\Http\Requests\ClientRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientsController extends Controller
{
    public function index(User $model)
    {
	   	$clients = Client::orderBy('id', 'DESC')->paginate(200);
	
        return view('clients.index', ['clients' => $clients]);
    }

    /**
     * Show the form for creating a new user
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
    	$clients = Client::orderBy('id', 'DESC')->paginate(30);

        return view('clients.create');
    }

        public function store(ClientRequest $request)
    {	
        $params = [
            'category' => $request->input('category'),
            'name' => $request->input('name'),
            'NIP' => $request->input('NIP'),
            'firstName' => $request->input('firstName'),
            'lastName' => $request->input('lastName'),
            'street' => $request->input('street'),
            'town' => $request->input('town'),
            'postcode' => $request->input('postcode'),
            'postcode_town' => $request->input('postcode_town'),
            'property_number' => $request->input('property_number'),
            'phone_number' => $request->input('phone_number'),
        ];

        $client = new Client();
        $client = $client->fillClient($params, $client);
        $client->save();

        if ($client != false) {
        return redirect()
                ->back()
                ->with('info', 'Klient został dodany.');

        } else {
            return redirect()
                ->back()
                ->with('error', 'Coś poszło nie tak, spróbuj ponownie.');
        };
    }
}
