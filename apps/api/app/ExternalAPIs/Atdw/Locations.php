<?php

namespace App\ExternalAPIs\Atdw;

use GuzzleHttp\Exception\GuzzleException;
use Throwable;

class Locations
{
    public function __construct(private readonly AtlasAPI $atlasAPI)
    {
    }

    /**
     * @param string $byState
     * @return array
     * @throws GuzzleException | Throwable
     */
    public function fetch(string $byState = 'NSW'): array
    {
        return $this->atlasAPI->get('locations', [
            'st' => $byState
        ]);
    }
}
