<?php

namespace App\ExternalAPIs\Atdw;

use GuzzleHttp\Exception\GuzzleException;
use Throwable;

class Products
{
    public function __construct(private readonly AtlasAPI $atlasAPI)
    {
    }

    /**
     * @param array $filters
     * @return array
     * @throws GuzzleException | Throwable
     */
    public function fetch(array $filters = []): array
    {
        $filters = array_filter($filters, fn($value) => !empty($value));
        $response = $this->atlasAPI->get('products', $filters);

        return $response['products'] ?? [];
    }

    /**
     * @param string $id
     * @return array
     * @throws GuzzleException | Throwable
     */
    public function fetchById(string $id): array
    {
        return $this->atlasAPI->get('product', [
            'productId' => $id
        ]);
    }
}
