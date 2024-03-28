<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource {
  private $token               = '';

  public function setToken($value) {
    $this->token = $value;
    return $this;
  }

  public function toArray($request) {
    return [
      'id'                  => $this->id,
      'name'                => $this->name,
      'country_code'        => $this->country_code,
      'phone'               => $this->phone,
      'city_id'             => $this->city_id,
      'email'               => $this->email,
      'token'               => $this->token,
    ];
  }
}
