<?php

namespace App\Http\Resources\Sections;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HeroSection extends JsonResource
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
            'titles' => json_decode($this->titles),
            'descriptions' => json_decode($this->descriptions, true),
            'imagePath' => $this->image_path,
        ];
        // return parent::toArray($request);
    }
}
