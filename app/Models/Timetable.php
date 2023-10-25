<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timetable extends Model
{
    use HasFactory;
    protected $table="timetable";
    protected $fillable=['doctor_id', 'date', 'time', 'user_id'];
    
    public function doctor()
    {
        return $this->belongsToMany(Doctor::class);
    }
}
