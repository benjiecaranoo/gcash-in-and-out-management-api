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
            'user_id' => $this->user_id,
            'type' => $this->type,
            'description' => $this->description,
            'amount' => $this->amount,
            'status' => $this->status,
            'reference' => $this->reference,
            'load_service' => $this->load_service,
            'phone_number' => $this->phone_number,
            // relationship
            'owner' => $this->whenLoaded('owner', fn() => $this->owner),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
