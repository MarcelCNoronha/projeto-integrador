<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    use Traits\CrudTrait;

    public $model;

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function searchName($name)
    {
        return User::where('name', $name)->first();
    }

    public function authenticate(Request $request)
    {
        $credentials = [
            'email'    => $request->data['email'],
            'password' => $request->data['password']
        ];

        $user = User::where('email', $request->data['email'])->first();

        if(empty($user))
        {
            return [
                "success" => false,
                "message" => "Email inexistente"
            ];
        }

        if(Auth::attempt($credentials))
        {
            // $request ->session()->regenerate();
            $user = Auth::user();

            return [
                "success" => true,
                "message" => $user->id,
            ];
        }

        return [
            "success" => false,
            "message" => "Senha incorreto"
        ];
    }

    private function validation(Array $data)
    {
        return Validator::make($data, [
            'name'          => 'required',
            'email'         => 'required',
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

