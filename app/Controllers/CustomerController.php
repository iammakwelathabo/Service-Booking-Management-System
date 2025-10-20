<?php

namespace App\Controllers;
use App\Models\BookingModel;

class CustomerController extends BaseController
{
    public function dashboard()
    {
        $customerId = session()->get('user_id');
        $bookingModel = new BookingModel();

        $todayBookings   = $bookingModel->where('customer_id', $customerId)
            ->where('date', date('Y-m-d'))
            ->countAllResults();

        $pendingRequests = $bookingModel->where('customer_id', $customerId)
            ->where('status', 'pending')
            ->countAllResults();

        $completed = $bookingModel->where('customer_id', $customerId)
            ->where('status', 'completed')
            ->countAllResults();

        $bookings = $bookingModel->select('bookings.*, users.name as staff_name, services.name as service_name')
            ->join('users', 'users.id = bookings.staff_id')
            ->join('services', 'services.id = bookings.service_id')
            ->where('customer_id', $customerId)
            ->whereIn('status', ['pending', 'confirmed'])
            ->orderBy('date', 'ASC')
            ->findAll();

        return view('customer/dashboard', [
            'todayBookings' => $todayBookings,
            'pendingRequests' => $pendingRequests,
            'completed' => $completed,
            'bookings' => $bookings
        ]);
    }

    public function requests()
    {
        $customerId = session()->get('user_id');
        $bookingModel = new BookingModel();

        $requests = $bookingModel
            ->select('bookings.*, users.name as staff_name, services.name as service_name')
            ->join('users', 'users.id = bookings.staff_id')
            ->join('services', 'services.id = bookings.service_id')
            ->where('customer_id', $customerId)
            ->orderBy('date', 'ASC')
            ->findAll();

        return view('customer/requests', [
            'requests' => $requests
        ]);
    }

    public function cancelRequest($id)
    {
        $bookingModel = new BookingModel();
        $bookingModel->update($id, ['status' => 'cancelled']);
        return redirect()->back()->with('success', 'Request cancelled successfully.');
    }

    public function requestService($serviceId = null)
    {
        $serviceModel = new \App\Models\ServiceModel();

        if ($serviceId) {
            $service = $serviceModel->find($serviceId);
            return view('customer/request_service', [
                'service' => $service
            ]);
        } else {
            $services = $serviceModel->findAll();
            return view('customer/request_service', [
                'services' => $services
            ]);
        }
    }

    public function storeBooking()
    {
        $bookingModel = new \App\Models\BookingModel();

        $data = [
            'customer_id' => session()->get('user_id'),
            'service_id'  => $this->request->getPost('service_id'),
            'staff_id'    => $this->request->getPost('staff_id'),
            'date'        => $this->request->getPost('date'),
            'status'      => 'pending',
            'created_at'  => date('Y-m-d H:i:s')
        ];

        $bookingModel->insert($data);

        return redirect()->to('/customer/requests')->with('success', 'Service booked successfully!');
    }
}
