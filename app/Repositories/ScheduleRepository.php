<?php

namespace App\Repositories;

use App\Schedule;
use Illuminate\Support\Facades\DB;

class ScheduleRepository extends Schedule
{
    public static function buscar(string $valor = null)
    {
        $shedule = Schedule::where('descricao', 'LIKE', "%$valor%")
        ->orWhere('id', 'LIKE', "%$valor%")
        ->orWhere('data_hora_agendamento', 'LIKE', "%$valor%")->paginate(10);
        return $shedule;
    }    
}
