<?php

namespace App\Repositories;

use App\Models\Customer;

class ClientRepository
{
    use BaseRepositoryTrait;

    protected function getModel()
    {
        return Customer::where([]);
    }

}
