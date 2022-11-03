<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perfil;
use Illuminate\Support\Facades\Validator;

class PerfilController extends Controller
{
    public function index()
    {
        return Perfil::all();
    }

    public function GetByUser($user_id)
    {
       return Perfil::where ('user_id', $user_id)
                            ->OrderBy('name', 'asc')
                            ->get();
    }

    public function show($id)
    {
        return Perfil::find($id);
    }

    public function delete($id)
    {
        $perfil = Perfil::find($id);
        $perfil->delete();
        return 'ok';
    }

    public function create(Request $request)
    {
        $data       = $request->all();
        self::validation($data)->validated();
        $perfil    = Perfil::create($data);
        return $perfil;
    }

    public function update(Request $request)
    {
        $id             = $request->id;
        $data           = $request->all();
        $perfil    = Perfil::find($id);
        $perfil    = $perfil->update($data);
        return $perfil;
    }

    private function validation(Array $data)
    {
        return Validator::make($data, [
            'image'          => 'required',
            'title'          => 'required',
            'description'    => 'required',
            'active'         => 'required',
            'user_id'        => 'required'

        ], messages:[
            'image.required'         => 'O campo image é obrigatório',
            'title.required'        => 'O campo title é obrigatório',
            'description.required'     => 'O campo description é obrigatório',
            'active.required'          => 'O campo active é obrigatório',
            'user_id.required'        => 'O campo user_id é obrigatório',
        ]);
    }
}
