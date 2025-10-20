<?php

namespace App\Controllers;
use App\Models\BookingModel;

class StaffController extends BaseController
{
    public function dashboard()
    {
        $staffId = session()->get('user_id');
        $bookingModel = new BookingModel();

        $data = [
            'todayBookings'   => $bookingModel->countTodayBookings($staffId),
            'pendingRequests' => $bookingModel->countPendingRequests($staffId),
            'completed'       => $bookingModel->countCompletedBookings($staffId),
            'bookings'        => $bookingModel->getUpcomingBookingsByStaff($staffId),
        ];

        return view('staff/dashboard', $data);
    }

    public function bookings()
    {
        $bookingModel = new BookingModel();
        $bookings = $bookingModel
            ->select('bookings.*, users.name as customer_name, services.name as service_name')
            ->join('users', 'users.id = bookings.customer_id')
            ->join('services', 'services.id = bookings.service_id')
             //->where('bookings.staff_id', session()->get('user_id'))
            ->orderBy('bookings.date', 'ASC')
            ->findAll();

        return view('staff/bookings', ['bookings' => $bookings]);
    }

    public function updateStatus($id, $status)
    {
        $bookingModel = new BookingModel();
        $bookingModel->update($id, ['status' => $status]);
        return redirect()->back()->with('success', 'Booking status updated.');
    }
}
