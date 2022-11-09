<?php

namespace App\Providers;

use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\Optional;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Log;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //Hàm glob() sẽ tìm kiếm tất cả các đường dẫn phù hợp với partern truyền vào.
        $service_dirs = ['/Services/*.php','/Services/**/*.php','/Services/**/**/*.php'];
        foreach ($service_dirs as $dir) {
            foreach (glob(app_path().$dir) as $filename) {
                require_once($filename);
            }
        }

        foreach (glob(app_path() . '/Repositories/*.php') as $filename) {
            require_once($filename);
        }
        //singleton chi goi dung 1 lan duy nhat:, neu goi 2 lan thi van tra ve 1 object duy nhat
        // dung app()->make('AppConfigService'): de goi ra
        // o file App\Helpers\Util\SystemHelper
        $this->app->singleton('AppConfigService', function () {
            return new \App\Services\AppConfigService(new \App\Repositories\CodesRepository);
        });

        //trong class Optional dk callback get_value
        Optional::macro('get_value', function (\Closure $callback) {
//           if(isset($this->value) && $this->value) {
//               return $this->value;
//           } else {
//               return '';
//           }
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    //ham boot la se dc xu ly khi register() dang ky xong
    public function boot(UrlGenerator $url)
    {
        $url->forceRootUrl(config('app.url'));
        //UrlGenerator : lay url hien tai
        //forceScheme(): scheme/protocol doi sang giao thu protocol http/https
        if (app()->isProduction()) {
            $url->forceScheme('https');
        }
        // 商用環境以外だった場合、SQLログを出力する
        if (config('app.debug')) {
            //Nếu như bạn muốn lắng nghe các câu query trên Laravel, bạn có thể sử dụng phương thức listen
            //Tuy nhiên để cho listen hoạt động tốt bạn nên đặt chúng vào trong một service provider nào đó.
            DB::listen(function ($query) {
                $sql = $query->sql;
                //$query->bindings in ra loi neu co alert trong sql
                for ($i = 0; $i < count($query->bindings); $i++) {
                    //pattern : ?
                    // replace dau ? thanh $query->bindings trong chuoi $sql, chi thay the gioi han 1 lan

                    //$sql = 'xinchao ?';
                    //$string = 'rim';
                    //$search = preg_replace("/\?/", $string, $sql, 1);
                    //echo $search; /// xinchao rim

                    $sql = preg_replace("/\?/", "'" . $query->bindings[$i] . "'", $sql, 1);
                }
                //in ra log trong file config/logging.php
                Log::channel('sql')->debug($sql);
            });
        }
        //->string(‘…’), sẽ gặp ngay lỗi Specified key was too long cho nen dung defaultStringLength
        //https://sethphat.com/sp-457/laravel-5-4-loi-specified-key-long
        Schema::defaultStringLength(191);
    }
}
