<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BondSettingResource extends JsonResource
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
            'electronic_ins_fee' => $this->electronic_ins_fee,
            'korbitec_gen_fee' => $this->korbitec_gen_fee
        ];
    }
}
