<?php

namespace App\Http\Controllers;

use App\Schedule;
use App\Client;
use Illuminate\Http\Request;
use App\Http\Requests\SchedulesFormRequest;
use Illuminate\Http\Response;
use App\Repositories\ReportRepository;
use phpDocumentor\Reflection\Types\Resource_;

class ScheduleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $schedules = Schedule::orderBy('updated_at', 'desc')->paginate(10);
        return view('schedules.index', compact('schedules'));
    }

    public function create()
    {
        $clientes = Client::all();
        return view('schedules.create', compact('clientes'));
    }

    public function store(SchedulesFormRequest $request)
    { 
        $request->valor = number_format($request->valor, 2, ',', '.');
        $request->data_hora_agendamento = str_replace('T', ' ', $request->data_hora_agendamento);
        $request->data_hora_agendamento = date("d/m/Y H:i", strtotime($request->data_hora_agendamento));

        $schedule = new Schedule();
        $schedule->fill($request->all());
        $schedule->client()->associate($request->client_id);
        $schedule->save();

        return redirect()->route("schedules.index")
          ->with('success','Agendamento cadastrado com sucesso');
    }

    public function show($id)
    {
        $schedule = Schedule::find($id);
        return view("schedules.show", compact('schedule'));
    }

    public function edit(Schedule $schedule)
    {
        $cliente = Client::find($schedule->client_id);
        return view("schedules.edit", compact('schedule', 'cliente'));
    }

    public function update(SchedulesFormRequest $request, Schedule $schedule)
    {
        // $request->valor = number_format($request->valor, 2, ',', '.');
        $request->valor = str_replace('.', ',',$request->valor);
        
        $request->data_hora_agendamento = str_replace('T', ' ', $request->data_hora_agendamento);
        $request->data_hora_agendamento = date("d/m/Y H:i", strtotime($request->data_hora_agendamento));
        
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
    public function report()
    {
        $schedules = Schedule::orderBy('data_hora_agendamento', 'desc')->paginate(30);
        // $total = Schedule::orderBy('data_hora_agendamento', 'desc')->sum('valor');
        return view('schedules.report', compact('schedules'));
    }
    public function buscar(Request $request)
    {
       
        $data_inicial = $request->inicial;
        $data_final = $request->final;

        $schedules = ReportRepository::buscar($data_inicial, $data_inicial);
        dd($schedules);

        return view('schedules.report', compact('schedules'));
    }
}
