<?php

namespace App\Http\Controllers;

use App\Schedule;
use App\Client;
use Illuminate\Http\Request;
use App\Http\Requests\SchedulesFormRequest;
use Illuminate\Http\Response;
use phpDocumentor\Reflection\Types\Resource_;

class ScheduleController extends Controller
{

    public function index()
    {
        // $schedules = Schedule::orderBy('updated_at', 'desc')->paginate(10);
        $schedules = Schedule::all();
        return view('schedules.index', compact('schedules'));
    }

    public function create()
    {
        $clientes = Client::all();
        foreach ($clientes as $x) {
            $client_select[] = [$x->id => $x->nome];
        }
        return view('schedules.create', compact('clientes', 'client_select'));
    }


    public function store(Request $request)
    { // verificar o editar e a mensagem success
        //Remover caracter em posição errada, por isso não estava inserindo.
//        dd($request->data_hora_agendamento)               ;
        $request->data_hora_agendamento = str_replace('T', ' ', $request->data_hora_agendamento);
        $request->data_hora_agendamento = date("d/m/Y H:i", strtotime($request->data_hora_agendamento)) ;

        $schedule = new Schedule();
        $schedule->fill($request->all());
        $schedule->client()->associate($request->client_id);
        $schedule->save();

        return redirect()->route("schedules.index")
          ->with('success','Agendamento cadastrado com sucesso');
    }


    public function show($id)
    {
        $schedule=Schedule::find($id);
        return view("schedules.show", compact('schedule'));
    }


    public function edit(Schedule $schedule)
    {
        $clientes = Client::all();
        foreach ($clientes as $x) {
            $client_select[] = [$x->id => $x->nome];
        }

        return view("schedules.edit", compact('schedule','client_select'));
    }

    public function update(SchedulesFormRequest $request, Schedule $schedule)
    {
        $schedule->fill($request->all());
        $schedule->client()->associate($request->client_id);
        $schedule->update();
                 
        return redirect()->route("schedules.index")
          ->with('success','Agendamento atualizado com sucesso');
    }

    public function destroy(Schedule $schedule)
    {
        $schedule->delete();
        return redirect()->route("schedules.index");
    }
}
