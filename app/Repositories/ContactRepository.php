<?php

namespace App\Repositories;

use App\Models\Contact;

class ContactRepository extends AbstractRepository
{
    protected $model;

    public function __construct(Contact $model)
    {
        $this->model = $model;
    }
}
