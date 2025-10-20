<?= $this->extend('layouts/app') ?>
<?= $this->section('title') ?>My Requests<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container mt-4">
    <h3>My Service Requests</h3>

    <table class="table table-striped mt-3">
        <thead>
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
        <?php if(!empty($requests)): ?>
            <?php foreach($requests as $r): ?>
                <tr>
                    <td><?= $r['id'] ?></td>
                    <td><?= $r['staff_name'] ?></td>
                    <td><?= $r['service_name'] ?></td>
                    <td><?= $r['date'] ?></td>
                    <td>
                        <span class="badge <?= $r['status']=='pending' ? 'bg-warning' : ($r['status']=='confirmed' ? 'bg-info' : 'bg-success') ?>">
                            <?= ucfirst($r['status']) ?>
                        </span>
                    </td>
                    <td>
                        <?php if($r['status'] == 'pending'): ?>
                            <a href="<?= base_url('/customer/request-cancel/'.$r['id']) ?>" class="btn btn-sm btn-danger">Cancel</a>
                        <?php else: ?>
                            <span class="text-muted">N/A</span>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="6" class="text-center">No requests found.</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>
