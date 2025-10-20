<?= $this->extend('layouts/app') ?>
<?= $this->section('title') ?>Customer Dashboard<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3>Welcome, <?= session()->get('name') ?> (Customer)</h3>
        <a href="<?= base_url('/customer/requests') ?>" class="btn btn-primary">My Requests</a>
    </div>

    <!-- Stats Cards -->
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Today's Bookings</h5>
                    <p class="card-text fs-4"><?= isset($todayBookings) ? $todayBookings : '0' ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-warning mb-3">
                <div class="card-body">
                    <h5 class="card-title">Pending Requests</h5>
                    <p class="card-text fs-4"><?= isset($pendingRequests) ? $pendingRequests : '0' ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Completed Bookings</h5>
                    <p class="card-text fs-4"><?= isset($completed) ? $completed : '0' ?></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Upcoming Bookings Table -->
    <div class="card mb-4">
        <div class="card-header bg-light">
            <h5>Upcoming Bookings</h5>
        </div>
        <div class="card-body p-0">
            <table class="table mb-0">
                <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Staff</th>
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
                            <td><?= $b['staff_name'] ?></td>
                            <td><?= $b['service_name'] ?></td>
                            <td><?= $b['date'] ?></td>
                            <td>
                                <span class="badge <?= $b['status']=='pending' ? 'bg-warning' : 'bg-success' ?>">
                                    <?= ucfirst($b['status']) ?>
                                </span>
                            </td>
                            <td>
                                <?php if($b['status'] == 'pending'): ?>
                                    <a href="#" class="btn btn-sm btn-outline-danger">Cancel</a>
                                <?php else: ?>
                                    <span class="text-muted">N/A</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center">No upcoming bookings.</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="row">
        <div class="col-md-6">
            <div class="card text-center p-3">
                <h5>Book a Service</h5>
                <p>Request a new service from our staff.</p>
                <a href="<?= base_url('/customer/request-service') ?>" class="btn btn-success">Request Service</a>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card text-center p-3">
                <h5>View All Requests</h5>
                <p>Check status of all your requests.</p>
                <a href="<?= base_url('/customer/requests') ?>" class="btn btn-primary">View Requests</a>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
