<?php

namespace App\Http\Resources\V1\LicenseWork;

use Illuminate\Http\Resources\Json\JsonResource;

class FormResource extends JsonResource
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
                'employer'=>$this->employer,
                'code'=>$this->code,
                'description'=>$this->description,
                'regime'=>$this->regime,
                'daysConst'=>$this->days_const,
                'approvedLevel'=>$this->approved_level,
                'state'=>$this->state,
        ];
    }
}
