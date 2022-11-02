<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Validation\Rule;
use App\Http\Requests\Client\StoreClientRequest;
use App\Http\Requests\Client\UpdateClientRequest;
use Illuminate\Support\Facades\Hash;
use App\Repositories\ClientRepository;
use App\Services\ClientService;
use Illuminate\Support\Facades\Gate;

class ClientController extends Controller
{

    public function __construct(){
        $this->authorizeResource(Client::class,'client');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientsAdmin=Client::paginate(10);
        $clientsOperator=Client::where('user_id','=',auth()->id())->paginate(10);
        return view('clients.showclients', compact('clientsAdmin','clientsOperator')

        );
    }






    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.createclient');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClientRequest $request,ClientService $clientService)
    {
        if($request->validated()){

            $clientService->createClient($request);

            return redirect('/clients')
                            ->with('success','Client created successfully.');
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)

    {
        $this->authorize('update',$client);
//        $response = Gate::inspect('updateClient', $client);

//        if ($response->allowed()) {
            return view('clients.updateclient',['client'=>$client]);
//        } else {
//            echo $response->message();
//        }
//        if (Gate::allows('update-client', $client)) {
//            return view('clients.updateclient',['client'=>$client]);
//        }
//
//        abort(403,'Unauthorized Action');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClientRequest $request,ClientService $clientService,Client $client)
    {

        if($request->validated()){

            $clientService->updateClient($request,$client);

            return redirect('/clients')
                            ->with('success','Client updates successfully.');
            }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
