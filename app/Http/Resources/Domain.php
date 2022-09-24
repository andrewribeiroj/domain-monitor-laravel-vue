<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Domain extends JsonResource
{
  public function toArray($request)
  {
    return [
      'id' => $this->id,
      'mongoId' => $this->mongoId,
      'domain' => $this->domain,
      'registrationDate' => $this->registrationDate,
      'expirationDate' => $this->expirationDate,
      'available' => $this->available,
      'backordered' => $this->backordered
    ];
  }
}
