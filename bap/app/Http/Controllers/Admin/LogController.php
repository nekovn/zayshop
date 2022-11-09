<?php

namespace App\Http\Controllers\Admin;

use App\Enums\DefaultDefine;
use App\Services\LogService;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseControllerTrait;

class LogController
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
    public $acceptBtn;
    public $contextActive;
    public $contextInactive;
    public $screen;
    public $thead;
    public $routeName;
    public $type;

    public function __construct(LogService $logService)
    {
        $this->service = $logService;
        $this->defaultPerPage = DefaultDefine::PER_PAGE;
        $this->defaultSort = DefaultDefine::SORT_DEFAULT;
        $this->searchBy = ['message_code', 'file_line', 'screen'];
        $this->acceptBtn = ['reload', 'delete'];
        $this->screen = 'admin.log';
        $this->thead = 'log';
        $this->routeName = route('admin.log');
        $this->type = 'table';

    }

    public function log(Request $request)
    {
        try {
            $per_page = $request->per_page ?? $this->defaultPerPage;
            $order = $request->sort ?? $this->defaultSort;
            $sort = $request->sort ?? '';
            $conditions = ['where' => [], 'order' => ['id' => $order], 'simplePaginate' => $per_page];
            $data = $this->findItemWithConditionTrait($conditions);
            $exception = [
                'count' => $this->getTotalRecordTrait(),
                'per_page' => $per_page,
                'sort' => $sort,
                'searchBy' => $this->searchBy,
                'statusBtn' => [],
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

}
