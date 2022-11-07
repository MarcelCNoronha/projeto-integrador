<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publication;
use Illuminate\Support\Facades\Validator;

class PublicationController extends Controller
{
    use Traits\CrudTrait;

    public $model;

    public function __construct(Publication $publication)
    {
        $this->model = $publication;
    }

    public function GetByUser($user_id)
    {
       return Publication::where ('user_id', $user_id)
                            ->OrderBy('name', 'asc')
                            ->get();
    }

    private function validation(Array $data)
    {
        return Validator::make($data, [
            'image'          => 'required',
            'description'    => 'required',
            'user_id'        => 'required'

        ], messages:[
            'image.required'         => 'O campo image é obrigatório',
            'description.required'     => 'O campo description é obrigatório',
            'user_id.required'        => 'O campo user_id é obrigatório',
        ]);
    }
}
