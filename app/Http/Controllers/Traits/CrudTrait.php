<?php

namespace App\Http\Controllers\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

trait CrudTrait
{
    public $model;
    public $resource;
    public $relationship = [];
    public $scope = [];

    public function index ()
    {
        return $this->model::all();
    }

    public function show($id)
    {
        return $this->model::find($id);
    }

    public function delete($id)
    {
        $response = $this->model::find($id);
        $response->delete();
        return $response;
    }

    public function update(Request $request)
    {
        $id          = $request->id;
        $data        = $request->all();
        $response    = $this->model::find($id);
        $response    = $response->update($data);
        return $response;
    }

    public function store(Request $request)
    {
        $data        = $request->all();
        $this->validation($data)->validate();
        $response    = $this->model::create($data);
        return $response;
    }

}
