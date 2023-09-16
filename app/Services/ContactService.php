<?php

namespace App\Services;

use App\Repositories\ContactRepository;

class ContactService extends AbstractService
{
    protected $repository;

    public function __construct(ContactRepository $repository)
    {
        $this->repository = $repository;
    }
}
