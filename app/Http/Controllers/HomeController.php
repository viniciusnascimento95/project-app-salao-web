<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schedule;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $agendamentos = Schedule::where('servico_realizado', false)->orderBy('data_hora_agendamento', 'asc')->paginate(8);
        return view('home', compact('agendamentos'));
    }
}
