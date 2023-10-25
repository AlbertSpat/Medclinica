<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $table="schedule";
    protected $fillable = ['doctor_id','mon','tue','wed','thu','fri', 'sat', 'sun'];


    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
