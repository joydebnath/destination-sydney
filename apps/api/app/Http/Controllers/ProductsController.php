<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchProductRequest;
use App\Http\Resources\FullProductResource;
use App\Http\Resources\ProductResource;
use App\Services\Filters\ProductService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Throwable;

class ProductsController extends Controller
{
    public function __construct(private readonly ProductService $service)
    {
    }

    public function index(SearchProductRequest $request): AnonymousResourceCollection|JsonResponse
    {
        try {
            $filters = $request->validated();
            $products = $this->service->fetch($filters);

            return ProductResource::collection($products);
        } catch (Throwable $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function show(string $id): FullProductResource|JsonResponse
    {
        try {
            $product = $this->service->fetchById($id);

            return new FullProductResource($product);
        } catch (Throwable $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}
