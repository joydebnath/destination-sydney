<?php

namespace App\Http\Resources\Filters;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RegionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this['RegionId'],
            'code' => $this['Code'],
            'name' => $this['Name'],
            'type' => $this['Type'],
            'state' => $this['State'],
        ];
    }
}
