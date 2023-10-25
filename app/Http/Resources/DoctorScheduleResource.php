<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DoctorScheduleResource extends JsonResource
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
            "id" => $this->id,
            "first_name" => $this->first_name,
            "last_name" => $this->last_name,
            "patronymic" => $this->patronymic,
            "speciality" => $this->speciality->name,
            "cabinet_id" => $this->cabinet->id,
            "cabinet_phone" => $this->cabinet->phone,
            "mon" => $this->schedule->mon,
            "tue" =>$this->schedule->tue,
            "wed" =>$this->schedule->wed,
            "thu" =>$this->schedule->thu,
            "fri" =>$this->schedule->fri,
            "sat" =>$this->schedule->sat,
            "sun" =>$this->schedule->sun

        ];
    }

}
