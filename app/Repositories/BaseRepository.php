<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository implements BaseRepositoryInterface {
    protected $model;

    public function __construct(Model $model) {
        $this->model = $model;
    }

    public function all(int $itemPerPage, $column = ['*'])
    {
        return $this->model::select($column )->where('deleteFlag', 0)->orderBy('updated_at', 'desc')->paginate($itemPerPage);
    }

    public function find($id, $column = ['*'])
    {
        return $this->model::select($column)->where([['id', $id], ['deleteFlag', 0]])->first();
    }

    public function findAttributes($attribute, $attributeValue, $column = ['*'])
    {
        return $this->model::select($column)->where([[$attribute, $attributeValue], ['deleteFlag', 0]]);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update($id, array $data, $attribute = "id")
    {
        return $this->model->where($attribute, $id)->update($data);
    }

    public function delete($id)
    {
        $obj = $this->find($id);
        $obj->delete();
    }
}
