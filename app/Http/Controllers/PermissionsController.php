<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionsController extends Controller
{
    public function index ()
    {
     $permissions = Permission::all();
     return view('permissions.index',['permissions'=>$permissions]);
    }
 
    public function delete($id)
    {
        Permission::findOrFail($id)->delete();
   
     return redirect('/permissions')->with('msg', 'cargo excluido com sucesso!');
    }
 
    public function create()
     {
       return view('permissions.create');
     }
 
     public function store(Request $request)
     {

        $roles = $request->role;

         $permissions = new Permission();
   
         $permissions->name = $request->name;   
     
         foreach($roles as $role){
          $permissions->assignRole($role);
         }
     
         $permissions->save();
         return redirect('/permissions')->with('msg', 'Cargo gravado com sucesso!');
     }
 
     public function edit($id)
     {
         $permissions = Permission::findOrFail($id);
 
        $oldRoles= DB::table('permissions')
         ->join('role_has_permissions','permissions.id','=','role_has_permissions.permission_id')
         ->join('roles', 'role_has_permissions.role_id','=','roles.id')
         ->select('roles.name',
                  'roles.id')
          ->where('permissions.id',$id)
          ->get()
          ->toArray();

          $roles = Role::all();
 
        return view('permissions.edit', ['permissions' => $permissions,
                                          'oldRoles'=>$oldRoles,
                                        'roles'=>$roles]);
     }
 
     public function update(Request $request, $id)
     {
   
       $permissions = Permission::where('id', $id)->first();
   
       $permissions->name = $request->name;  
       $permissions->save();
 
       return redirect('/permissions')->with('msg', 'Cargo editado com sucesso!');
     }
 
}
