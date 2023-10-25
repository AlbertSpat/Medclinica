<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $table='appointment';

    protected $fillable=['doctor_id','user_id','cabinet_id','date','time'];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
