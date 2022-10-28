<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publication;
use Illuminate\Support\Facades\Validator;

class PublicationController extends Controller
{
    public function index()
    {
        return Publication::all();
    }

    public function GetByUser($user_id)
    {
       return Publication::where ('user_id', $user_id)
                            ->OrderBy('name', 'asc')
                            ->get();
    }

    public function show($id)
    {
        return Publication::find($id);
    }

    public function delete($id)
    {
        $publication = Publication::find($id);
        $publication->delete();
        return 'ok';
    }

    public function create(Request $request)
    {
        $data       = $request->all();
        self::validation($data)->validated();
        $publication    = Publication::create($data);
        return $publication;
    }

    public function update(Request $request)
    {
        $id             = $request->id;
        $data           = $request->all();
        $publication    = Publication::find($id);
        $publication    = $publication->update($data);
        return $publication;
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
