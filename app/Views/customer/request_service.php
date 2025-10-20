<?= $this->extend('layouts/app') ?>
<?= $this->section('title') ?>Book a Service<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Book a Service</h4>
                </div>
                <div class="card-body">
                    <?php if(session()->getFlashdata('success')): ?>
                        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
                    <?php endif; ?>

                    <form action="<?= base_url('/customer/request-service') ?>" method="post">
                        <?= csrf_field() ?>

                        <?php if(isset($service)): ?>
                            <input type="hidden" name="service_id" value="<?= $service['id'] ?>">
                            <p><strong>Service:</strong> <?= esc($service['name']) ?> - R<?= esc($service['price']) ?></p>
                        <?php else: ?>
                            <select name="service_id" class="form-select" required>
                                <option value="">-- Choose a Service --</option>
                                <?php foreach($services as $service): ?>
                                    <option value="<?= $service['id'] ?>">
                                        <?= esc($service['name']) ?> - R<?= esc($service['price']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        <?php endif; ?>


                        <div class="mb-3">
                            <label class="form-label fw-bold">Preferred Date & Time</label>
                            <input type="datetime-local" name="date" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Assign to Staff (optional)</label>
                            <input type="number" name="staff_id" class="form-control" placeholder="Enter Staff ID (if known)">
                            <small class="text-muted">Leave empty to let the system assign automatically.</small>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="<?= base_url('/customer/requests') ?>" class="btn btn-outline-secondary">
                                Cancel
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-calendar-check"></i> Book Service
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
