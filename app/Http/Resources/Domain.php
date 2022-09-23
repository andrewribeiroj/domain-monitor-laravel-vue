<?php

namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;

class Domain extends JsonResource {
  public function toArray($request){
    //return parent::toArray($request);
    return [
      'id' => $this->id,
      'mongoId' => $this->mongoId,
      'domain' => $this->domain,
      'available' => $this->available,
      'backordered' => $this->backordered
    ];
  }
}