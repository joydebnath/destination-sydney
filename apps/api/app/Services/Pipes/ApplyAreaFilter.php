<?php

namespace App\Services\Pipes;

use Closure;

class ApplyAreaFilter
{
    public function handle(array $filters, Closure $next): array
    {
        if (isset($filters['area'])) {
            $filters['ar'] = $filters['area'] ?? null;
            unset($filters['area']);
        }

        if (isset($filters['areaId'])) {
            $filters['servicear'] = $filters['areaId'] ?? null;
            unset($filters['areaId']);
        }

        return $next($filters);
    }
}
