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
         $permissions = new Permission();
   
         $permissions->name = $request->name;   
     
         $permissions->save();
         return redirect('/permissions')->with('msg', 'Cargo gravado com sucesso!');
     }
 
     public function edit($id)
     {
         $permissions = Permission::findOrFail($id);
 
         return view('permissions.edit', ['permissions' => $permissions]);
     }
 
     public function update(Request $request, $id)
     {
   
       $permissions = Permission::where('id', $id)->first();
   
       $permissions->name = $request->name;  
       $permissions->save();
 
       return redirect('/permissions')->with('msg', 'Cargo editado com sucesso!');
     }
 
}
