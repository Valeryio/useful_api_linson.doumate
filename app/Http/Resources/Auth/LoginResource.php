<?php

namespace App\Http\Resources\Auth;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LoginResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public static $wrap = null;
    public function toArray(Request $request): array
    {

        //  return parent::toArray($request);
        return [
            "token" => $this["token"],
            "user_id" => $this["id"]
        ];
    }

    
}
