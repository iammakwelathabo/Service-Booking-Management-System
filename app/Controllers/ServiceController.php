<?php

namespace App\Controllers;

use App\Models\ServiceModel;

class ServiceController extends BaseController
{
    public function index()
    {
        $serviceModel = new ServiceModel();

        $userRole = session()->get('role');
        $userId = session()->get('user_id');

        if ($userRole === 'staff') {
            $services = $serviceModel->where('staff_id', $userId)->findAll();
        } else {
            $services = $serviceModel->findAll();
        }

        return view('services/index', ['services' => $services]);
    }

    public function create()
    {
        return view('services/create');
    }

    public function store()
    {
        $serviceModel = new ServiceModel();
        $userId = session()->get('user_id');

        $data = [
            'staff_id' => $userId,
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'price' => $this->request->getPost('price'),
            'duration' => $this->request->getPost('duration'),
            'staff_id' => session()->get('user_id'),
        ];

        $serviceModel->save($data);

        return redirect()->to('/services')->with('success', 'Service created successfully.');
    }

    public function edit($id)
    {
        $serviceModel = new ServiceModel();
        $service = $serviceModel->find($id);

        return view('services/edit', ['service' => $service]);
    }

    public function update($id)
    {
        $serviceModel = new ServiceModel();

        $data = [
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'price' => $this->request->getPost('price'),
            'duration' => $this->request->getPost('duration'),
        ];

        $serviceModel->update($id, $data);

        return redirect()->to('/services')->with('success', 'Service updated successfully.');
    }

    public function delete($id)
    {
        $serviceModel = new ServiceModel();
        $serviceModel->delete($id);

        return redirect()->to('/services')->with('success', 'Service deleted successfully.');
    }
}
