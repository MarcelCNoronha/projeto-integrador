<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Experience;
use Illuminate\Support\Facades\Validator;

class ExperienceController extends Controller
{
    use Traits\CrudTrait;

    public $model;

    public function __construct(Experience $experience)
    {
        $this->model = $experience;
    }

    public function GetByUser($user_id)
    {
       return Experience::where ('user_id', $user_id)
                            ->OrderBy('name', 'asc')
                            ->get();
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
