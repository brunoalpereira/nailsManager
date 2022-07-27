<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
   public function index ()
   {
    $roles = Role::all();
    return view('roles.index',['roles'=>$roles]);
   }

   public function delete($id)
   {
    Role::findOrFail($id)->delete();
  
    return redirect('/roles')->with('msg', 'cargo excluido com sucesso!');
   }

   public function create()
    {
      return view('roles.create');
    }

    public function store(Request $request)
    {
        $roles = new Role();
  
        $roles->name = $request->name;
        $roles->guard_name = 'name';
  
    
        $roles->save();
        return redirect('/roles')->with('msg', 'Cargo gravado com sucesso!');
    }

    public function edit($id)
    {
        $roles = Role::findOrFail($id);

        return view('roles.edit', ['roles' => $roles]);
    }

    public function update(Request $request, $id)
    {
  
      $roles = Role::where('id', $id)->first();
  
      $roles->name = $request->name;  
      $roles->save();

      return redirect('/roles')->with('msg', 'Cargo editado com sucesso!');
    }


}
