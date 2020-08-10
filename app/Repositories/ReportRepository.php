<?php

namespace App\Repositories;

use App\Schedule;
use Illuminate\Database\Eloquent\Builder;

class ReportRepository extends Schedule
{
    public static function buscar(?string $data_inicial, ?string $data_final, ?string $situacao_servico)
    {
        $situacao_servico = $situacao_servico == 3 ? [0,1] : [$situacao_servico];
        $consulta = Schedule::where('data_hora_agendamento', '>=', $data_inicial.' 00:00')
                           ->where('data_hora_agendamento', '<=', $data_final.' 23:59')
                           ->whereIn('servico_realizado', $situacao_servico)
                           ->paginate(30);
        return $consulta;
    }
}
