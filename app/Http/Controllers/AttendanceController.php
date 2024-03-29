<?php

namespace App\Http\Controllers;

use App\Http\Requests\AttendanceRequest;
use App\Models\Schedules;
use App\Models\Services;
use App\Models\ServicesSchedules;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AttendanceController extends Controller
{

      public function create()
      {
        $services = Services::all();
  
        $users = User::all();
        return view('attendance.create',
                   ['services'=> $services,
                   'users'=>$users]);
      }
  
  
      public function index()
      {
        
          $schedules=DB::table('schedules')
          ->join('users','schedules.user_id','=','users.id')
          ->join('services_schedules','services_schedules.schedules_id','schedules.id')
          ->join('services','services.id','services_schedules.service_id')
          ->select('schedules.id as id',
          DB::raw("DATE_FORMAT(schedules.date,'%d/%m/%Y')as data"),
                    'schedules.hour as hora',
                    'users.name as nome',
                    'services.name as serviço',
                    'schedules.status as status')
          ->where('schedules.deleted_at',null)
          ->orderBy('schedules.status')
          ->orderByDesc('schedules.date')
          ->orderByDesc('schedules.hour')
          ->get()
          ->toArray();
        
  
        return view(
          'attendance.index',
          ['schedules' => $schedules]
        );
      }
  
  
  
      public function store(AttendanceRequest $request)
      {
  
        $schedules =DB::table('schedules')
        ->insertGetId([
          'date' =>$request->date,
          'hour' => $request->hour,
          'user_id' =>$request->user_id,
          'observations' =>$request->observations,
          'status' => 'Finalizado',
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

        $operator = Auth::id();

        DB::table('attendance')
          ->insert([
            'schedules_id'=>$schedules,
            'operator_id'=> $operator,
            'is_finished'=>true,
            'created_at'=> Carbon::now(),
            'updated_at'=>Carbon::now()
          ]);
    
  
        return redirect('/attendance')->with('msg', 'Informações gravado com sucesso!');
      }
    
      public function update(AttendanceRequest $request, $id)
      {
  
        $schedules = Schedules::where('id', $id)->first();
  
        $schedules->date = $request->date;
        $schedules->hour = $request->hour;
        $schedules->observations = $request->observations;  
        $schedules->status = 'Finalizado';   
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

        $operator = Auth::id();

        DB::table('attendance')
          ->insert([
            'schedules_id'=> $id,
            'operator_id'=> $operator,
            'is_finished'=>true,
            'created_at'=> Carbon::now(),
            'updated_at'=>Carbon::now()
          ]);
    
        
        return redirect('/attendance')->with('msg', 'Informações editadas com sucesso!');
      }
    
  
  
      public function edit($id)
      {
  
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
  
          return view('attendance.finish', ['schedules' => $schedules,
                                        'services' => $services,
                                        'users'=>$users]);
      }
      
  }
  

