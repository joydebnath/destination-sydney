<?php

namespace App\Services\Filters;

use App\ExternalAPIs\Atdw\Products;
use App\Services\Pipes\ApplyAreaFilter;
use App\Services\Pipes\ApplyDefaultProductFilters;
use App\Services\Pipes\ApplyRegionFilter;
use App\Services\Pipes\ApplySuburbFilter;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Pipeline\Pipeline;
use Throwable;

class ProductService
{
    public function __construct(private readonly Products $api)
    {
    }

    /**
     * @param array<string, string> $filters
     * @return array
     * @throws GuzzleException | Throwable
     */
    public function fetch(array $filters): array
    {
        return app(Pipeline::class)
            ->send($filters)
            ->through([
                ApplyDefaultProductFilters::class,
                ApplyRegionFilter::class,
                ApplyAreaFilter::class,
                ApplySuburbFilter::class,
            ])
            ->then(fn(array $filters) => $this->api->fetch($filters));
    }

    /**
     * @param string $id
     * @return array
     * @throws GuzzleException | Throwable
     */
    public function fetchById(string $id): array
    {
        return $this->api->fetchById($id);
    }
}
