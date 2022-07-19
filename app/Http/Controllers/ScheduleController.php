<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Schedules;
class ScheduleController extends Controller
{
    public function create()
    {
      return view('schedules.create');
    }


    public function index()
    {
  
      $schedules = Schedules::all();

      return view(
        'schedules.index',
        ['schedules' => $schedules]
      );
    }

    public function delete($id)
    {
      Schedules::findOrFail($id)->delete();
  
      return redirect('/schedules')->with('msg', 'Informações excluidas com sucesso!');
    }



    public function store(Request $request)
    {
  
      $schedules = new Schedules();
  
      $schedules->date = $request->date;
      $schedules->hour = $request->hour;
      $schedules->user_id = $request->user_id;
      $schedules->observations = $request->observations;
      $schedules->status = 'agendado';

  
      $schedules->save();
      return redirect('/schedules')->with('msg', 'Informações gravado com sucesso!');
    }
  
    public function update(Request $request, $id)
    {
  
      $schedules = Schedules::where('id', $id)->first();
  
      $schedules->date = $request->date;
      $schedules->hour = $request->hour;
      $schedules->user_id = $request->user_id;
      $schedules->observations = $request->observations;
      $schedules->status = 'agendado';
  
      $schedules->save();
      return redirect('/schedules')->with('msg', 'Informações editadas com sucesso!');
    }
  


    public function edit($id)
    {

        $schedules = Schedules::findOrFail($id);

        return view('schedules.edit', ['schedules' => $schedules]);
    }
    
}
