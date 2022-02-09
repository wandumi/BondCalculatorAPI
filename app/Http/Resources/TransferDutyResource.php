<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TransferDutyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'start_amount' => $this->start_amount,
            'end_amount' => $this->end_amount,
            'rates' => $this->rates,
            'rate_amount' => $this->rate_amount,
            'description' => $this->description
        ];;
    }
}
