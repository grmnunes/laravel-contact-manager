<?php

namespace App\Services;

abstract class AbstractService
{
    protected $repository;

    public function all()
    {
        return $this->repository->all();
    }

    public function findById($id)
    {
        return $this->repository->findById($id);
    }

    public function save($data)
    {
        return $this->repository->save($data);
    }

    public function delete($id)
    {
        $this->repository->delete($id);
    }

    public function update($data, $id)
    {
        return $this->repository->update($data, $id);
    }
}
