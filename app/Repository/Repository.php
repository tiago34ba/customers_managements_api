<?php

namespace App\Repository;

use Illuminate\Support\Facades\DB;

class Repository
{
  protected $entity;

  /**
   * @param \Illuminate\Http\Request $request
   * @return \Illuminate\Database\Eloquent\Model
   */
  public function store($request)
  {

    return DB::transaction(function () use ($request) {
      $arrInput = $request->only($this->entity->getFillable());
      return $this->entity::create($arrInput);
    });
  }

  /**
   * @param int $id
   * @param \Illuminate\Http\Request $request
   * @return \Illuminate\Database\Eloquent\Model
   */
  public function update(int $id, $request)
  {
      return DB::transaction(function () use ($id,$request) {
      $arrInput = $request->only($this->entity->getFillable());
      $model = $this->entity::findOrFail($id);

      $model
        ->fill($arrInput)
        ->save();

        return $model;
    });
  }

  /**
   * @param int $id
   * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\ModelNotFoundException
   */
  public function show(int $id, array $relations = [])
  {
    if(!empty($relations)){
      return $this->entity::with($relations)->findOrFail($id);
    }
    return $this->entity::findOrFail($id);
  }

  /**
   * @param int $id
   * @return void
   */
  public function destroy(int $id)
  {
    DB::transaction(function () use ($id) {
      $this->entity::destroy($id);
    });
  }

    public function obterAtivos($orderBy = "")
    {
        $builder = $this->entity::
            where('status', 1);

        if ($orderBy) {
            $builder->orderBy($orderBy);
        }

        return $builder->get();
    }

    public function obter($orderBy = null)
    {
        $builder = $this->entity;

        if ($orderBy) {
            $builder->orderBy($orderBy);
        }

        return $builder->get();
    }
}