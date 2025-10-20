<?= $this->extend('layouts/app') ?>
<?= $this->section('title') ?>Add Service<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Add New Service</h4>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('/services/store') ?>" method="post">
                            <?= csrf_field() ?>

                            <div class="mb-3">
                                <label for="name" class="form-label fw-bold">Service Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="e.g. Plumbing Repair" required>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label fw-bold">Description</label>
                                <textarea name="description" id="description" class="form-control" rows="4" placeholder="Describe the service..."></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="price" class="form-label fw-bold">Price (ZAR)</label>
                                <input type="number" name="price" id="price" class="form-control" step="0.01" placeholder="Enter price" required>
                            </div>

                            <div class="mb-3">
                                <label for="duration" class="form-label fw-bold">Duration (minutes)</label>
                                <input type="number" name="duration" id="duration" class="form-control" placeholder="e.g. 60" required>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="<?= base_url('/services') ?>" class="btn btn-outline-secondary">
                                    <i class="bi bi-arrow-left"></i> Back
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-save"></i> Save Service
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?= $this->endSection() ?>