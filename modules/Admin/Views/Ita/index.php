<?= $this->extend('template/admin_layout') ?>

<?= $this->section('content') ?>
<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">จัดการข้อมูล ITA (เลือกปีงบประมาณ)</h5>

        <div class="row">
            <?php foreach ($years as $y) : ?>
                <div class="col-md-3">
                    <div class="card bg-light-primary">
                        <div class="card-body text-center">
                            <h3 class="card-title"><?= $y['ita_year'] ?></h3>
                            <a href="<?= base_url('admin/ita/topics/' . $y['ita_year']) ?>" class="btn btn-primary mt-2">จัดการหัวข้อ</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

            <div class="col-md-3">
                <div class="card border-dashed">
                    <div class="card-body text-center d-flex align-items-center justify-content-center" style="min-height: 150px;">
                        <a href="<?= base_url('admin/ita/manage_topic') ?>" class="btn btn-outline-primary">
                            <i class="ti ti-plus"></i> เพิ่มหัวข้อปีใหม่
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<?= $this->endSection() ?>