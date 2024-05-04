<?php

namespace App\Repositories;

use App\Enums\DefaultDefine;
use App\Helpers\Util\Helper;

trait BaseRepositoryTrait
{
    abstract protected function getModel();

    public function create(array $values)
    {
        return $this->getModel()->create($values);
    }


    public function inset(array $values)
    {
        $this->getModel()->insertGetId($values);
    }

    /**
     * 指定条件を基にデータを取得する。
     * 検索条件は全てANDとする。ORや副問い合わせ等が必要なクエリーは各Repositoryクラスに記載する。
     *
     * @param array $conditions クエリーを発行する条件を指定する。
     *              ['where' => [['id',1], ...],       where句に指定する条件を定義。未指定の場合、全件取得となる。
     *               'includeInActive' => true,           無効なデータを対象とするか。
     *               'order' => [item => asc/desc, ...] ソート順を指定する。指定なしの場合、ソート順なしのクエリーを発行する。
     *               'offset' => 0,                       取得開始位置を指定する。未指定の場合、指定なし
     *               'limit' => 25,                       取得件数の制限を指定する。未指定の場合、指定なし
     *               'select' => ['id as id', ...]        取得項目を指定する。未指定の場合、全項目を取得する。
     *              ]
     * @param boolean $first
     * @return array 取得結果
     */
    public function find(array $conditions, bool $first = false)
    {
        $model = $this->getModel();
        if ($conditions) {
            foreach ($conditions as $name => $value) {
                switch ($name) {
                    case 'select':
                        if ($value) {
                            $model = $model->select($value);
                        }
                        break;
                    case 'where':
                        if ($value) {
                            $model = $model->where($value);
                        }
                        break;
                    case 'trashed':
                        $model = $model->withTrashed();
                        break;
                    case 'order':
                        foreach ($value as $key => $order) {
                            $model = $model->orderBy($key, $order);
                        }
                        break;
                    case 'paginate':
                        if ($value) {
                            $model = $model->paginate($value);
                        }
                        break;
                    case 'simplePaginate':
                        if ($value) {
                            $model = $model->simplePaginate($value);
                        }
                        break;
                    case 'offset':
                        if ($value) {
                            $model = $model->skip($value);
                        }
                        break;
                    case 'limit':
                        if ($value) {
                            $model = $model->take($value);
                        }
                        break;
                    default:
                        break;
                }
            }
        }
        if ($first) {
            return $model->first()->toArray();
        } else if (isset($conditions['paginate']) || isset($conditions['simplePaginate'])) {
            return $model->toArray();
        } else {
            return $model->cursor()->toArray();
        }


    }


    public function total(array $conditions = [], $defaultText = '')
    {
        if ($conditions) {
            $model = $this->getModel();
            foreach ($conditions as $name => $value) {
                switch ($name) {
                    case 'select':
                        if ($value) {
                            $model = $model->select($value);
                        }
                        break;
                    case 'selectRaw':
                        if ($value) {
                            $model = $model->selectRaw($value);
                        }
                        break;
                    case 'where':
                        if ($value) {
                            $model = $model->where($value);
                        }
                        break;
                    case 'groupBy';
                        if ($value) {
                            $model = $model->groupBy($value);
                        }
                        break;
                    default:
                        break;
                }
            }
            $result = $model->cursor()->first();
            if ($result) {
                return $result->toArray();
            } else {
                return ['number' => 0, 'status_name' => $defaultText];
            }

        }
        return $this->getModel()->count();
    }

    public function search($keyword, $search)
    {
        $data = [];
        if (is_array($keyword)) {
            foreach ($keyword as $k) {
                if ($k != "") {
                    $data = $this->whereRawSearch($search, $k);
                } else {
                    return [];
                }
            }
        } else {
            $data = $this->whereRawSearch($search, $keyword);
        }

        return $data->cursor()->toArray();
    }

    public function whereRawSearch($search, $keyword)
    {
        $model = $this->getModel();

        foreach ($search as $name => $value) {
            switch ($name) {
                case 'default':
                    $concat = $this->setQueryConcat($search['default']);
                    $model = $model->whereRaw($concat,
                        str_replace(array('\\', '%', '_'), array('\\\\', '\%', '\_'), $keyword)
                    );
                    break;
                case 'order':
                    if (is_array($value)) {
                        foreach ($value as $key => $order) {
                            $model = $model->orderBy($key, $order);
                        }
                    }
                    break;
                case 'status_id':
                    if ($value) {
                        $model = $model->where('status_id', $value);
                    }
                    break;
                default:
                    break;
            }
        }
        return $model;
    }

    public function setQueryConcat($search): string
    {
        $concat = "CONCAT(";
        foreach ($search as $key => $s) {
            $concat .= "ifnull(LCASE($s),'')";
            $concat .= (count($search) - 1) == $key ? '' : ',';
        }
        $concat .= ') LIKE CONCAT(\'%\', ?,\'%\')';
        return $concat;
    }

    /**
     * $conditions = ['id' => $id, 'column' => ['tell' => '0918147931',
     *                                          'name' => 'cuong',
     *                                          'exception' => 'change-status'
     * ]];
     * @param array $conditions
     * @return mixed
     */
    public function update(array $conditions = [])
    {
        $model = $this->getModel();
        return $model->whereIn('id', $conditions['id'])->chunk(10, function ($model) use ($conditions) {
            foreach ($conditions['column'] as $name => $value) {
                foreach ($model as $attribute) {
                    if (isset($attribute->$name)) {
                        $attribute->$name = $value;
                    } else {
                        if ($name == 'exception') {
                            if ($value == 'change-status') {
                                $attribute->status_id = ($attribute->status_id == '1') ? '0' : '1';
                            }
                        }
                    }
                    $attribute->save();
                }
            }
        });
    }

    /**
     *  論理削除を行う。
     * @param array $conditions
     * @return mixed
     */
    public function logicalDelete(array $conditions = [])
    {
        $model = $this->getModel();
        if (isset($conditions['id']) && is_array($conditions['id'])) {
            try {
                return $model->whereIn('id', $conditions['id'])->chunk(10, function ($model) {
                    foreach ($model as $attribute) {
                        if (optional($attribute)->image) {
                            Helper::deleteOldImage(DefaultDefine::IMAGE_PATH, DefaultDefine::IMAGE_DISK_PATH, $attribute->image);
                        }
                        $attribute->delete();
                    }
                });
            } catch (\Exception $exception) {
                return false;
            }
        } else {
            return $model->where($conditions)->delete();
        }
    }

    /**
     * 物理削除を行う。
     * @param array $conditions
     * @param $checkOption
     * @return int|mixed
     */
    public function delete(array $conditions = [], $checkOption = true)
    {
        $model = $this->getModel();
        if (!$checkOption) {
            unset($conditions['updated_at']);
        }
        $count = $model->where($conditions)->forceDelete();
//        if ($checkOption && $count === 0) {
//            throw new OptimisticLockException();
//        }
        return $count;

    }

}
