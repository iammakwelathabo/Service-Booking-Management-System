<?php
namespace App\Controllers;
use App\Models\BookingModel;
use App\Models\ServiceModel;

class BookingController extends BaseController
{
    protected $bookingModel;
    protected $serviceModel;

    public function __construct()
    {
        $this->bookingModel = new BookingModel();
        $this->serviceModel = new ServiceModel();
    }

    // Show booking form
    public function create($serviceId)
    {
        $service = $this->serviceModel->find($serviceId);
        if (!$service) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Service not found");
        }
        return view('customer/request_service', ['service' => $service]);
    }

    // Save booking
    public function store($serviceId)
    {
        $service = $this->serviceModel->find($serviceId);
        if (!$service) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Service not found");
        }

        $this->bookingModel->save([
            'customer_id' => session()->get('user_id'),
            'staff_id'    => $service['staff_id'],
            'service_id'  => $serviceId,
            'date'        => $this->request->getPost('date'),
            'status'      => 'pending'
        ]);

        return redirect()->to('/customer/requests')->with('success', 'Booking created successfully.');
    }

    public function approve($id)
    {
        $this->bookingModel->update($id, ['status' => 'completed']);
        return redirect()->to('/staff/bookings')->with('success', 'Booking approved successfully.');
    }

    public function reject($id)
    {
        $this->bookingModel->update($id, ['status' => 'rejected']);
        return redirect()->to('/staff/bookings')->with('info', 'Booking rejected.');
    }
}
