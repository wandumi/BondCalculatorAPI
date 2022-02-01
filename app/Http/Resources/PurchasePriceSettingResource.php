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
            'start_amount' => $this->start_amount,
            'end_amount' => $this->end_amount,
            'rate_applications' => $this->rate_applications,
            'korbitec_gen_fee' => $this->korbitec_gen_fee,
        ];
    }
}
