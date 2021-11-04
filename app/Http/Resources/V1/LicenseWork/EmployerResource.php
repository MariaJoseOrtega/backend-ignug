<?php

namespace App\Http\Resources\V1\LicenseWork;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployerResource extends JsonResource
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
                'logo'=>$this->logo,
                'department'=>$this-> department,
                'coordination'=>$this-> coordination,
                'unit'=>$this-> unit,
                'approvalName'=>$this-> approval_name,
                'registerName'=>$this-> register_name,
 
        ];
    }
}
