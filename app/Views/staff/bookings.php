<?= $this->extend('layouts/app') ?>
<?= $this->section('title') ?>All Bookings<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container mt-4">
    <h3>All Bookings</h3>

    <?php if(session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <table class="table table-striped mt-3">
        <thead>
        <tr>
            <th>#</th>
            <th>Customer</th>
            <th>Service</th>
            <th>Date</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php if(!empty($bookings)): ?>
            <?php foreach($bookings as $b): ?>
                <tr>
                    <td><?= $b['id'] ?></td>
                    <td><?= $b['customer_name'] ?></td>
                    <td><?= $b['service_name'] ?></td>
                    <td><?= $b['date'] ?></td>
                    <td>
                        <span class="badge <?= $b['status']=='pending' ? 'bg-warning' : ($b['status']=='confirmed' ? 'bg-info' : 'bg-success') ?>">
                            <?= ucfirst($b['status']) ?>
                        </span>
                    </td>
                    <td>
                        <?php if ($b['status'] == 'pending'): ?>
                            <a href="/bookings/approve/<?= $b['id'] ?>" class="btn btn-success btn-sm">Approve</a>
                            <a href="/bookings/reject/<?= $b['id'] ?>" class="btn btn-danger btn-sm">Reject</a>
                        <?php else: ?>
                            <span class="badge bg-secondary"><?= ucfirst($b['status']) ?></span>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="6" class="text-center">No bookings found.</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>
