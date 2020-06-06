<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $data['id'] = $this->id;
        $data['name'] = $this->name;
        $data['lastName'] = $this->lastName;
        $data['password'] = $this->password;
        $data['type'] = $this->type;
        $data['phone'] = $this->phone;
        $data['address'] = $this->address;
        return $data;
    }
}
