<?php

namespace App\Services\Pipes;

use Closure;

class ApplyDefaultProductFilters
{
    public function handle(array $filters, Closure $next): array
    {
        $filters['st'] = $filters['state'] ?? 'NSW';
        if (isset($filters['state'])) {
            unset($filters['state']);
        }

        $filters['cats'] = $filters['category'] ?? 'ACCOMM';
        if (isset($filters['category'])) {
            unset($filters['category']);
        }

        return $next($filters);
    }
}
