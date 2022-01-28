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
            'post_petties' => $this->post_petties,
            'search_fee' => $this->search_fee,
            'rates_application' => $this->rates_application
        ];
    }
}
