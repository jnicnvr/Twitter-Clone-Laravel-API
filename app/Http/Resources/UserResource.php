<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request)
    {
        return parent::toArray($request);
        // return [
        //     'name' => $this->name,
        //     'email' => $request->email,
        //     'created_at' => $request->created_at,
        // ];
    }
}
