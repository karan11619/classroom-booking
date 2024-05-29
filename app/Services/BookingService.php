<?php


namespace App\Services;


use App\Models\Booking;
use App\Models\Classroom;
use App\Repositories\BookingRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BookingService implements BookingRepositoryInterface
{
    public function bookClass(Request $request)
    {
        $classroom = Classroom::where('name', $request->classroom)->first();
        if (!$classroom) {
            return response()->json(['error' => 'Classroom not found'], 404);
        }
        $timetable = json_decode($classroom->timetable, true);
        $requestedTime = Carbon::parse("next {$request->day} {$request->time}");
        if (!in_array($requestedTime->format('H:i'), $timetable[$requestedTime->format('l')])) {
            return response()->json(['error' => 'Invalid time slot'], 400);
        }

        $existingBooking = Booking::where('classroom_id', $classroom->id)
            ->where('start_time', $requestedTime)
            ->count();
        if ($existingBooking >= $classroom->capacity) {
            return response()->json(['error' => 'Time slot already booked or full'], 409);
        }

        $booking = new Booking([
            'classroom_id' => $classroom->id,
            'start_time' => $requestedTime,
            'duration' => 1,
            'class_name' =>  $request->class_name
        ]);

        $booking->save();

        return response()->json(['success' => 'Class booked successfully'], 200);
    }

    public function cancelClass($bookingId)
    {
        $booking = Booking::find($bookingId);
        if (!$booking) {
            throw new Exception('Booking not found');
        }

        $now = Carbon::now();
        $cancelDeadline = Carbon::parse($booking->start_time)->subHours(24);

        if ($now->greaterThanOrEqualTo($cancelDeadline)) {
            throw new Exception('Cannot cancel less than 24 hours in advance');
        }

        $booking->delete();

        return ['success' => 'Class canceled successfully'];
    }
}
