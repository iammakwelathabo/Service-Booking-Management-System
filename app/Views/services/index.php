<?= $this->extend('layouts/app') ?>
<?= $this->section('title') ?>Add Service<?= $this->endSection() ?>

<?= $this->section('content') ?>
<h2>Available Services</h2>

<?php if (session()->get('role') === 'staff'): ?>
    <a href="/services/create" class="btn btn-primary">Add New Service</a>
<?php endif; ?>

<table class="table">
    <thead>
    <tr>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Duration</th>
        <?php if (session()->get('role') === 'staff'): ?>
            <th>Actions</th>
        <?php else: ?>
            <th>Book</th>
        <?php endif; ?>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($services as $service): ?>
        <tr>
            <td><?= esc($service['name']) ?></td>
            <td><?= esc($service['description']) ?></td>
            <td>R<?= esc($service['price']) ?></td>
            <td><?= esc($service['duration']) ?> mins</td>
            <?php if (session()->get('role') === 'staff'): ?>
                <td>
                    <a href="/services/edit/<?= $service['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="/services/delete/<?= $service['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete this service?')">Delete</a>
                </td>
            <?php else: ?>
                <td><a href="/bookings/create/<?= $service['id'] ?>" class="btn btn-sm btn-success">Book</a></td>
            <?php endif; ?>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<?= $this->endSection() ?>