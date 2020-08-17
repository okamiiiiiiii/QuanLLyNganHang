<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Request\UserRequest;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray(UserRequest $request)
    {
        return [
            'name' => $this->name,
            'email'=> $this->email,
            'address'=> $this->address,
            'created_at'=>Carbon::parse($this->created_at)->toDayDateTimeString(),
        ];
    }
}
