<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DoctorTimetableResource extends JsonResource
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
         //   "data" => $this->timetable()->whereBetween('date', [$request->date1, $request->date2])->get(['date','time','patient_id'])
            "data" => $this->timetable()->whereBetween('date',[2022-06-20, 2022-06-21])->get(['date','time','user_id'])
        ];
    }
}
