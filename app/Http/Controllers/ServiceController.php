<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    use Traits\CrudTrait;

    public $model;

    public function __construct(Service $service)
    {
        $this->model = $service;
    }

    public function searchNameLast($name)
    {
        return Service::where('name', $name)
        ->orderBy ('updated_at', 'desc')
        ->first();
    }

    public function searchName($name)
    {
        return Service::where('name', $name)->first();
    }

    private function validation(Array $data)
    {
        return Validator::make($data, [
            'name'          => 'required',
            'description'   => 'required'
        ], [
            'name.required'         => 'O campo name é obrigatório',
            'description.required'  => 'O campo description é obrigatório'
        ]);
    }
}
