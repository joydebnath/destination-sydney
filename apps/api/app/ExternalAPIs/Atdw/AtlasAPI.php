<?php

namespace App\ExternalAPIs\Atdw;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Exception;
use Throwable;

class AtlasAPI
{
    private readonly Client $guzzleClient;

    public function __construct()
    {
        $this->guzzleClient = new Client([
            'base_uri' => config('atlas.url'),
        ]);
    }


    /**
     * @throws Throwable
     * @throws GuzzleException
     */
    public function get(string $path, array $query = []): array
    {
        throw_if(empty($path), Exception::class, "Path cannot be empty");

        $query = array_merge($query, ['key' => config('atlas.api_key'), 'out' => 'json']);

        $path = trim($path, " /\n\r\t\v");
        $response = $this->guzzleClient->get($path, [
            'query' => $query
        ]);

        $result = json_decode(
            iconv('UTF-16LE', 'UTF-8', (string)$response->getBody()),
            true
        );

        return !blank($result) ? $result : [];
    }
}
