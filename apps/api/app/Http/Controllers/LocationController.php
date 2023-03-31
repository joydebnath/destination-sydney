<?php

namespace App\Http\Controllers;

use App\Http\Requests\Filters\SearchLocationRequest;
use App\Http\Resources\Filters\AreaResource;
use App\Http\Resources\Filters\SuburbResource;
use App\Services\Filters\LocationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Throwable;

class LocationController extends Controller
{
    public function __construct(private readonly LocationService $service)
    {
    }

    public function index(SearchLocationRequest $request): AnonymousResourceCollection|JsonResponse
    {
        try {
            $searchable = $request->validated();
            $locations = $this->service->search($searchable);

            if ($request->get('filter') === 'area') {
                return AreaResource::collection($locations);
            } elseif ($request->get('filter') === 'suburb') {
                return SuburbResource::collection($locations);
            }

            return response()->json(['message' => 'Invalid filter provided'], 400);
        } catch (Throwable $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
}
