<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsController extends Controller
{
    public function index ()
    {
    $permissions = DB::table('permissions')->select(
      'permissions.id as id',
      'permissions.name as nome'
    )
    ->get()
    ->toArray();
     
     return view('permissions.index',['permissions'=>$permissions]);
    }
 
    public function delete($id)
    {
        Permission::findOrFail($id)->delete();
   
     return redirect('/permissions')->with('msg', 'cargo excluido com sucesso!');
    }
 
    public function create()
     {
      $roles = Role::all();

       return view('permissions.create', ['roles' => $roles]);
     }
 
     public function store(PermissionsRequest $request)
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
 
     public function update(PermissionsRequest $request, $id)
     {
      $roles = $request->role;

      $oldRoles= DB::table('permissions')
      ->join('role_has_permissions','permissions.id','=','role_has_permissions.permission_id')
      ->join('roles', 'role_has_permissions.role_id','=','roles.id')
      ->select('roles.name',
               'roles.id')
       ->where('permissions.id',$id)
       ->get()
       ->toArray();       
   
       $permissions = Permission::where('id', $id)->first();

       foreach ($oldRoles as $oldRole){
        $permissions->removeRole($oldRole->id);
      }

      foreach($roles as $role){
        $permissions->assignRole($role);
       }
   
       $permissions->name = $request->name;  
       $permissions->save();
 
       return redirect('/permissions')->with('msg', 'Cargo editado com sucesso!');
     }
 
}
