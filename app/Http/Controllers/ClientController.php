<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;
// use App\Http\Controllers\Controller;
use App\Http\Requests\ClientsFormRequest;

class ClientController extends Controller
{

    public function index()
    {
        $clients = Client::all();

        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        return view("clients.create");
    }

    public function store(ClientsFormRequest $request)
    {
        $client = new Client();
        $client->fill($request->all());
        // dd($client);
        $client->save();

        return redirect()->route("clients.index");
    }

    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
    }
}
