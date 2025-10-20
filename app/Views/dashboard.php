<?= $this->extend('layout/app') ?>

<?= $this->section('content') ?>

<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Dashboard</h2>
        <p class="text-muted mb-0">Welcome back, <?= esc(session('name')) ?> 👋</p>
    </div>

    <!-- Summary Cards -->
    <div class="row g-4 mb-4">
        <div class="col-md-3 col-sm-6">
            <div class="card border-0 shadow-sm text-center p-3 bg-light">
                <h6 class="text-uppercase text-muted">Total Bookings</h6>
                <h3 class="fw-bold text-primary"><?= esc($totalBookings ?? 0) ?></h3>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="card border-0 shadow-sm text-center p-3 bg-light">
                <h6 class="text-uppercase text-muted">Completed</h6>
                <h3 class="fw-bold text-success"><?= esc($completedBookings ?? 0) ?></h3>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="card border-0 shadow-sm text-center p-3 bg-light">
                <h6 class="text-uppercase text-muted">Pending</h6>
                <h3 class="fw-bold text-warning"><?= esc($pendingBookings ?? 0) ?></h3>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="card border-0 shadow-sm text-center p-3 bg-light">
                <h6 class="text-uppercase text-muted">Revenue</h6>
                <h3 class="fw-bold text-info">R <?= esc(number_format($totalRevenue ?? 0, 2)) ?></h3>
            </div>
        </div>
    </div>

    <!-- Chart Section -->
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <h5 class="card-title mb-3">Monthly Bookings Overview</h5>
            <canvas id="bookingsChart" height="100"></canvas>
        </div>
    </div>

    <!-- Recent Bookings -->
    <div class="card shadow-sm">
        <div class="card-body">
            <h5 class="card-title mb-3">Recent Bookings</h5>
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Customer</th>
                        <th>Service</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Amount</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if (!empty($recentBookings)): ?>
                        <?php foreach ($recentBookings as $i => $booking): ?>
                            <tr>
                                <td><?= $i + 1 ?></td>
                                <td><?= esc($booking['customer_name']) ?></td>
                                <td><?= esc($booking['service_name']) ?></td>
                                <td><?= esc($booking['date']) ?></td>
                                <td>
                                        <span class="badge
                                            <?= $booking['status'] === 'Completed' ? 'bg-success' :
                                            ($booking['status'] === 'Pending' ? 'bg-warning' : 'bg-secondary') ?>">
                                            <?= esc($booking['status']) ?>
                                        </span>
                                </td>
                                <td>R <?= number_format($booking['amount'], 2) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr><td colspan="6" class="text-center text-muted">No bookings yet.</td></tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('bookingsChart');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: <?= json_encode($months ?? ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec']) ?>,
            datasets: [{
                label: 'Bookings',
                data: <?= json_encode($bookingsData ?? [0,0,0,0,0,0,0,0,0,0,0,0]) ?>,
                borderColor: '#007bff',
                tension: 0.3,
                fill: true,
                backgroundColor: 'rgba(0, 123, 255, 0.1)',
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { display: false } }
        }
    });
</script>

<?= $this->endSection() ?>
