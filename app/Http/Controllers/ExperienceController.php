<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Experience;
use Illuminate\Support\Facades\Validator;

class ExperienceController extends Controller
{
    public function index()
    {
        return Experience::all();
    }

    public function show($id)
    {
        return Experience::find($id);
    }

    public function GetByUser($user_id)
    {
       return Experience::where ('user_id', $user_id)
                            ->OrderBy('name', 'asc')
                            ->get();
    }

    public function delete($id)
    {
        $service = Experience::find($id);
        $service->delete();
        return 'ok';
    }

    public function create(Request $request)
    {
        $data       = $request->all();
        self::validation($data)->validated();
        $experience    = Experience::create($data);
        return $experience;
    }

    public function update(Request $request)
    {
        $id         = $request->id;
        $data       = $request->all();
        $experience    = Experience::find($id);
        $experience    = $experience->update($data);
        return $experience;
    }

    private function validation(Array $data)
    {
        return Validator::make($data, [
            'name'          => 'required',
            'description'   => 'required',
            'user_id'       => 'required',
            'active'        => 'required'
        ], messages:[
            'name.required'         => 'O campo name é obrigatório',
            'description.required'  => 'O campo description é obrigatório',
            'user_id.required'      => 'O campo user_id é obrigatório',
            'active.required'       => 'O campo active é obrigatório'
        ]);
    }
}
