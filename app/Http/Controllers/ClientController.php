<?php

namespace App\Http\Controllers;

use App\Client;
use App\Schedule;
use Illuminate\Http\Request;
use App\Repositories\ClientRepository;
use App\Http\Requests\ClientsFormRequest;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $clients = Client::orderBy('nome', 'asc')->paginate(10);
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

    public function getBuscar(Request $request)
    {
        $valor = $request->valor;

        $clients = ClientRepository::buscar($request->valor);

        return view('clients.index', compact('clients'));
    }

    public function show(Client $client)
    {       
        $schedules = Schedule::whereClient_id($client->id)->orderBy('updated_at', 'desc')->paginate(10);
        $total = Schedule::whereClient_id($client->id)->sum('valor');
       
        return view("clients.show" , compact('client', 'schedules', 'total'));
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

        if (strlen($inputPesquisa) < 1) {
            return null;
        }

        $inputPesquisa = explode(' ', $inputPesquisa);
        $inputPesquisa = implode('%', $inputPesquisa);

        $pessoas = Client::select('clients.*')->where(function($query) use ($inputPesquisa){
            return $query->orWhere('clients.nome', 'LIKE', '%' . $inputPesquisa . '%');
        })
        ->paginate(5);

        $morePages = $pessoas->currentPage() < $pessoas->lastPage();
        $dadosFormatados = [];

        foreach ($pessoas as $pessoa) {
            $dadosFormatados[] = ['id' => $pessoa->id, 'text' => $pessoa->nome . " | " . $pessoa->contato];
        }

        $results = array(
            "results" => $dadosFormatados,
            "pagination" => array(
                "more" => $morePages
            )
        );

        return response()->json($results);
    }

    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route("clients.index");

    }
}
