<?php

namespace App\Helpers\Blade\Menu;

use App\Exceptions\ApplicationException;
use App\Helpers\RenderIconSvg;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Route;

class Helper
{
    use RenderIconSvg;

    /**
     * アクティブメニュー
     * @param $routeName
     * @param $level
     * @return string
     */
    public static function activeClass($routeName, $level): string
    {
        return (request()->segment($level) == $routeName) ? 'active' : '';
    }

    /**
     * config値を設定する
     * @param $configName
     * @param $attributes
     * @param $element
     * @return void
     */
    public static function setValueConfig($configName, $attributes, $element): void
    {
        foreach ($attributes as $key => $value) {
            if(config("$configName.$key")) {
                config()->set("$configName.$key.$element", $value);
            }
        }
    }

    /**
     * /members 会員メニューを表示する
     * @param $arrayNote
     * @return string
     */
    public static function showMenuMember($arrayNote): string
    {
        self::setValueConfig("app-settings-client.member-menu", $arrayNote, 'note');
        $menu = config('app-settings-client.member-menu');
        $xhtml = '';
        foreach ($menu as $key => $item) {
            $active = self::activeClass($key, '2');
            $link = Route::has($item['route']) ? route($item['route']) : '/';
            $note = $item['note'] ? "<small class='text-muted ms-auto'>${item['note']}</small>" : "";
            $xhtml.= "<a class='list-group-item list-group-item-action d-flex align-items-center $active' href='$link'>
                        ${item['name']} $note
                      </a>";
        }
        return $xhtml;
    }

    /**
     *  Main メニューを表示する
     * @return string
     */
    public static function showMenu(): string
    {
        $menuMain= config('app-settings-client.main-menu');
        $xhtml = '';
        foreach ($menuMain as $menu) {
            $active = self::activeClass($menu['link'], '1');
            $icon = self::renderElementIcon($menu['icon']);
            $route = "/${menu['link']}";
            $xhtml .= "<li class='nav-item $active'>
                            <a class='nav-link' href='$route'>
                                <span class='nav-link-icon d-md-none d-lg-inline-block'>$icon</span>
                                <span class='nav-link-title'>
                                    ${menu['text']}
                                </span>
                            </a>
                       </li>";
        }
        return $xhtml;
    }

    /**
     *  Auth メニューを表示する
     * @return string
     */
    public static function showMenuAuth(): string
    {
        $menuMain= config('app-settings-admin.admin-menu');
        $xhtml = '';
        foreach ($menuMain as $menu) {
            $active = self::activeClass($menu['link'], '2');
            $icon = self::renderElementIcon($menu['icon']);
            $route = $menu['link'] ? \route("admin.${menu['link']}") : "/";
            $xhtml .= "<li class='nav-item $active'>
                            <a class='nav-link' href='$route'>
                                <span class='nav-link-icon d-md-none d-lg-inline-block'>$icon</span>
                                <span class='nav-link-title'>
                                    ${menu['text']}
                                </span>
                            </a>
                       </li>";
        }
        return $xhtml;
    }
}
