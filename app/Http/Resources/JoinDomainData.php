<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class JoinDomainData extends JsonResource
{
  public function toArray($request)
  {
    return [
      'data' => $this
    ];
  }
}
