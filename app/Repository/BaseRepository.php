<?php
namespace App\Repositories;

abstract class BaseRepository
{
    protected $model;

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function create($data)
    {
        return $this->model->create($data);
    }

    public function delete($data)
    {
        return $this->model->delete($data);
    }

    public function all()
    {
        return $this->model->all();
    }

    public function model()
    {
        return $this->model;
    }

    public function deleted($data)
    {
        $data->deleted_at = date('Y-m-d H:i:s');
        $data->save();
    }
}