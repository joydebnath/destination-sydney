<?php

namespace App\ExternalAPIs\Atdw;

use GuzzleHttp\Exception\GuzzleException;
use Throwable;

class Areas
{
    private readonly AtlasAPI $atlasAPI;

    public function __construct()
    {
        $this->atlasAPI = new AtlasAPI();
    }

    /**
     * @param string $byState
     * @return array
     * @throws GuzzleException | Throwable
     */
    public function fetch(string $byState = 'NSW'): array
    {
        return $this->atlasAPI->get('areas', [
            'st' => $byState
        ]);
    }
}
