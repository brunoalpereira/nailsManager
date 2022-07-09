<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\UsersPersonalInfo;

class PersonalInfosController extends Controller
{

    public function create() {
        return view('personalInfos.create');
    }

    public function index(){

      return view('personalInfos.index' );
    }
}
