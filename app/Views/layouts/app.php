<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->renderSection('title') ?></title>

    <!-- Compiled Bootstrap + Custom CSS -->
    <link href="<?= base_url('assets/css/app.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/bootstrap.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/custom.css') ?>" rel="stylesheet">

    <?= $this->renderSection('styles') ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

</head>
<body class="d-flex flex-column min-vh-100">

<!-- Navbar -->
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand fw-bold" href="<?= site_url() ?>">Service Booking</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <?php if(session()->get('logged_in')): ?>
                    <?php if(session()->get('role') === 'staff'): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('/staff/dashboard') ?>">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('/services') ?>">My Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('/staff/bookings') ?>">Bookings</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('/customer/dashboard') ?>">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('/services') ?>">Browse Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('/customer/requests') ?>">My Bookings</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('/customer/request-service') ?>">Book a Service</a>
                        </li>

                    <?php endif; ?>

                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('/logout') ?>">Logout</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('login') ?>">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('register') ?>">Register</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>



<!-- Main Content -->
<main class="flex-grow-1 py-5">
    <div class="container">
        <?= $this->renderSection('content') ?>
    </div>
</main>

<!-- Footer -->
<footer class="bg-light text-center text-muted py-3 mt-auto">
    &copy; <?= date('Y') ?> Personal Finance & Expense Tracker. All Rights Reserved.
</footer>

<!-- Bootstrap JS (optional if included via app.css build) -->
<script src="<?= base_url('assets/js/app.js') ?>"></script>
<?= $this->renderSection('scripts') ?>
</body>
</html>
