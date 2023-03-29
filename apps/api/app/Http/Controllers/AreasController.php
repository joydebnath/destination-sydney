<?php

namespace App\Http\Controllers;

use App\Http\Requests\Filters\SearchAreaRequest;
use App\Http\Resources\Filters\AreaResource;
use App\Services\Filters\AreaService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Throwable;

class AreasController extends Controller
{
    public function __construct(private readonly AreaService $service)
    {
    }

    public function index(SearchAreaRequest $request): AnonymousResourceCollection | JsonResponse
    {
        try {
            $searchable = $request->validated();
            $res = $this->service->search($searchable);

            return AreaResource::collection($res);
        } catch (Throwable $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
