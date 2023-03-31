<?php

namespace App\Providers;

use App\ExternalAPIs\Atdw\AtlasAPI;
use GuzzleHttp\Client;
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
        $guzzleClient = new Client([
            'base_uri' => config('atlas.url'),
        ]);
        $service = new AtlasAPI($guzzleClient);

        $this->app->instance(AtlasAPI::class, $service);

        $this->app->singleton('atlas', function () use ($guzzleClient) {
            return new AtlasAPI($guzzleClient);
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
