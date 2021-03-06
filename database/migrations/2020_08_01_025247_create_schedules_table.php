<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->longText('descricao')->nullable();
            $table->dateTime('data_hora_agendamento')->unique();
            // $table->dateTime('data_hora_agendamento')->nullable();
            $table->decimal('valor', 9,2)->nullable();
            $table->boolean('servico_realizado')->default(false);
            $table->biginteger('client_id')->unsigned(); 
            $table->foreign('client_id')->references('id')->on('clients'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedules');
    }
}
