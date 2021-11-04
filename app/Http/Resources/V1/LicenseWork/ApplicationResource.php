<?php

namespace App\Http\Resources\V1\LicenseWork;

use Illuminate\Http\Resources\Json\JsonResource;

class ApplicationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
                'id'=>$this->id,
                'employee'=>$this->employee,
                'reason'=>$this->reason,
                'location'=>$this->location,
                'type'=>$this->type,
                'dateStartedAt'=>$this->date_started_at,
                'dateEndedAt'=>$this->date_ended_at,
                'timeStartedAt'=>$this->time_started_at,
                'timeEndedAt' =>$this->time_ended_at,
                'observations'=>$this->observations,
        ];
    }
}
