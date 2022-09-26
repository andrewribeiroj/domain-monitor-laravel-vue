<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Domain_Nameserver extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'type' => $this->type,
            'domainId' => $this->domain_id,
            'nameserverId' => $this->nameserver_id,
            'header_status' => $this->header_status,
            'createdAt' => $this->created_at
        ];
    }
}
