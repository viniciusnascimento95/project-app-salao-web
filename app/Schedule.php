<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = 'schedules';
    protected $primaryKey = 'id';

    protected $fillable = [
        'client_id',
        'descricao',
        'data_hora_agendamento',
        'valor',
        'servico_realizado'
    ];

    protected $dates = ['data_hora_agendamento'];

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }

    public function data_hora_agendamento_Formated():string
    {
      $data_hora_agendamento = str_replace(' ', 'T', $this->data_hora_agendamento);

      return $data_hora_agendamento;
    }

}
