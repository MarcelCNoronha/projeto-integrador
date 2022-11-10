<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perfil;
use Illuminate\Support\Facades\Validator;

class PerfilController extends Controller
{
    use Traits\CrudTrait;

    public $model;

    public function __construct(Perfil $perfil)
    {
        $this->model = $perfil;
        $this->middleware('auth')->only([
            'index',
            'show',
            'store',
            'delete',
            "upgrade",
            'GetByUser'
        ]);
    }

    public function GetByUser($user_id)
    {
       return Perfil::where ('user_id', $user_id)
                            ->OrderBy('title', 'asc')
                            ->get();
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
            'image.required'            => 'O campo image é obrigatório',
            'title.required'            => 'O campo title é obrigatório',
            'description.required'      => 'O campo description é obrigatório',
            'active.required'           => 'O campo active é obrigatório',
            'user_id.required'          => 'O campo user_id é obrigatório',
        ]);
    }
}
