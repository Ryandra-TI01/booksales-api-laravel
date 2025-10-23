<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'order_number' => $this->order_number,
            'customer' => new UserResource($this->whenLoaded('customer')),
            'book' => new BookResource($this->whenLoaded('book')),
            'total_amount' => $this->total_amount,
        ];
    }
}
