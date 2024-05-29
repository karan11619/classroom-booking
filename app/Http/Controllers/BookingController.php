<?php

namespace App\Http\Controllers;

use App\Repositories\BookingRepositoryInterface;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    protected $bookingService;

    public function __construct(BookingRepositoryInterface $bookingService)
    {
        $this->bookingService = $bookingService;
    }

    public function bookClass(Request $request)
    {
        try {
            $request->validate([
                'classroom' => 'required|string',
                'class_name' => 'required|string',
                'day' => 'required|string',
                'time' => 'required|string'
            ]);

           return $this->bookingService->bookClass($request);


        } catch (Exception $e) {
            return response()->json(['error' => 'Failed to book class', 'message' => $e->getMessage()], 500);
        }
    }

    public function cancelClass(Request $request)
    {
        try {
            $request->validate([
                'booking_id' => 'required|integer'
            ]);

            $result = $this->bookingService->cancelClass($request->booking_id);

            return response()->json($result, 200);
        } catch (Exception $e) {
            return response()->json(['error' => 'Failed to cancel class', 'message' => $e->getMessage()], 500);
        }
    }
}
