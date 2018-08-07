<?php

namespace Honvid;

/*
|--------------------------------------------------------------------------
| CLASS NAME: OcrServiceProvider
|--------------------------------------------------------------------------
| @author    honvid
| @datetime  2018-08-07 11:28
| @package   Honvid 
| @description:
|
*/

use Illuminate\Support\ServiceProvider;

class OcrServiceProvider extends ServiceProvider
{
    /**
     * 服务提供者加是否延迟加载.
     *
     * @var bool
     */
    protected $defer = true; // 延迟加载服务

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/./Config/ocr.php' => config_path('ocr.php'),
        ]);
    }
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        // 单例绑定服务
        $this->app->singleton('ocr', function () {
            return new Ocr();
        });
    }
    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        // 因为延迟加载 所以要定义 provides 函数 具体参考laravel 文档
        return ['ocr'];
    }
}