<?php

namespace App\Services\Filters;

use App\ExternalAPIs\Atdw\Areas;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Throwable;

class AreaService
{
    public function __construct(private readonly Areas $api)
    {
    }

    /**
     * @param array $searchable
     * @return array
     * @throws GuzzleException | Throwable
     */
    public function search(array $searchable): array
    {
        $state = $searchable['state'] ?? 'NSW';
        $name = $searchable['name'] ?? null;

        $areas = Cache::remember('areas', 60, function () use ($state) {
            $result = $this->api->fetch($state);
            return collect($result)
                ->sortBy('Name')
                ->values()
                ->toArray();
        });

        if ($name) {
            $areas = collect($areas)
                ->filter(fn($area) =>  Str::contains($area['Name'], $name, true))
                ->values()
                ->toArray();
        }

        return $areas;
    }
}
