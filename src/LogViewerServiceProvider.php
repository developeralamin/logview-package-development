<?php 
namespace Alamin\Logviewer;


use Illuminate\Support\ServiceProvider;

class LogViewerServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadViewsFrom(__DIR__.'/views', 'logviewer');
        $this->mergeConfigFrom( __DIR__.'/config/logviewer.php', 'logviewer');

        $this->publishes([
            __DIR__.'/config/logviewer.php' => config_path('logviewer.php'),
        ]);

    }

    public function register()
    {
        
    }

}