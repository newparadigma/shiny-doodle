<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

abstract class CrudController extends Controller
{
    protected $viewDirAlias;

    /** @return string */
    abstract protected function getModelClass() :string;

    /**
    * @param $id integer
    * @return \Illuminate\Database\Eloquent\Model */
    protected function initModel($id = null) :\Illuminate\Database\Eloquent\Model
    {
      $className = $this->getModelClass();
      return (!$id) ? new $className() : call_user_func([$className, 'findOrFail'], $id);
    }

    public function list()
    {
      $models = $this->getModelClass()::all();
      return view($this->viewDirAlias . '.list', compact('models'));
    }

    public function new()
    {
      return view("$this->viewDirAlias.new");
    }
}
