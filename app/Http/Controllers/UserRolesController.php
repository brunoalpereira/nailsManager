<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class UserRolesController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('usersRoles.index',['users'=>$users]);
    }


    public function edit($id)
     {
         $users = User::findOrFail($id);
        
        $oldRoles= DB::table('users')
         ->join('model_has_roles','model_has_roles.model_id','=','users.id')
         ->join('roles', 'model_has_roles.role_id','=','roles.id')
         ->select('roles.name',
                  'roles.id')
          ->where('users.id',$id)
          ->get()
          ->toArray();

          $roles = Role::all();
 
        return view('usersRoles.edit', ['users' => $users,
                                          'oldRoles'=>$oldRoles,
                                        'roles'=>$roles]);
    }


    public function update(Request $request, $id)
    {
     $roles = $request->role;

        $oldRoles= DB::table('users')
            ->join('model_has_roles','model_has_roles.model_id','=','users.id')
            ->join('roles', 'model_has_roles.role_id','=','roles.id')
            ->select('roles.name',
                    'roles.id')
            ->where('users.id',$id)
            ->get()
            ->toArray();
  
      $users = User::where('id', $id)->first();

      foreach ($oldRoles as $oldRole){
       $users->removeRole($oldRole->id);
     }

     foreach($roles as $role){
       $users->assignRole($role);
      }
  
      return redirect('/users-roles')->with('msg', 'Cargo editado com sucesso!');
    }
}
