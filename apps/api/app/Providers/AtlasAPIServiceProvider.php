<?php

namespace App\Providers;

use App\ExternalAPIs\Atdw\AtlasAPI;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class AtlasAPIServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->configureURL();
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app->singleton('atlas', function () {
            return new AtlasAPI();
        });
    }

    private function configureURL()
    {
        $uri = config('atlas.url');
        if (blank($uri)) {
            Log::error('Atlas URL is not configured');
        }

        if (!Str::endsWith($uri, '/')) {
            $uri = config('atlas.url') . '/';
            config(['atlas.url' => $uri]);
        }
    }
}
