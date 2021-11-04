<?php

namespace App\Http\Resources\V1\LicenseWork;

use Illuminate\Http\Resources\Json\ResourceCollection;

class DependenceCollection extends ResourceCollection
{
    public $collects = DependenceResource::class;
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */

    public function toArray($request)
    {
        return [
            'data'=>$this->collection,
        ];
    }
}
