<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

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
      // This is to get rid of the "data" in Json responses 
      JsonResource::withoutWrapping();

      $url = $this->app->request->getRequestUri();
      $ctrl = 'index';
      if (Str::startsWith($url, '/post')) {
        $ctrl = 'blog';
      } else if (Str::startsWith($url, '/story')) {
        $ctrl = 'story';
      }
      Log::debug($ctrl .' - '. $url);

      View::share('super_key', 'ctrl_'. $ctrl);
    }
}
