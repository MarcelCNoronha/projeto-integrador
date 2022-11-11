<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class ServiceUserController extends Controller
{
    public function storeArray(Request $request)
    {
        $user = User::find($request['user_id']);
        $data = $request->all();
        self::validation($data)->validate();
        $user->services()->attach($request['services']);
        return $user;
    }


    private function validation(Array $data)
    {
    return Validator::make($data, [
        'user_id'          => 'required',
        'services'         => 'required|array',

    ], [
        'user_id.required'         => 'O campo :user_id é obrigatório',
        'services.required'        => 'O campo :services é obrigatório',
        'services.array'           => 'O campo :services deve ser um array'
    ]);
    }

}

