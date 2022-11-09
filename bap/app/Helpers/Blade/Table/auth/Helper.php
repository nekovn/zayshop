<?php

namespace App\Helpers\Blade\Table\auth;

use App\Enums\DefaultDefine;
use App\Helpers\RenderIconSvg;
use Illuminate\Support\Facades\Lang;

class Helper
{
    use RenderIconSvg;

    /**
     * Tableでtheadを表示する
     * @param $items
     * @return string
     */
    public static function showThead($items): string
    {
        $xhtml = '';
        if ($items) {
            foreach ($items as $key => $item) {
                if ($key == 'id') {
                    $xhtml .= '<th class="w-1"><input class="form-check-input m-0 align-middle" type="checkbox" data-id="" id="select-all"></th>';
                } else {
                    $xhtml .= "<th>$item</th>";
                }

            }
        }
        return $xhtml;
    }

    /**
     * Prev and Next ボタンを表示する
     * @param $url
     * @param $btn
     * @return string
     */
    public static function showBtnPagination($url, $btn): string
    {
        $xhtml = "";
        $icon = self::renderElementIcon($btn);
        $btnName = ($btn == 'paginationPrev') ? $icon . Lang::get('global.B.text.previous') : Lang::get('global.B.text.next') . $icon;
        $xhtml .= "<li class='page-item'><a class='page-link' id='$btn' href='$url'>$btnName</a></li>";
        $xhtml .= "";
        return $xhtml;
    }

    /**
     * Limitページを表示する
     * @param $limitPage
     * @param $currentPage
     * @param $paginate
     * @param $route
     * @return string
     */
    public static function showListPagination($limitPage, $currentPage, $paginate, $route, $sort): string
    {
        $xhtml = '';
        if ($limitPage > 1) {
            for ($i = 1; $i <= $limitPage; $i++) {
                $sortPage = $sort ? "&sort=$sort" : "";
                $per_page = $paginate ? "&per_page=$paginate" : "";
                $link = $route . "?page=$i$per_page$sortPage";
                $active = $i == $currentPage ? 'active' : '';
                $xhtml .= "<li class='page-item $active'><a class='page-link' href='$link'>$i</a></li>";
            }
        }
        return $xhtml;
    }

    /**
     * 合計ページを表示する
     * @param $currentPage
     * @param $last_page
     * @param $total
     * @return string
     */
    public static function showTotalPage($currentPage, $last_page, $total): string
    {
        $showText = __('global.P.show.page', ['currentPage' => $currentPage, 'lastPage' => $last_page, 'totalPage' => $total]);
        return "<p class='m-0 text-muted'>$showText</p>";
    }


    /**
     * Tbodyを表示する
     * @param $items
     * @param $thead
     * @return string
     */
    public
    static function showTbody($items, $thead): string
    {
        $xhtml = "";
        if ($items && $thead) {
            foreach ($items as $value) {
                $xhtml .= "<tr>";
                foreach ($thead as $column => $attribute) {
                    if (array_key_exists($column, $value)) {
                        $status_name = $value['status_name'] ?? '';
                        $status = $value['status_id'] ?? '';
                        $image = (isset($value['image']) && $value['image']) ? $value['image'] : '';
                        $xhtml .= self::showTbodyContent($column, $value[$column], $status_name, $value['id'], $status, $image);
                    }
                }
                $xhtml .= "</tr>";
            }
        }
        return $xhtml;
    }

    /**
     * Tbodyコンテンツを表示する
     * @param $column
     * @param $attribute
     * @param $status_name
     * @param $status
     * @param $image
     * @return string
     */
    static function showTbodyContent($column, $attribute, $status_name, $id, $status, $image): string
    {
        $xhtml = '';
        $subClass = (in_array($column, ['subject', 'textarea', 'replied_content'])) ? 'hidden-text' : '';
        switch ($column) {
            case 'id':
                $dataImage = $image ? "data-image='${image}'" : "";
                $xhtml .= "<td><input class='form-check-input m-0 align-middle' type='checkbox' data-id='$attribute' $dataImage></td>";
                break;
            case 'status_name':
                $className = $status ? 'bg-success' : 'bg-danger';
                $xhtml .= "<td title='status' data-id='$id' data-status='$status'><span class='badge $className me-1'></span>$status_name</td>";
                break;
            case 'button':
                $xhtml .= self::showTbodyContentBtn($column, $attribute, $id);
                break;
            default:
                if (is_array($attribute)) {
                    $xhtml .= self::showListElement($attribute);
                } else {
                    if ($attribute) {
                        $xhtml .= "<td><span class='text-muted hidden-text' title='$attribute'>$attribute</span></td>";
                    }
                }
                break;
        }
        return $xhtml;
    }

    /**
     * リストエレメントを表示する
     * @param $attribute
     * @return string
     */
    public static function showListElement($attribute): string
    {
        $xhtml = '<td><ul>';
        foreach ($attribute as $value) {
            $xhtml .= "<li class='text-muted'>{$value['name']}</li>";
        }
        $xhtml .= '</ul></td>';
        return $xhtml;
    }

    /**
     * Tbodyコンテンツボタンを表示する
     * @param $column
     * @param $attribute
     * @param $id
     * @return string
     */
    public static function showTbodyContentBtn($column, $attribute, $id): string
    {
        $xhtml = "";
        if ($column == "button") {
            $default = $attribute["default"]["lang"];
            $xhtml .= "<td class='text-end'><span class='dropdown'>";
            $xhtml .= "<button class='btn dropdown-toggle align-text-top'>$default</button>";
            $xhtml .= "<div class='dropdown-menu dropdown-menu-end'>";
            foreach ($attribute as $button) {
                $btnName = $button['lang'];
                $btnType = $button['type'];
                $xhtml .= "<button class='dropdown-item' data-id='$id' data-type='$btnType'>$btnName</button>";
            }
            $xhtml .= "</div></span></td>";
        }
        return $xhtml;
    }

    /**
     * ページを表示する
     * @param $items
     * @param $count
     * @param $per_page
     * @param $route
     * @return string
     */
    public static function showPagination($items, $count, $per_page, $route, $sort = ''): string
    {
        $xhtml = '';
        if ($items['prev_page_url']) {
            $xhtml .= self::showBtnPagination($items['prev_page_url'], 'paginationPrev');
        }
        $xhtml .= self::showListPagination(ceil($count / $items['per_page']), $items['current_page'], $per_page, $route, $sort);
        if ($items['next_page_url']) {
            $xhtml .= self::showBtnPagination($items['next_page_url'], 'paginationNext');
        }
        return $xhtml;
    }

    /**
     * Row,Searchを表示する
     * @param $label
     * @param $form
     * @param $subText
     * @param $functionId
     * @param $class
     * @return string
     */
    public static function showFilterForm($label, $form, $subText, $functionId, $class = 'col'): string
    {
        return "<div class='col-xl-3'>
                 <div class='form-group mb-2 row'>
                    <label class='text-muted col-3 col-form-label' for='$functionId'>$label:</label>
                    <div class='$class'>
                        $form
                        <small class='form-hint'>$subText</small>
                    </div>
                 </div>
               </div>";
    }

    /**
     * Search sub text inputを表示する
     * @param $searchBy
     * @param $config
     * @return string
     */
    public static function showSubTextSearch($searchBy, $config): string
    {
        $xhtml = '';
        foreach ($searchBy as $key => $value) {
            if ($value && $config) {
                if (array_key_exists($value, $config)) {
                    $xhtml .= "$config[$value]";
                    $xhtml .= (count($searchBy) - 1) == $key ? '.' : ',';
                }
            }
        }
        return $xhtml;
    }

    /**
     * ボタン: change-status, reload, deleteを表示する
     * @param $listButton
     * @param $functionId
     * @param $accept [change status, reload, delete]
     * @return string
     */
    public static function showListButton($listButton, $functionId, $accept): string
    {
        $xhtml = '';
        foreach ($listButton as $id => $btn) {
            if (array_key_exists($id, array_flip($accept))) {
                $xhtml .= "<div class='col-xl-2 mb-2'>
                               <button class='btn ${btn['class']}' id='$functionId-$id'>
                                 <span title='${btn['text']}'>${btn['text']}</span>
                               </button>
                           </div>";
            }
        }
        return $xhtml;
    }

    /**
     * 選択ステータスを表示する
     * @param $filterStatus
     * @param $statusBtn
     * @param $functionId
     * @return string
     */
    public static function showFilterStatus($filterStatus, $statusBtn, $functionId): string
    {
        $xhtml = '';
        if ($statusBtn) {
            foreach ($filterStatus as $id => $status) {
                $text = $statusBtn['status_name'] ?? $status['text'];
                $number = $statusBtn['number'] ?? $status['number'];
                $xhtml .= "<div class='col-xl-3 mb-2'>
                             <button class='btn' id='$functionId-$id' data-status='false'>
                                 <span title='' class='pe-1 bg-red-lt'>$number</span>$text
                             </button>
                           </div>";
            }
        }

        return $xhtml;
    }

    /**
     * 並び順を表示する
     * @param $sortData
     * @param $functionId
     * @return string
     */
    public static function showShortData($sortData, $functionId): string
    {
        $xhtml = "";
        if ($sortData) {
            $active = request()->has('sort') ? request()->sort : 'default';
            $xhtml .= "<div class='col-xl-3 mb-2'>";
            $xhtml .= "<select class='form-select' id='$functionId-sort' name='per_page'>";
            foreach ($sortData as $value => $name) {
                $selected = $value == $active ? 'selected' : '';
                $xhtml .= "<option value='$value' $selected >$name</option>";
            }
            $xhtml .= "</select></div>";
        }

        return $xhtml;

    }

    /**
     * 作成ボタンを表示する
     * @param $functionId
     * @return string
     */
    public static function showButtonCreate($functionId): string
    {
        $icon = self::renderElementIcon('Create');
        $btnName = __('global.B.create');
        return "<div class='btn-list'>
                    <button class='btn btn-primary d-none d-sm-inline-block' id='$functionId-create'>
                        $icon $btnName
                    </button>
                </div>";

    }

}
