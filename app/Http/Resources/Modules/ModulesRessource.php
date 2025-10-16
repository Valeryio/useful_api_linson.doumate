<?php

namespace App\Http\Resources\Modules;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ModulesRessource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public static $wrap = null;
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            "id" => $this["id"],
            "name" => $this["name"],
            "description" => $this["description"]
        ];
    }
}
