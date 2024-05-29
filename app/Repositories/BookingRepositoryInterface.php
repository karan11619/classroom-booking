<?php


namespace App\Repositories;


use Illuminate\Http\Request;

interface BookingRepositoryInterface
{
    public function bookClass(Request $request);
    public function cancelClass($bookingId);
}
