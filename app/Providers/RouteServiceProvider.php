<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    // API と HOME 定義
    public const API = 'api';
    public const HOME = '/home';

    /**
     * ルートモデルのバインディングやパターンフィルターの設定
     *
     * @return void
     */
    public function boot()
    {
        // parent::boot(); は不要
    }

    /**
     * アプリケーションのルートを設定
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();
        $this->mapWebRoutes();
    }

    /**
     * "api" ルートの定義
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    }

    /**
     * "web" ルートの定義
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }
}

