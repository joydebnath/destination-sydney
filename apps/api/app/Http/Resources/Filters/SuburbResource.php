<?php

namespace App\Http\Resources\Filters;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SuburbResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this['SuburbId'],
            'name' => $this['Name'],
            'postcode' => $this['PostCode'],
        ];
    }
}
