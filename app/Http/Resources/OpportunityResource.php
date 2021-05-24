<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\lookups\CategoryResource;
use App\Http\Resources\lookups\CountryResource;
use App\Http\Resources\UserResource;
class OpportunityResource extends JsonResource
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
         'id' =>$this->id,
         'title'=>$this->title,
         'category'=> new CategoryResource($this->category),
         'country'=> new CountryResource($this->country),
         'deadline'=>$this->deadline->toDayDateTimeString(),
         'created_by'=> new UserResource($this->user),
         'organiser'=>$this->organiser
        ];
    }
}
