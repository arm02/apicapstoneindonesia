<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class KelebihanItem extends JsonResource
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
            'judul' => $this->judul,
            'keterangan' => $this->keterangan,
            'gambar' => $this->gambar
        ];
    }
}
