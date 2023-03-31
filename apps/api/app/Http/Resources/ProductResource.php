<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this['productId'],
            'name' => $this['productName'],
            'status' => $this['status'],
            'organisation_name' => $this['owningOrganisationName'],
            'atw_expiry_date' => $this['atdwExpiryDate'],
            'updated_at' => $this['productUpdateDate'],
            'description' => $this['productDescription'],
            'image' => $this['productImage'],
            'geo_points' => $this['boundary'],
            'address' => $this->formatAddress($this['addresses'][0] ?? []),
            'score' => $this['score'],
        ];
    }

    private function formatAddress(array $address): array
    {
        return [
            'city' => $address['city'] ?? '',
            'state' => $address['state'] ?? '',
            'country' => $address['country'] ?? '',
            'postcode' => $address['postcode'] ?? '',
            'area' => $address['area'][0] ?? '',
            'region' => $address['region'][0] ?? ''
        ];
    }
}
