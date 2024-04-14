<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class VueServiceProvider extends ServiceProvider
{
  /**
   * Register services.
   *
   * @return void
   */
  public function register()
  {
  }

  /**
   * Bootstrap services.
   *
   * @return void
   */
  public function boot()
  {
    if ($this->app->runningInConsole()) {
      $this->publishes([
        __DIR__ . '/resources' => base_path('resources'),
        __DIR__ . '/resources/routes' => base_path('routes'),
        __DIR__ . '/package.json' => base_path('package.json'),
        __DIR__ . '/vite.config.ts' => base_path('vite.config.ts'),
        __DIR__ . '/tsconfig.json' => base_path('tsconfig.json'),
      ], 'vue-config');
    }
  }
}