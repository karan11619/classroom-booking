<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'timetable', 'capacity'];

    protected $casts = [
        'timetable' => 'array',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
