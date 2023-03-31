<?php

namespace App\Services\Pipes;

use Closure;

class ApplySuburbFilter
{
    public function handle(array $filters, Closure $next): array
    {
        if (isset($filters['suburb'])) {
            $filters['ct'] = $filters['suburb'] ?? null;
            unset($filters['suburb']);
        }

        if (isset($filters['suburbId'])) {
            $filters['servicect'] = $filters['suburbId'] ?? null;
            unset($filters['suburbId']);
        }

        return $next($filters);
    }
}
