<?php

namespace App\Helpers\Blade\Table\client;

use App\Exceptions\ApplicationException;
use App\Helpers\RenderIconSvg;
use Illuminate\Support\Facades\Lang;
use function config;

class Helper
{

    static $configClient;
    use RenderIconSvg;

    public function __construct()
    {
        self::$configClient = config('app-settings-client');
    }

    /**
     * /members/payでtheadを表示する
     * @param $field
     * @return string
     */
    public static function showTheadInvoice($field): string
    {
        $xhtml = '';
        foreach($field as $item) {
            $class = $item['class'] ? "class='${item['class']}'": '';
            $style = $item['style'] ? "style='${item['style']}'": '';
            $xhtml.= "<th $class $style>${item['name']}</th>";
        }
        return $xhtml;
    }

    /**
     * /members/payでtbodyを表示する
     * @param $lists
     * @return string
     */
    public static function showTbodyInvoice($lists): string
    {
        $total = Lang::get('global.T.invoice.total');
        $xhtml = '';
        foreach ($lists['item'] as $key => $list) {
            $stt = $key + 1;
            $note = $list['note'] ? "<div class='text-muted'>${list['note']}</div>" : "";
            $xhtml.= "<tr>
                    <td class='text-center'>$stt</td>
                    <td>
                        <p class='strong mb-1'>${list['service']}</p>$note
                    </td>
                    <td class='text-end'>${list['util_price']}</td>
                    <td class='text-center'>${list['amount']}</td>
                    <td class='text-end'>${list['into_money']}</td>
                  </tr>";
        }
        $xhtml.= "<tr><td colspan='4' class='strong text-end'>$total</td><td class='text-end'>${lists['total']}</td></tr>";
        return $xhtml;
    }

    /**
     * /members tableでtbodyを表示する
     * @param $thead
     * @param $items
     * @return string
     */
    public static function showTbodyTable($thead, $items): string
    {
        $xhtml = '';
        if(array_key_exists($thead, $items)) {
            foreach ($items[$thead] as $key => $item) {
                $stt = $key + 1;
                $xhtml.= "<tr><td><span class='text-muted'>$stt</span></td>";
                $xhtml.= "<td><a href='${item['link']}' class='text-reset' tabindex='-1'>${item['title']}</a></td>";
                $created = "<td>${item['created_date']}</td>";
                $attribute = self::showAttributeTable($item);
                $xhtml.= self::renderTbodyFile($thead, $item, $attribute, $created);
            }
        }
        return $xhtml;
    }

    /**
     * showTbodyTableの子供
     * @param $item
     * @return array
     */
    public static function showAttributeTable($item): array
    {
        $btnSee = Lang::get('global.B.see');
        $sttSuccess = Lang::get('global.S.success');
        $sttWarning = Lang::get('global.S.warning');
        $btn = "<td class='text-end'>
                            <div class='btn-list flex-nowrap'>
                                <a href='${item['link']}' class='btn'>
                                    $btnSee
                                </a>
                            </div>
                    </td></tr>";
        return ['btn' => $btn, 'success' => $sttSuccess, 'warning' => $sttWarning];
    }

    /**
     * showTbodyTableの子供
     * @param $thead
     * @param $item
     * @param $attribute
     * @param $created
     * @return mixed
     */
    public static function renderTbodyFile($thead, $item, $attribute, $created)
    {
        $name = ucfirst($thead);
        $fileName = "showTbody$name";
        if (method_exists(self::class,$fileName)) {
            return self::$fileName($item, $attribute, $created);
        } else {
            throw new ApplicationException(Lang::get('global.T.exception.not.method.tbody'));
        }

    }

    /**
     * /members/history tableでtbodyを表示する
     * @param $item
     * @param $attribute
     * @param $created
     * @return string
     */
    public static function showTbodyHistory($item, $attribute, $created):string
    {
        $iconStatus = $item['status'] == 'success' ? $attribute['success'] : $attribute['warning'];
        $room = "<td class='text-center'>${item['room']}</td>";
        $code = "<td>${item['code']}</td>";
        $price = "<td>${item['price']}</td>";
        $status = "<td><span class='badge bg-${item['status']} me-1'></span> $iconStatus</td>";
        return "$room $code $created $status $price ${attribute['btn']}";
    }

    /**
     * /members/Notify tableでtbodyを表示する
     * @param $item
     * @param $attribute
     * @param $created
     * @return string
     */
    public static function showTbodyNotify($item, $attribute, $created):string
    {
        return "$created ${attribute['btn']}";
    }
}
