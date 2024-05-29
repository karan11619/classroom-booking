<?php


namespace App\Services;


use App\Models\Classroom;
use App\Repositories\ClassroomRepositoryInterface;
use Carbon\Carbon;

class ClassroomService implements ClassroomRepositoryInterface
{
    public function getClassesForCurrentWeek()
    {
        $currentWeekClasses = [];
        $weekStart = Carbon::now()->startOfWeek();
        $weekEnd = Carbon::now()->endOfWeek();

        $classrooms = Classroom::all();

        foreach ($classrooms as $classroom) {
            $timetables = json_decode($classroom->timetable);
            foreach ($timetables as $day => $times) {
                foreach ($times as $time) {
                    $classDatetime = Carbon::parse("next $day $time", $weekStart->timezone);
                    if ($classDatetime->between($weekStart, $weekEnd)) {
                        $currentWeekClasses[] = [
                            'classroom' => $classroom->name,
                            'day' => $classDatetime->format('l'),
                            'time' => $classDatetime->format('H:i')
                        ];
                    }
                }
            }
        }

        return $currentWeekClasses;
    }
}
