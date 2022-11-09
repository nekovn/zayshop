<?php

namespace App\Providers;

use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Contracts\Hashing\Hasher as HasherContract;

class EloquentUserExMemberProvider extends EloquentUserProvider
{

    public function __construct(HasherContract $hasher, $model)
    {
        parent::__construct($hasher, $model);
    }

}
