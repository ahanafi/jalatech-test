<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PurchaseOrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'order_id' => $this->id,
            'invoice_number' => $this->invoice_number,
            'type' => $this->type,
            'date' => $this->date,
            'details' => DetailOrderResource::collection($this->details)
        ];
    }
}
