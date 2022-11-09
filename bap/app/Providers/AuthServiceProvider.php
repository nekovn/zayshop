<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Providers\EloquentUserExMemberProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
//        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     * hệ thống xác thực của Laravel có hai phần chính - gates và policies.
     *  dang ky authentication providers trong file config/admin.php
        'providers' => [
           'users' => [
               'driver' => 'eloquentUserExUser',
                'model' => App\Models\User::class,
            ],
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        //nhan vien
        Auth::provider('eloquentUserExUser', function ($app, array $config) {
            return new EloquentUserExUserProvider($app['hash'], $config['model']);
        });


        //khach hang
        Auth::provider('eloquentUserExMember', function ($app, array $config) {
            return new EloquentUserExMemberProvider($app['hash'], $config['model']);
        });
    }
}
