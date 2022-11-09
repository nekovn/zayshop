<?php

namespace App\Http\Controllers\Admin;

use App\Enums\DefaultDefine;
use App\Http\Controllers\BaseControllerTrait;
use App\Http\Controllers\Requests\auth\BannerRequest;
use App\Services\BannerService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BannerController
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

    public function __construct(BannerService $bannerService)
    {
        $this->service = $bannerService;
        $this->defaultPerPage = DefaultDefine::PER_PAGE;
        $this->defaultSort = DefaultDefine::SORT_DEFAULT;
        $this->searchBy = ['title', 'image', 'updated_by'];
        $this->acceptBtn = ['reload', 'change-status', 'delete'];
        $this->contextActive = __('global.S.show');
        $this->contextInactive = __('global.S.not.show');
        $this->screen = 'admin.banner';
        $this->thead = 'banner';
        $this->routeName = route('admin.banner');
        $this->type = 'table';
    }

    public function banner(Request $request)
    {
        try {
            $per_page = $request->per_page ?? $this->defaultPerPage;
            $order = $request->sort ?? $this->defaultSort;
            $sort = $request->sort ?? '';
            $conditions = ['where' => [], 'order' => ['id' => $order], 'simplePaginate' => $per_page];
            $data = $this->findItemWithConditionTrait($conditions);
            $statusBtn = $this->getStatusBtn(DefaultDefine::STATUS_BTN);
            $exception = [
                'count' => $this->getTotalRecordTrait(),
                'per_page' => $per_page,
                'sort' => $sort,
                'searchBy' => $this->searchBy,
                'statusBtn' => $statusBtn,
                'acceptBtn' => $this->acceptBtn,
                'showCreated' => true,
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
     * データを編集する
     * @param BannerRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit(BannerRequest $request)
    {
        DB::beginTransaction();
        try {
          app(BannerService::class)->handleEdit($request->validated());
          DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            $this->createLog(['message' => $exception->getMessage(), 'code' => $exception->getCode()], __METHOD__, __LINE__);
            return redirect()->back()->with('error', __('global.A.error.edit'));
        }

        return redirect()->back()->with('success', __('global.A.success.edit'));
    }

    /**
     * データを作成する
     * @param BannerRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(BannerRequest $request)
    {
        DB::beginTransaction();
        try {
            app(BannerService::class)->handleCreate($request->validated());
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            $this->createLog(['message' => $exception->getMessage(), 'code' => $exception->getCode()], __METHOD__, __LINE__);
            return redirect()->back()->with('error', __('global.A.error.create'));
        }
        return redirect()->back()->with('success', __('global.A.success.create'));
    }

}
