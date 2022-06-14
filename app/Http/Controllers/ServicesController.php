<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Services;
use App\Models\User;

class ServicesController extends Controller
{
    public function create() {
        return view('services.create');
    }


    public function store(Request $request){

        $service = new Services;

        $service->name = $request->name;
        $service->value = $request->value;
        $service->description = $request->description;
        
        $service->save();

        return redirect('/')->with('msg', 'Serviço criado com sucesso!');
    }


}
