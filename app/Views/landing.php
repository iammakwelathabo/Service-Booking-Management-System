<?= $this->extend('layouts/app') ?>

<?= $this->section('title') ?>Welcome | Service Booking System<?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- Hero Section -->
<section class="bg-primary text-white py-5">
    <div class="container text-center">
        <h1 class="display-4 fw-bold">Service Booking & Management System</h1>
        <p class="lead mt-3">
            Book services, manage appointments, and keep everything organized with ease.
        </p>
        <div class="mt-4 d-flex justify-content-center gap-3 flex-wrap">
            <a href="<?= site_url('login') ?>" class="btn btn-light btn-lg px-4">
                <i class="bi bi-box-arrow-in-right me-1"></i> Login
            </a>
            <a href="<?= site_url('register') ?>" class="btn btn-outline-light btn-lg px-4">
                <i class="bi bi-person-plus me-1"></i> Register
            </a>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="py-5">
    <div class="container">
        <div class="row text-center g-4">
            <div class="col-md-4">
                <i class="bi bi-calendar-check display-4 text-primary"></i>
                <h4 class="mt-3">Easy Booking</h4>
                <p>Book your appointments in just a few clicks with our intuitive interface.</p>
            </div>
            <div class="col-md-4">
                <i class="bi bi-people display-4 text-primary"></i>
                <h4 class="mt-3">Staff Management</h4>
                <p>Assign services to staff and manage schedules efficiently.</p>
            </div>
            <div class="col-md-4">
                <i class="bi bi-bar-chart-line display-4 text-primary"></i>
                <h4 class="mt-3">Analytics & Reports</h4>
                <p>Track bookings, revenue, and performance with detailed dashboards.</p>
            </div>
        </div>
    </div>
</section>

<!-- Optional Illustration Section -->
<section class="py-5 bg-light text-center">
    <div class="container">
        <img src="<?= base_url('assets/images/service-book.jpg') ?>"
             class="img-fluid" style="max-width: 500px;" alt="Service Booking Illustration">
    </div>
</section>

<!-- Footer is included from layout -->

<?= $this->endSection() ?>
