<?php

namespace App\Http\Controllers;

use App\Http\Requests\Filters\SearchRegionRequest;
use App\Http\Resources\Filters\RegionResource;
use App\Services\Filters\RegionService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Throwable;

class RegionsController extends Controller
{
    public function __construct(private readonly RegionService $service)
    {
    }

    public function index(SearchRegionRequest $request): AnonymousResourceCollection|JsonResponse
    {
        try {
            $searchable = $request->validated();
            $res = $this->service->search($searchable);

            return RegionResource::collection($res);
        } catch (Throwable $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
