<?php

namespace App\Models;

use CodeIgniter\Model;

class BookingModel extends Model
{
    protected $table = 'bookings';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'customer_id', 'staff_id', 'service_id', 'date', 'status', 'created_at', 'updated_at'
    ];
    protected $useTimestamps = true;

    public function getUpcomingBookingsByStaff($staffId)
    {
        return $this->select('bookings.*, users.name as customer_name, services.name as service_name')
            ->join('users', 'users.id = bookings.customer_id')
            ->join('services', 'services.id = bookings.service_id')
            ->where('bookings.staff_id', $staffId)
            ->whereIn('bookings.status', ['pending', 'confirmed'])
            ->orderBy('bookings.date', 'ASC')
            ->findAll();
    }

    public function countTodayBookings($staffId)
    {
        return $this->where('staff_id', $staffId)
            ->where('date', date('Y-m-d'))
            ->countAllResults();
    }

    public function countPendingRequests($staffId)
    {
        return $this->where('staff_id', $staffId)
            ->where('status', 'pending')
            ->countAllResults();
    }

    public function countCompletedBookings($staffId)
    {
        return $this->where('staff_id', $staffId)
            ->where('status', 'completed')
            ->countAllResults();
    }
}
