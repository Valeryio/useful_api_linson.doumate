<?php

namespace App\Http\Resources\Modules;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UrlCreationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            "id" => $this["id"],
            "user_id" => $this["user_id"],
            "original_url" => $this["original_url"],
            "code" => $this["code"],
            "clicks" => $this["clicks"] == null ? "0" : $this["clicks"],
            "created_at" => $this["created_at"],
        ];
    }
}
