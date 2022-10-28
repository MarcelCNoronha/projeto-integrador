<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }

    public function searchName($name)
    {
        return User::where('name', $name)->first();
    }

    public function show($id)
    {
        return User::find($id);
    }

    public function delete($id)
    {
        $service = User::find($id);
        $service->delete();
        return 'ok';
    }

    public function create(Request $request)
    {
        $data       = $request->all();
        self::validation($data)->validated();
        $user    = User::create($data);
        return $user;
    }

    public function update(Request $request)
    {
        $id         = $request->id;
        $data       = $request->all();
        $user    = User::find($id);
        $user    = $user->update($data);
        return $user;
    }

    private function validation(Array $data)
    {
        return Validator::make($data, [
            'name'          => 'required',
            'email      '   => 'required',
            'password'      => 'required',
            'age'           => 'required',
            'phone'         => 'required',
            'active'        => 'required'

        ], messages:[
            'name.required'         => 'O campo name é obrigatório',
            'email.required'        => 'O campo email é obrigatório',
            'password.required'     => 'O campo password é obrigatório',
            'age.required'          => 'O campo age é obrigatório',
            'phone.required'        => 'O campo phone é obrigatório',
            'active.required'       => 'O campo active é obrigatório'
        ]);
    }
}

