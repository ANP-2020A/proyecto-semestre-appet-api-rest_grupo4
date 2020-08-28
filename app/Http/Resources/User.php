<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)     {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'lasName'=> $this->lasName,
            'idCard'=> $this->idCard,
            'email' => $this->email,
            'locate' => $this->locate,
            'phone'=> $this->phone,
            'userType' => $this->userType,
            'registrationDate' => $this->registrationDate,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            ];
    }

}