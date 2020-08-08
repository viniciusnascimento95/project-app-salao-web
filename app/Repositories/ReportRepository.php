<?php

namespace App\Repositories;

use App\Schedule;
use Illuminate\Database\Eloquent\Builder;

class ReportRepository extends Schedule
{
    public static function buscar(?date $data_inicial, ?date $data_final)
    {
        $consulta = Schedule::whereBetween('data_hora_agendamento', array($data_inicial, $data_final))->paginate(30);
        return $consulta;
    }
}
