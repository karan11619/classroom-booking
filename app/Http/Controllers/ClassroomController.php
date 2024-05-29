<?php

namespace App\Http\Controllers;

use App\Repositories\ClassroomRepositoryInterface;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    protected $classroomService;

    public function __construct(ClassroomRepositoryInterface $classroomService)
    {
        $this->classroomService = $classroomService;
    }

    public function getClasses()
    {
        try {
            $currentWeekClasses = $this->classroomService->getClassesForCurrentWeek();
            return response()->json($currentWeekClasses);
        } catch (Exception $e) {
            return response()->json(['error' => 'Failed to retrieve classes', 'message' => $e->getMessage()], 500);
        }
    }
}
