<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommonSettingsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return  [
            'id' => $this->id,
            'vat_amount' => $this->vat_amount,
            'deeds_office' => $this->deeds_office,
            'tarrif_fee' => $this->tarrif_fee,
            'post_petties' => $this->post_petties,
            'search_fee' => $this->search_fee,
        ];
    }
}
