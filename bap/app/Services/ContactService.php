<?php

namespace App\Services;

use App\Enums\CodeDefine;
use App\Mail\ContactMail;
use App\Repositories\ContactRepository;

class ContactService
{
    use BaseServiceTrait;

    public $repository;

    public function __construct(ContactRepository $contactRepository)
    {
        $this->repository = $contactRepository;
    }

    public function handleSendMail($request)
    {
        $this->sendMail(new ContactMail($request));
        $conditions = ['id' => [$request['id']], 'column' => [
            'replied_content' => $request['textarea'],
            'replied_by' => 'cuong',
            'status' => CodeDefine::ACTIVE_VALUE,
        ]
        ];
        return $this->update($conditions);
    }

    public function handleContact()
    {

    }


}
