<?php

namespace App\Http\Controllers;

use App\Http\Requests\Filters\SearchSuburbRequest;
use App\Http\Resources\Filters\SuburbResource;
use App\Services\Filters\SuburbService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Throwable;

class SuburbsController extends Controller
{
    public function __construct(private readonly SuburbService $service)
    {
    }

    public function index(SearchSuburbRequest $request): AnonymousResourceCollection|JsonResponse
    {
        try {
            $searchable = $request->validated();
            $res = $this->service->search($searchable);

            return SuburbResource::collection($res);
        } catch (Throwable $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
