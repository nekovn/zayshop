<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\BaseControllerTrait;
use App\Http\Controllers\Requests\client\ContactRequest;
use App\Services\ContactService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class ClientContactController
{
    use BaseControllerTrait {
        BaseControllerTrait::store as storeTrait;
        BaseControllerTrait::sendMail as sendMailTrait;
    }

    public $service;
    public $screen;

    public function __construct(ContactService $contactService)
    {
        $this->service = $contactService;
        $this->screen = 'client.contact';
    }

    public function contact() {
        $fields = ['client', 'email', 'tell', 'subject', 'textarea'];
        return view($this->screen, ['fields' => $fields]);
    }

    public function sendMail(ContactRequest $request)
    {
        DB::beginTransaction();
        try {
            $code = Str::random(5);
            $request['code'] = $code;
            $this->storeTrait($request);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollback();
            $this->createLog(['message' => $exception->getMessage(), 'code' => $exception->getCode()], __METHOD__, __LINE__);
            return redirect()->back()->with('error', __('global.A.error.sendmail'));
        }
        return redirect()->back()->with('success', __('global.A.success.sendmail'));
    }

}
