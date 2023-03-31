<?php

namespace App\Services\Filters;

use App\ExternalAPIs\Atdw\Locations;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Throwable;
use Exception;

class LocationService
{
    public function __construct(private readonly Locations $api)
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
        $region = $searchable['region'] ?? 'Greater Sydney';
        $filter = $searchable['filter'] ?? null;

        $locations = Cache::remember('locations', 60, function () use ($state, $region) {
            $result = $this->api->fetch($state);
            return collect($result)
                ->filter(fn($location) => Str::contains($location['DomesticRegionName'], $region, true))
                ->sortBy('Name')
                ->values()
                ->toArray();
        });

        throw_if(empty($filter), Exception::class, 'No filter provided');

        if($filter === 'area') {
            $locations = collect($locations)
                ->map(fn($location) => [
                    "AreaId" => $location['AreaId'],
                    "Code" => $location['Code'],
                    "Name" => $location['Name'],
                    "Type" => $location['Type'],
                    "StateCode" => $location['StateCode'],
                ])
                ->values()
                ->toArray();
        } elseif ($filter === 'suburb') {
            $locations = collect($locations)
                ->map(fn($location) => [
                    "Suburbs" => $location['Suburbs']["suburb"],
                ])
                ->flatMap(fn($location) => $location['Suburbs'])
                ->values()
                ->toArray();
        }

        return $locations;
    }
}
