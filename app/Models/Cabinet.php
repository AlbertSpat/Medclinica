<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cabinet extends Model
{
    use HasFactory;

    protected $fillable = ['id','floor'];

    public function speciality(){
        // Speciality::
        return $this->belongsTo(Speciality::class);
    }

    public function cabinet()
    {
        return $this->belongsTo(Cabinet::class);
    }
    public function schedule(){
        return $this->hasOne(Schedule::class,'doctor_id');
    }

    public function timetable()
    {
        return $this->hasMany(Timetable::class,'doctor_id');
    }

    public function times()
    {
        return $this->hasMany(Timetable::class,'doctor_id');
    }
}
