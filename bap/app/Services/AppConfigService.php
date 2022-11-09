<?php

namespace App\Services;

use App\Repositories\CodesRepository;
use Illuminate\Support\Facades\Cache;

class AppConfigService
{
    /**
     * Controller->service->repositories->model
     * @param CodesRepository $codesRepository
     */
    public function __construct(CodesRepository $codesRepository)
    {
        $this->codesRepository = $codesRepository;
    }

    /**
     * lay du lieu da thiet lap
     * duoc goi o AppConfigController.php
     * @return array
     */
    public function getData(): array
    {
        $cacheName = 'app-config';
        Cache::forget($cacheName);
        //Hàm Forever được sử dụng để lưu một item trong cache vĩnh viễn.
        //remember: Nếu item không tồn tại trong cache, thì Closure truyền vào
        //sẽ được thực thi và kết quả sẽ được lưu lại vào trong cache.
        return Cache::rememberForever($cacheName, function () {
            return $this->loadConfig();
        });
    }

    /**
     * 各種設定を読み込む
     * @return array
     */
    private function loadConfig(): array
    {
        //システム設定
//        $config['config'] = $this->getSystemConfig();
        //メッセージ
        $config['i18n'] = $this->getMessages();
        //定数
//        $config['define'] = $this->getDefines();

        return $config;
    }

    /**
     * システム設定の定義体を取得する
     * @return array
     */
    private function getSystemConfig(): array
    {
        return [
            'app_url'   => config('app.url'),
            'time_zone' => config('app.timezone'),
            'locale'    => config('app.locale'),
            'fallbackLocale' => config ('app.fallback_locale'),
            'fakerLocale'    => config ('app.faker_locale'),
            'timeout'        => config ('session.lifetime'),
            'page'           => [
                'validation' => 'page.validation',
                'supportsParts' => [
                    'date'     => 'page.support-parts.date',
                    'calendar' => 'page.support-parts.calendar'
                ]
            ],
            'simpleTemplate' => 'simple-template'
        ];
    }

    /**
     * メッセージの定義体を取得する
     *
     * @return array
     */
    private function getMessages(): array
    {
        $lang = config('app.locale');
        $lang_dirs = ["lang/$lang/code.php", "lang/$lang/messages.php"];
        $messages = [];
        foreach ($lang_dirs as $dir) {
            $files = glob(resource_path("$dir"));
            foreach ($files as $file) {
                //tra ve ten file ko co .php
                $name = basename($file, '.php');
                $messages[$name] = require $file;
            }
        }

        return $messages;
    }

    private function getDefines(): array
    {
        $files = glob('Enums/*Define.php');
        $defines = [];
        foreach ($files as $file) {
            $name = basename($file, '.php');
            $class = new \ReflectionClass("\\App\\Enums".$name);
            if (!$class->hasMethod('getKeyValues')) {
                continue;
            }
            $method = $class->getMethod('getKeyValues');
            $keyValues = $method->invoke($class);
            $defines[$name]['keyValues'] = $keyValues;
            foreach ($keyValues as $key => $value) {
                $defines[$name][$key] = $value;
            }
            //他に設定があれば、getMethodsを読み込む
            $method = $class->getMethod('getMethods');
            $defines[$name] = array_merge($defines[$name], $method->invoke($class));
        }
        return $defines;
    }


}
