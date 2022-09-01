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
}
