<?php

namespace Database\Seeders;

use App\Models\Classroom;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $classrooms = [
            [
                'name' => 'Classroom A',
                'timetable' => json_encode([
                    'Monday' => ['09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00'],
                    'Wednesday' => ['09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00']
                ]),
                'capacity' => 10
            ],
            [
                'name' => 'Classroom B',
                'timetable' => json_encode([
                    'Monday' => ['08:00', '10:00', '12:00', '14:00', '16:00'],
                    'Thursday' => ['08:00', '10:00', '12:00', '14:00', '16:00'],
                    'Saturday' => ['08:00', '10:00', '12:00', '14:00', '16:00']
                ]),
                'capacity' => 15
            ],
            [
                'name' => 'Classroom C',
                'timetable' => json_encode([
                    'Tuesday' => ['15:00', '16:00', '17:00', '18:00', '19:00', '20:00', '21:00'],
                    'Friday' => ['15:00', '16:00', '17:00', '18:00', '19:00', '20:00', '21:00'],
                    'Saturday' => ['15:00', '16:00', '17:00', '18:00', '19:00', '20:00', '21:00']
                ]),
                'capacity' => 7
            ]
        ];
        foreach ($classrooms as $classroom){
            Classroom::create($classroom);
        }



    }
}
