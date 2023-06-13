<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServicesRequest;
use Illuminate\Http\Request;

use App\Models\Services;
use Illuminate\Support\Facades\DB;

class ServicesController extends Controller
{
    public function create()
    {
        return view('services.create');
    }


    public function store(ServicesRequest $request)
    {

        $service = new Services;

        $service->name = $request->name;
        $service->value = $request->value;
        $service->description = $request->description;

        $service->save();

        return redirect('/services')->with('msg', 'Serviço criado com sucesso!');
    }


    public function edit($id)
    {

        $services = Services::findOrFail($id);

        return view('services.edit', ['services' => $services]);
    }



    public function update(ServicesRequest $request, $id)
    {

        $services = Services::where('id', $id)->first();

        $services->description = $request->description;
        $services->name = $request->name;
        $services->value = $request->value;

        $services->save();
        return redirect('/services')->with('msg', 'Serviço editado com sucesso!');
    }


    public function index()
    {

        $services = DB::table('services')
        ->select('services.id as id',
                'services.name as nome',
            'services.value as valor')
        ->get()
        ->toArray();

        return view(
            'services.index',
            ['services' => $services]
        );
    }

    public function delete($id)
    {
        Services::findOrFail($id)->delete();

        return redirect('/services')->with('msg', 'Serviço excluido com sucesso!');
    }

}
