<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class AppointmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "id"=>Str::of($this->id)->padLeft(5,'0'),
            "date"=>$this->date,
            "time"=>$this->time,
            "doctor"=> $this->doctor->last_name." ".$this->doctor->first_name." ".$this->doctor->patronymic,
            "speciality"=>$this->doctor->speciality->name,
            "cabinet"=> $this->doctor->cabinet_id
        ];
    }
}
