<?php

namespace App\Services;

use App\Repositories\ClientRepository;
use App\Models\Client;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ClientService
{
    private ClientRepository $clientRepository;
    public function __construct(ClientRepository $clientRepository) {
        $this->clientRepository = $clientRepository;
    }

    public function createClient(Request $request): Client
    {
        $client = Client::create([
            'user_id'=>auth()->id(),
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'created_at' => Carbon::now()->toDateTimeString(),

        ]);
       return $client;
    }

    public function updateClient(Request $request ,Client $client)
    {
        $clientupdate = Client::where('id','=',$client->id)
        ->update([

            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'updated_at' => Carbon::now()->toDateTimeString(),

        ]);
       
    }
}
