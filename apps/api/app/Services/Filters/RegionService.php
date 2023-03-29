<?php

namespace App\Services\Filters;

use App\ExternalAPIs\Atdw\Regions;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Throwable;

class RegionService
{
    public function __construct(private readonly Regions $api)
    {
    }

    /**
     * @throws GuzzleException | Throwable
     */
    public function search(array $searchable): array
    {
        $state = $searchable['state'] ?? 'NSW';
        $name = $searchable['name'] ?? null;

        $regions = Cache::remember('regions', 60, function () use ($state) {
            $result = $this->api->fetch($state);
            return collect($result)
                ->sortBy('Name')
                ->values()
                ->toArray();
        });

        if ($name) {
            $regions = collect($regions)
                ->filter(fn($region) =>  Str::contains($region['Name'], $name, true))
                ->values()
                ->toArray();
        }

        return $regions;
    }
}
