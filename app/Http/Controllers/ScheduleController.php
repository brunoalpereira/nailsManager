<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Schedules;
use App\Models\Services;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ScheduleController extends Controller
{
    public function create()
    {
      $services = Services::all();

      $users = User::all();
      return view('schedules.create',
                 ['services'=> $services,
                 'users'=>$users]);
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

      if($request->user_id == 0 ){
        $user = Auth::id();
      } else {
        $user = $request->user_id;
      }

      $schedules =DB::table('schedules')
      ->insertGetId([
        'date' =>$request->date,
        'hour' => $request->hour,
        'user_id' =>$user,
        'observations' =>$request->observations,
        'status' => 'agendado',
        'created_at'=> Carbon::now(),
        'updated_at'=>Carbon::now()
      ]);

      $services = $request->services;

      foreach($services as $service){
        DB::table('services_schedules')
        ->insert([
          'service_id' => $service,
          'schedules_id'=> $schedules,
          'created_at'=> Carbon::now(),
          'updated_at'=>Carbon::now()
        ]);
      }


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
