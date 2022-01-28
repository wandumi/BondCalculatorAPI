<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PurchasePriceSettingResource extends JsonResource
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
            'Start_amount' => $this->start_amount,
            'End_amount' => $this->end_amount,
            'Tarrif_fee' => $this->tarrif_fee,
            'Deeds_office' => $this->deeds_office,
        ];
    }
}
