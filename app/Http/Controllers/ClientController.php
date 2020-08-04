<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;
use App\Http\Requests\ClientsFormRequest;

class ClientController extends Controller
{

    public function index()
    {
        $clients = Client::orderBy('updated_at', 'desc')->paginate(2);
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
        $client->save();

        return redirect()->route("clients.index");
    }

    public function show(Client $client)
    {
        return view("clients.show" , compact('client'));
    }

    public function edit(Client $client)
    {
        return view("clients.edit" , compact('client'));
    }

    public function update(ClientsFormRequest $request, Client $client)
    {

        $client->fill($request->all());
        $client->update();
        return redirect()->route("clients.index");
    }

    public function getPesquisarSelect2(Request $request)
    {
        $inputPesquisa = $request->query('search');

        if (strlen($inputPesquisa) < 3) {
            return null;
        }
        
        $pessoas = Client::get();

        $dadosFormatados = [];

        foreach ($pessoas as $pessoa) {
            $dadosFormatados[] = ['id' => $pessoa->id, 'text' => $pessoa->nome . " | " . $pessoa->contato];
        }

        return response()->json($dadosFormatados);
    }

    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route("clients.index");

    }
}
