<?php

namespace App\Http\Controllers;

use App\Models\Schedules;
use Illuminate\Http\Request;

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
          ->select('schedules.id as schedules',
                    'schedules.date as date',
                    'schedules.hour as hour',
                    'users.name as user',
                    'schedules.status as status')
          ->where('schedules.deleted_at',null)
          ->orderByDesc('schedules.date')
          ->orderByDesc('schedules.hour')
          ->get()
          ->toArray();
        

      return view(
        'attendance.index',
        ['schedules' => $schedules]
      );
    }
  
  
  
      public function store(Request $request)
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
