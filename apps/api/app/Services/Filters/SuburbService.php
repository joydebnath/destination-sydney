<?php

namespace App\Services\Filters;

use App\ExternalAPIs\Atdw\Suburbs;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Throwable;

class SuburbService
{
    public function __construct(private readonly Suburbs $api)
    {
    }

    /**
     * @param array $searchable
     * @throws GuzzleException | Throwable
     * @return array
     */
    public function search(array $searchable): array
    {
        $state = $searchable['state'] ?? 'NSW';
        $name = $searchable['name'] ?? null;
        $suburbs = Cache::remember('suburbs', 60, function () use ($state) {
            $result = $this->api->fetch($state);
            return collect($result)
                ->filter(fn($suburb) => !empty($suburb['Name']))
                ->sortBy('Name')
                ->values()
                ->toArray();
        });

        if ($name) {
            $suburbs = collect($suburbs)
                ->filter(fn($suburb) =>  Str::contains($suburb['Name'], $name, true))
                ->values()
                ->toArray();
        }

        return $suburbs;
    }
}
