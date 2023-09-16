<?php

namespace App\Repositories;

abstract class AbstractRepository
{
    protected $model;

    public function all()
    {
        return $this->model::orderBy('name', 'ASC')->get();
    }

    public function findById($id)
    {
        return $this->model->find($id);
    }

    public function save($data)
    {
        return $this->model->create($data);
    }

    public function delete($id)
    {
        $model = $this->findById($id);
        $model->delete();
    }

    public function update($data, $id)
    {
        $model = $this->findById($id);

        return $model->update($data);
    }
}
