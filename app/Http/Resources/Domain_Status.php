<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Domain_Status extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'type' => $this->type,
            'domainId' => $this->domain_id,
            'statusId' => $this->status_id,
            'createdAt' => $this->created_at
        ];
    }
}
