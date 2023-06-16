<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index ()
   {

    $date = Carbon::now()->format('d-m-Y H:i:s');

    $name = Auth::user()->name;

    $today = Carbon::now();

    $attendanceToday = DB::table('schedules')
    ->where('schedules.status','agendado')
    ->where(DB::raw('day(schedules.date)'),$today->day)
    ->select(DB::raw('count(schedules.id) as qtd'))
     ->orderByDesc('qtd')
     ->get()
     ->toArray(); 



     $attendanceMonth = DB::table('schedules')
    ->where('schedules.status','agendado')
    ->where(DB::raw('month(schedules.date)'),$today->month)
    // ->where(DB::raw('day(schedules.date)'), '>=', $today->day)
    ->select(DB::raw('count(schedules.id) as qtd '))
     ->orderByDesc('qtd')
     ->get()
     ->toArray(); 



     $services = DB::table('attendance')
     ->join('schedules','attendance.schedules_id','schedules.id')
     ->join('services_schedules','services_schedules.schedules_id','schedules.id')
     ->join('services','services.id','services_schedules.service_id')
     ->where('attendance.is_finished',1)
     ->where(DB::raw('month( attendance.created_at)'),$today->month)
     ->select('services.name as name',
         DB::raw('count(services.id) as qtd '))
      ->groupBy('services.name')
      ->orderByDesc('qtd')
      ->get()
      ->toArray();  
      
      $nameService=[];
      $qtd=[];
      foreach($services as $service){
        array_push($nameService,$service->name);
      }
      // $nameServices = implode(',',$nameService);
      foreach($services as $service){
        array_push($qtd,$service->qtd);
      }
      // $qtds = implode(',',$qtd);

      // $stringName = implode(",",$nameService);

    return view('dashboard',['name'=>$name,
                            'date'=>$date,
                            'attendanceToday'=>$attendanceToday,
                            'attendanceMonth'=>$attendanceMonth,
                            'nameService'=> $nameService,
                            'qtd'=>$qtd
                            ]);
   }

}
