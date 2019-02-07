<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProfileItem extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'facebook' => $this->facebook,
            'instagram' => $this->instagram,
            'email' => $this->email,
            'telp' => $this->telp,
            'pengantar1' => $this->pengantar1,
            'pengantar2' => $this->pengantar2,
            'pengantar3' => $this->pengantar3
        ];
    }
}
