<?php

namespace App\Http\Controllers;

use App\Schedule;
use Illuminate\Http\Request;
use App\Http\Requests\SchedulesFormRequest;

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
        return view('schedules.create');
    }

  
    public function store(Request $request)
    {
        $schedule = new Schedule();
        $schedule->fill($request->all());
        $schedule->save();

        return redirect()->route("shedules.index");
    }

   
    public function show(Schedule $schedule)
    {
        return view("schedules.show" , compact('schedule'));
    }

   
    public function edit(Schedule $schedule)
    {
        return view("schedules.edit" , compact('schedule'));
    }

    public function update(Request $request, Schedule $schedule)
    {
        $client->fill($request->all());
        $client->update();    
        return redirect()->route("clients.index");
    }

   
    public function destroy(Schedule $schedule)
    {
        $schedule->delete();
        return redirect()->route("shedules.index");
    }
}
