<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UsersPersonalInfo;

class PersonalInfosController extends Controller
{

  public function create()
  {
        return view('personalInfos.create');
    }

  public function store(Request $request)
  {

    $personalInfos = new UsersPersonalInfo();

    $personalInfos->id_user = $request->user;
    $personalInfos->address = $request->address;
    $personalInfos->complement = $request->complement;
    $personalInfos->address_number = $request->address_number;
    $personalInfos->cep = $request->cep;
    $personalInfos->phone = $request->phone;

    $personalInfos->save();
    return redirect('/personal-infos')->with('msg', 'Informações gravado com sucesso!');
  }

      return view('personalInfos.index' );
    }
}
