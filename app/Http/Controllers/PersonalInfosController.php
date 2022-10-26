<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonalInfosRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\UsersPersonalInfo;
use Illuminate\Support\Facades\DB;

class PersonalInfosController extends Controller
{

  public function create()
  {
     $users = User::all();

    return view('personalInfos.create',['users'=>$users]);
  }

  public function edit($id)
  {

    $personalInfos = UsersPersonalInfo::findOrFail($id);
    $users = User::all();

    return view('personalInfos.edit', ['personalInfos' => $personalInfos,
                                      'users'=>$users]);
  }

  public function store(PersonalInfosRequest $request)
  {

    if($request->id_user == 0 ){
      $user = Auth::id();
    } else {
      $user =$request->id_user;
    }

    $personalInfos = new UsersPersonalInfo();

    $personalInfos->id_user = $user;
    $personalInfos->address = $request->address;
    $personalInfos->complement = $request->complement;
    $personalInfos->address_number = $request->address_number;
    $personalInfos->cep = $request->cep;
    $personalInfos->phone = $request->phone;

    $personalInfos->save();
    return redirect('/personal-infos')->with('msg', 'Informações gravado com sucesso!');
  }

  public function update(PersonalInfosRequest $request, $id)
  {

    $personalInfos = UsersPersonalInfo::where('id', $id)->first();

    if($request->id_user == 0 ){
      $user = Auth::id();
    } else {
      $user =$request->id_user;
    }

    $personalInfos->id_user = $user;
    $personalInfos->address = $request->address;
    $personalInfos->complement = $request->complement;
    $personalInfos->address_number = $request->address_number;
    $personalInfos->cep = $request->cep;
    $personalInfos->phone = $request->phone;

    $personalInfos->save();
    return redirect('/personal-infos')->with('msg', 'Informações editadas com sucesso!');
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
    
    if(in_array('Admin',$roles) || in_array('operador',$roles)){
      
      $personalInfos =DB::table('user_personal_infos')
      ->join('users','users.id','=','user_personal_infos.id_user')
      ->select('user_personal_infos.phone',
              'user_personal_infos.id',
            'user_personal_infos.address',
            'users.name')
            ->where('deleted_at',null)
      ->get();


    } else{
      $personalInfos = UsersPersonalInfo::where('id_user',$user)
      ->where('deleted_at',null);
    }

   

    return view(
      'personalInfos.index',
      ['personalInfos' => $personalInfos]
    );
  }

  public function delete($id)
  {
    UsersPersonalInfo::findOrFail($id)->delete();

    return redirect('/personal-infos')->with('msg', 'Informações excluidas com sucesso!');
  }

}
