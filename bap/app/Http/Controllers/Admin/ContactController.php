<?php

namespace App\Http\Controllers\Admin;

use App\Enums\DefaultDefine;
use App\Http\Controllers\BaseControllerTrait;
use App\Http\Controllers\Requests\auth\ContactRequest;
use App\Services\ContactService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController
{
    use BaseControllerTrait {
        BaseControllerTrait::findItemWithCondition as findItemWithConditionTrait;
        BaseControllerTrait::getArrayShowContent as getArrayShowContentTrait;
        BaseControllerTrait::getTotalRecord as getTotalRecordTrait;
    }

    public $service;
    public $defaultPerPage;
    public $defaultSort;
    public $searchBy;
    public $contextActive;
    public $contextInactive;
    public $screen;
    public $acceptBtn;
    public $thead;
    public $routeName;
    public $type;

    public function __construct(ContactService $contactService)
    {
        $this->service = $contactService;
        $this->defaultPerPage = DefaultDefine::PER_PAGE;
        $this->defaultSort = DefaultDefine::SORT_DEFAULT;
        $this->searchBy = ['client', 'email', 'tell', 'code', 'subject'];
        $this->acceptBtn = ['reload', 'change-status', 'delete'];
        $this->contextActive = __('global.S.replied.text');
        $this->contextInactive = __('global.S.not.replied.text');
        $this->screen = 'admin.contact';
        $this->thead = 'contact';
        $this->routeName = route('admin.contact');
        $this->type = 'table';
    }

    /**
     * お問い合わせデータを表示する
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|void
     */
    public function contact(Request $request)
    {
        try {
            $per_page = $request->per_page ?? $this->defaultPerPage;
            $order = $request->sort ?? $this->defaultSort;
            $sort = $request->sort ?? '';
            $conditions = ['where' => [], 'order' => ['id' => $order], 'simplePaginate' => $per_page];
            $data = $this->findItemWithConditionTrait($conditions);

            $statusBtn = $this->getStatusBtn(DefaultDefine::STATUS_BTN);
            $count = $this->getTotalRecordTrait();

            $exception = [
                'count'     => $count,
                'per_page'  => $per_page,
                'sort'      => $sort,
                'searchBy'  => $this->searchBy,
                'statusBtn' => $statusBtn,
                'acceptBtn' => $this->acceptBtn,
            ];
            $showContent = $this->getArrayShowContentTrait($this->routeName, $this->type, $this->thead);
            $view = array_merge_recursive($data, $exception, $showContent);
            return view($this->screen, $view);
        } catch (\Exception $exception) {
            $this->createLog(['message' => $exception->getMessage(), 'code' => $exception->getCode()], __METHOD__, __LINE__);
            abort(500);
        }
    }

    /**
     * メールを送信する
     * @param ContactRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendMail(ContactRequest $request)
    {
        DB::beginTransaction();
        try {
            $result = app(ContactService::class)->handleSendMail($request->validated());
            if (!$result) {
                DB::rollBack();
                $this->createLog(['message' => 'update failed', 'code' => '500'], __METHOD__, __LINE__);
                return redirect()->back()->with('error', __('global.A.error.sendmail'));
            }
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            $this->createLog(['message' => $exception->getMessage(), 'code' => $exception->getCode()], __METHOD__, __LINE__);
            return redirect()->back()->with('error', __('global.A.error.sendmail'));
        }
        return redirect()->back()->with('success', __('global.A.success.admin.sendmail'));
    }



}
