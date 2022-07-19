<?php

namespace App\Http\Controllers;

use App\Models\Schedules;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index()
    {
  
      $schedules = Schedules::all();

      return view(
        'attendance.index',
        ['schedules' => $schedules]
      );
    }
}
