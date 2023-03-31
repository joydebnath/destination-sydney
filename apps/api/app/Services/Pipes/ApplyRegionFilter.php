<?php

namespace App\Services\Pipes;

use Closure;

class ApplyRegionFilter
{
    public function handle(array $filters, Closure $next): array
    {
        $filters['rg'] = $filters['region'] ?? 'Greater Sydney';
        if (isset($filters['region'])) {
            unset($filters['region']);
        }

        if (isset($filters['regionId'])) {
            $filters['servicerg'] = $filters['regionId'] ?? null;
            unset($filters['regionId']);
        }

        return $next($filters);
    }
}
