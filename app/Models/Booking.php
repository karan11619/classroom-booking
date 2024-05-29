<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['classroom_id', 'start_time', 'duration', 'class_name'];

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }
}
