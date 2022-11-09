<?php

namespace App\Repositories;

use App\Models\Contact;

class ContactRepository
{
    use BaseRepositoryTrait;

    protected function getModel() {
        return Contact::where([]);
    }




}
