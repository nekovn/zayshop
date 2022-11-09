<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;


class FormMacroServiceProvider extends ServiceProvider
{

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

    }
    public function boot()
    {
        require base_path() . '/resources/macros/FormEx.php';
    }


}
