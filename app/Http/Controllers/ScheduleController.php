<?php

namespace App\Http\Controllers;

use App\Http\Requests\SchedulesRequest;
use Illuminate\Http\Request;

use App\Models\Schedules;
use App\Models\Services;
use App\Models\ServicesSchedules;
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
     
      $user = Auth::id();

      $userName = DB::table('users')
      ->select('name')
      ->where('id',$user)
      ->get();



      return view('schedules.create',
                 ['services'=> $services,
                 'users'=>$users,
                 'user'=>$user,
                 'userName'=>$userName
              ]);
    }


    public function index()
    {
     
      $user = Auth::id();
      $roles = [];

      $userRoles = DB::table('users')
      ->join('model_has_roles','model_has_roles.model_id','=','users.id')
      ->join('roles','model_has_roles.role_id','=','roles.id')
      ->select('roles.name')
      ->where('users.id',$user)
      ->get();

      foreach($userRoles as $userRole){
        array_push($roles,$userRole->name);
      }
      
      if(in_array('admin',$roles) || in_array('operador',$roles)){
      
        $schedules=DB::table('schedules')
        ->join('users','schedules.user_id','=','users.id')
        ->join('services_schedules','services_schedules.schedules_id','schedules.id')
        ->join('services','services.id','services_schedules.service_id')
        ->select('schedules.id as id',
                  DB::raw("DATE_FORMAT(schedules.date,'%d/%m/%Y')as data"),
                  'schedules.hour as hora',
                  'services.name as serviço',
                  'users.name as nome')
        ->where('schedules.deleted_at',null)
        ->orderByDesc('schedules.date')
        ->orderByDesc('schedules.hour')
        ->get()
        ->toArray();
      } else {
        $schedules=DB::table('schedules')
        ->join('users','schedules.user_id','=','users.id')
        ->join('services_schedules','services_schedules.schedules_id','schedules.id')
        ->join('services','services.id','services_schedules.service_id')
        ->select('schedules.id as id',
        DB::raw("DATE_FORMAT(schedules.date,'%d/%m/%Y')as data"),
                  'schedules.hour as hora',
                  'services.name as serviço',
                  'users.name as nome')
        ->where('schedules.deleted_at',null)
        ->where('schedules.user_id',$user)
        ->get()
        ->toArray();
      }

      return view(
        'schedules.index',
        ['schedules' => $schedules]
      );
    }

    public function delete($id)
    {
      $schedules = Schedules::findOrFail($id);

      $schedules->status = 'Cancelado';

      $schedules->save();
      $schedules ->delete();
  
      return redirect('/schedules')->with('msg', 'Informações excluidas com sucesso!');
    }



    public function store(SchedulesRequest $request)
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
  
    public function update(SchedulesRequest $request, $id)
    {

      if($request->user_id == 0 ){
        $user = Auth::id();
      } else {
        $user = $request->user_id;
      }

      $schedules = Schedules::where('id', $id)->first();


      $schedules->date = $request->date;
      $schedules->hour = $request->hour;
      $schedules->user_id =$user;
      $schedules->observations =$request->observations;     
      $schedules->updated_at= Carbon::now();
      $schedules->save();

      $oldServices= DB::table('services_schedules')
      ->select('services_schedules.id')
      ->where('services_schedules.schedules_id',$id)
      ->get()
      ->toArray();


      foreach($oldServices as $serv){
        ServicesSchedules::findOrFail($serv->id)->delete();
      }


      $services = $request->services;
      foreach($services as $service){
        DB::table('services_schedules')
        ->insert([
          'service_id' => $service,
          'schedules_id'=> $id,
          'created_at'=> Carbon::now(),
          'updated_at'=>Carbon::now()
        ]);
      }
  
      
      return redirect('/schedules')->with('msg', 'Informações editadas com sucesso!');
    }
  


    public function edit($id)
    {

      $user = Auth::id();

      $userName = DB::table('users')
      ->select('name')
      ->where('id',$user)
      ->get();


      $schedules = DB::table('schedules')
      ->join('services_schedules','schedules.id','services_schedules.schedules_id')
      ->join('services','services.id','services_schedules.service_id')
      ->join('users','users.id','schedules.user_id')
      ->select('schedules.date as date',
              'schedules.id as id',
              'schedules.hour as hour',
              'schedules.user_id as user_id',
              'users.name as user_name',
              'schedules.observations as observations',
              'services.name as service',
              'services.id as service_id')
      ->where('schedules.id',$id)
      ->get();

      $services = Services::all();

      $users = User::all();

        return view('schedules.edit', ['schedules' => $schedules,
                                      'services' => $services,
                                      'users'=>$users,
                                      'user'=>$user,
                                      'userName'=>$userName
                                    ]);
    }
    
}
