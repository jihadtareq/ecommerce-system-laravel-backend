<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Contracts\EloquentRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements EloquentRepositoryInterface
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }


    public function all(array $columns = ['*'],array $relations = []) :Collection
    {
        return $this->model->with($relations)->get($columns);
    }

    public function allTrashed() : Collection 
    {
        return $this->model->onlyTrashed()->get();

    }

    public function findById(int $id,array $columns=['*'],array $relations = [],array $appends = []) : ?Model 
    {
        return $this->model->select($columns)->with($relations)->findOrFail($id)->append($appends);
    }

    public function findTrashedById(int $id) : ?Model
    {
        return $this->model->withTrashed()->findOrFail($id);
    }

    public function create(array $payload) : ?Model
    {
       $payload = $this->customizePayload($payload);
       $model = $this->model->create($payload);
       return $model->fresh();
    }
    public function update(int $id,array $payload) : bool
    {
        $model = $this->model->findOrFail($id);
        return $model->update($payload);
    }

    public function deleteById(int $id) : bool
    {
        return $this->model->destroy($id);
    }

    public function restoreById(int $id) : bool
    {
        return $this->model->withTrashed()->findOrFail($id)->restore();
    }

    public function permanentlyDeleteById(int $id) : bool
    {
        return $this->model->onlyTrashed()->findOrFail($id)->forceDelete();
    }

    public function customizePayload(array $payload) : array {

        $data = [];
        foreach ($payload as $field =>$value) {
            $result = preg_replace('/([A-Z])/', '_$1', $field);
            $result = strtolower($result);
            // Remove leading underscore if it exists
            $result = ltrim($result, '_');
            $data[$result] = $value;
        }

        return $data;
    }



}