<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema; // Import thêm Schema

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Thiết lập chiều dài mặc định cho chuỗi là 191 ký tự
        Schema::defaultStringLength(191);

        // Directive tùy chỉnh @hasPermission
        Blade::if('hasPermission', function($action = null){
            $user = Auth::user();
            return $user->hasPermission($action);
        });
    }
}
