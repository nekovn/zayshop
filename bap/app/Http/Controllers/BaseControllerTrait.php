<?php

namespace App\Http\Controllers;

use App\Enums\CodeDefine;
use App\Enums\DefaultDefine;
use App\Helpers\Blade\Table\auth\Helper as Table;
use App\Helpers\Form\Helper as Form;
use App\Models\Code;
use App\Models\LogInfo;
use App\Models\Utilities;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Boolean;

trait BaseControllerTrait
{
    public function store(Request $request)
    {
        $this->service->store($request->except('_token'));
    }

    public function sendMail($mail)
    {
        $this->service->sendMail($mail);
    }

    /**
     * @param array $conditions
     * @param boolean $first
     * @return array
     */
    public function findItemWithCondition(array $conditions, $first = false): array
    {
        return [
            'items' => $this->service->find($conditions, $first)
        ];
    }

    public function getTotalRecord($columns = [], $defaultText = '')
    {
        return $this->service->total($columns, $defaultText);
    }

    /**
     * 内容を表示する配列を取得する
     * @param String $route ルーティング
     * @param String $type タイプ
     * @param String $thead フィールド
     * @param Boolean $showCreated クリエイトボタン
     * @return array
     */
    public function getArrayShowContent($route, $type, $thead, $showCreated = false): array
    {
        return [
            'route' => $route,
            'type' => $type,
            'thead' => $thead,
            'showCreated' => $showCreated
        ];
    }


    /**
     * 検索キーによって、データを検索する
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function search(Request $request)
    {
        try {
            $thead = config("app-settings-admin.thead.$this->thead");
            $search = $request->search ?? '';
            $status = get_status($request->status) ?? '';

            $sort = $request->sort == 'default' ? DefaultDefine::SORT_DEFAULT : $request->sort;
            $keyword = explode(" ", trim(preg_replace('/\s+/', ' ', $search)));

            $data = $this->service->search($keyword, ['default' => $this->searchBy, 'status_id' => $status, 'order' => ['id' => $sort]]);

            if ($data) {
                $xhtml = Table::showTbody($data, $thead);
                $pagination = "";
            } else {
                $per_page = $request->per_page ?? $this->defaultPerPage;
                $where = $status ? [['status_id', $status]] : [];
                $conditions = ['where' => $where, 'order' => ['id' => $sort], 'simplePaginate' => $per_page];
                $data = $this->findItemWithCondition($conditions);

                $xhtml = Table::showTbody($data['items']['data'], $thead);

                $pagination = Table::showPagination($data['items'], $this->getTotalRecord(), $per_page, $this->routeName, $sort);
            }

            return response()->json(['data' => ['xhtml' => $xhtml, 'pagination' => $pagination], 'result' => true]);
        } catch (\Exception $exception) {
            $this->createLog(['message' => $exception->getMessage(), 'code' => $exception->getCode()], __METHOD__, __LINE__);
            return response()->json(['data' => [], 'result' => false]);
        }
    }

    /**
     * ステータスを選択する
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getStatus(Request $request)
    {
        try {
            $thead = config("app-settings-admin.thead.$this->thead");
            $sort = $request->sort == 'default' ? DefaultDefine::SORT_DEFAULT : $request->sort;
            $status = get_status($request->status) ?? '';
            $where = $status !== '' ? [['status_id', $status]] : [];
            $conditions = ['where' => $where, 'order' => ['id' => $sort]];
            $data = $this->findItemWithCondition($conditions);
            $xhtml = Table::showTbody($data['items'], $thead);
            //count statusを取得する。
            $statusBtn = $this->getStatusBtn($where);
            return response()->json(['data' => ['xhtml' => $xhtml, 'pagination' => '', 'number' => $statusBtn['number']], 'result' => true]);
        } catch (\Exception $exception) {
            $this->createLog(['message' => $exception->getMessage(), 'code' => $exception->getCode()], __METHOD__, __LINE__);
            return response()->json(['data' => [], 'result' => false]);
        }
    }

    /**
     * ステータスボタンをクリックする
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function changeStatus(Request $request)
    {
        DB::beginTransaction();
        try {
            $id = optional($request)->id;
            $status = $request->status == 'true' ? CodeDefine::ACTIVE_VALUE : CodeDefine::INACTIVE_VALUE;
            $where = $status !== '' ? [['status_id', $status]] : [];
            $conditions = ['id' => $id, 'column' => ['exception' => 'change-status']];
            $result = $this->service->update($conditions);
            if (!$result) {
                DB::rollBack();
                $this->createLog(['message' => 'update failed', 'code' => '500'], __METHOD__, __LINE__);
                return response()->json(['data' => [], 'result' => false]);
            }
            //count statusを取得する。
            $statusBtn = $this->getStatusBtn($where);
            DB::commit();
            return response()->json(['data' => ['id' => $id, 'number' => $statusBtn['number']], 'result' => $result]);
        } catch (\Exception $exception) {
            DB::rollback();
            $this->createLog(['message' => $exception->getMessage(), 'code' => $exception->getCode()], __METHOD__, __LINE__);
            return response()->json(['data' => [], 'result' => false]);
        }
    }

    /**
     * 並び順をする
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function sort(Request $request)
    {
        try {
            $thead = config("app-settings-admin.thead.$this->thead");
            $sort = $request->sort ?? DefaultDefine::SORT_DEFAULT;
            $per_page = $request->per_page ?? $this->defaultPerPage;
            $status = get_status($request->status) ?? '';
            $where = $status !== '' ? [['status_id', $status]] : [];

            $conditions = ['where' => $where, 'order' => ['id' => $sort], 'simplePaginate' => $per_page];
            $data = $this->findItemWithCondition($conditions);

            $xhtml = Table::showTbody($data['items']['data'], $thead);
            $pagination = Table::showPagination($data['items'], $this->getTotalRecord(), $per_page, $this->routeName, $sort);

            return response()->json(['data' => ['xhtml' => $xhtml, 'pagination' => $pagination], 'result' => true]);
        } catch (\Exception $exception) {
            $this->createLog(['message' => $exception->getMessage(), 'code' => $exception->getCode()], __METHOD__, __LINE__);
            return response()->json(['data' => [], 'result' => false]);
        }

    }

    /**
     * データを削除する
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Request $request)
    {
        DB::beginTransaction();
        try {
            $id = optional($request)->id;
            //条件：
            $conditions = count($id) ? ['id' => $id] : [['id', $id]];
            //強制に削除する
            $result = $this->service->logicalDelete($conditions);
            //statusがあれば、count statusを取得する。逆に空白にする
            $status = get_status($request->status) ?? '';
            $where = $status !== '' ? [['status_id', $status]] : [];
            $statusBtn = $this->getStatusBtn($where)['number'];
            DB::commit();
            return response()->json(['data' => ['id' => $id, 'number' => $statusBtn], 'result' => $result]);
        } catch (\Exception $exception) {
            DB::rollback();
            $this->createLog(['message' => $exception->getMessage(), 'code' => $exception->getCode()], __METHOD__, __LINE__);
            return response()->json(['data' => [], 'result' => false]);
        }

    }

    /**
     * Modalを開く
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function open(Request $request)
    {
        try {
            $id = optional($request)->id;
            $modalName = $this->thead;
            //元データ
            $conditions = ['where' => [['id', $id]]];
            $oldValue = $this->findItemWithCondition($conditions, true);

            $config = config("app-settings-admin.modal-open.$modalName");

            $url = Route::has("admin.$modalName.${config['url']}") ? route("admin.$modalName.${config['url']}") : '';
            $responseData = ['old' => $oldValue['items'], 'url' => $url];

            return response()->json(['data' => array_merge($config, $responseData), 'result' => true]);

        } catch (\Exception $exception) {
            DB::rollback();
            $this->createLog(['message' => $exception->getMessage(), 'code' => $exception->getCode()], __METHOD__, __LINE__);
            return response()->json(['data' => [], 'result' => false]);
        }
    }

    /**
     * メール送信Modalを開く
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function openSendMail(Request $request)
    {
        $id = optional($request)->id;
        $modalName = $this->thead;
        //元データ
        $conditions = ['where' => [['id', $id]]];
        $oldValue = $this->findItemWithCondition($conditions, true);

        $config = config("app-settings-admin.modal-sendmail.$modalName");
        $acceptData = Arr::only($config, ['textarea', 'hidden']);

        $input = Form::setInputEditData($acceptData, $config['label'], $oldValue, false);

        $url = Route::has("admin.$modalName.${config['url']}") ? route("admin.$modalName.${config['url']}") : '';
        $responseData = ['old' => $oldValue['items'], 'url' => $url, 'input' => $input];

        return response()->json(['data' => array_merge($config, $responseData), 'result' => true]);


    }


    /**
     * 編集Modalを開く
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function openEdit(Request $request)
    {
        $id = optional($request)->id;
        $modalName = $this->thead;

        //元データ
        $conditions = ['where' => [['id', $id]]];
        $oldValue = $this->findItemWithCondition($conditions, true);
        $config = config("app-settings-admin.modal-edit.$modalName");
        $acceptData = Arr::only($config, ['text', 'image', 'multiple_image', 'hidden', 'select', 'textarea', 'checkbox']);

        $title = $config['title'];
        $submitBtn = $config['submitBtn'];

        if (isset($acceptData['checkbox'])) {
            $acceptData = $this->getUtilityCheckBox($acceptData);
        }
        if (isset($acceptData['select'])) {
            $acceptData = $this->getValueSelect($acceptData);
        }
        $input = Form::setInputEditData($acceptData, $config['label'], $oldValue);
        $url = Route::has("admin.$modalName.${config['url']}") ? route("admin.$modalName.${config['url']}") : '';



        return response()->json(['data' => ['title' => $title, 'submitBtn' => $submitBtn, 'input' => $input, 'url' => $url], 'result' => true]);
    }


    /**
     * 作成Modalを開く
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function openCreate(Request $request)
    {
        $modalName = $this->thead;
        $inputData = config("app-settings-admin.modal-create.$modalName");
        $acceptData = Arr::only($inputData, ['text', 'image', 'multiple_image', 'hidden', 'select', 'textarea', 'checkbox', 'password', 'date']);
        $title = $inputData['title'];
        $submitBtn = $inputData['submitBtn'];
        if (isset($acceptData['checkbox'])) {
            $acceptData = $this->getUtilityCheckBox($acceptData);
        }
        if (isset($acceptData['select'])) {
            $acceptData = $this->getValueSelect($acceptData);
        }
        $input = Form::setInputCreateData($acceptData, $inputData['label']);
        $route = Route::has("admin.$modalName.${inputData['url']}") ? route("admin.$modalName.${inputData['url']}") : '';
        return response()->json(['data' => ['title' => $title, 'submitBtn' => $submitBtn, 'input' => $input, 'url' => $route], 'result' => true]);
    }

    /**
     * checkboxデータを取得する
     * @param $acceptData
     * @return array
     */
    protected function getUtilityCheckBox($acceptData): array
    {
        foreach ($acceptData['checkbox'] as &$value) {
            $value = Utilities::where(['code' => $value, 'status' => CodeDefine::ACTIVE_VALUE])
                ->orderBy('sequence')->get()->toArray();
        }
        return $acceptData;
    }

    /**
     * selectデータを取得する
     * @param $acceptData
     * @return array
     */
    protected function getValueSelect($acceptData): array
    {
        foreach ($acceptData['select'] as &$value) {
            $value = Code::where(['code' => $value, 'status' => CodeDefine::ACTIVE_VALUE])
                ->orderBy('sequence')->with('code_value')->first()->toArray();

        }
        return $acceptData;
    }


    /**
     * active,inactionのカウントを取得する
     * @param $where
     * @return mixed
     */
    public function getStatusBtn($where)
    {
        $conditionStatusBtn = ['where' => $where, 'selectRaw' => 'count(id) as number, status_id', 'groupBy' => 'status_id'];
        return $this->service->total($conditionStatusBtn, $this->contextInactive);
    }

    /**
     * response()->json()でクライアントにデータを返す
     * @param $data
     * @param $result
     * @return array
     */
    public function getResponse($data, $result): array
    {
        $result = [
            'result' => $result
        ];
        return array_merge($result, $data);
    }

    /**
     * エラーがあれば、ログを記録する
     * @param $exception
     * @return void
     */

    /**
     * エラーがあれば、ログを記録する
     * @param $method
     * @param $line
     * @return void
     */
    public function createLog($exception, $method, $line)
    {
        $model = new LogInfo();
        $messages = $exception['message'];
        $code = $exception['code'];

        $values = [
            'message_code' => $messages . "_" . $code,
            'file_line' => $method . "_" . $line,
            'screen' => $this->screen,
        ];
        $model->create($values);
    }

}
