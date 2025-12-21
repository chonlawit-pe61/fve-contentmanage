<?php $this->extend('template/admin_layout') ?>

<?php $this->section('content'); ?>
<div class="card shadow shadow-lg">
    <form action="<?= base_url('admin/information/saveInformationMoney') ?>" method="POST" autocomplete="off" enctype="multipart/form-data" class="once-only">
        <input type="hidden" name="information_money_id" value="<?= (@$InformationMoney['information_money_id']) ? $InformationMoney['information_money_id'] : '' ?>">
        <div class="card-body">
            <div class="row">
                <div class="col-12 my-2">
                    <h3>
                        ข้อมูลงบประมาณฯ
                    </h3>
                </div>
                <div class="col-12 my-2">
                    <nav class="py-2" aria-label="breadcrumb" style="--bs-breadcrumb-divider: '/'">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="<?= base_url('admin/information/information_about_money') ?>">
                                    ข้อมูลงบประมาณฯ
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                <?= (@$InformationMoney['information_money_id']) ? 'แก้ไขข้อมูล' : 'เพิ่มข้อมูล' ?>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row justify-content-center my-2">
                <div class="col-md-10 my-2">
                    <label for="title" class="form-label">ปี <span class="text-danger">*</span></label>
                    <?php
                    $currentYear = date('Y');
                    $startYear = $currentYear - 10;
                    $endYear = $currentYear + 10;
                    ?>
                    <select name="data_year" class="form-select" aria-label="Default select example">
                        <?php for ($year = $startYear; $year <= $endYear; $year++): ?>
                            <option <?php echo @$InformationMoney['data_year'] == $year ? 'selected' : '' ?> value="<?= $year ?>">
                                <?= $year + 543 ?>
                            </option>
                        <?php endfor; ?>
                    </select>
                </div>
                <div class="col-md-10 my-2">
                    <label for="title" class="form-label">ลิงค์</label>
                    <input type="file" name="file_personel" class="form-control">
                    <?php
                    if (!empty(@$InformationMoney['information_money_file'])) {
                    ?>
                        <a class="btn btn-primary mt-3" href="<?= base_url(@$InformationMoney['information_money_file']) ?>" target="_blank">ดูไฟล์</a>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <div class="row justify-content-center my-2">
                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-success mx-1 btn-submit">
                        <i class="ti ti-device-floppy"></i> บันทึก
                    </button>
                    <a href="<?= base_url('admin/information/information_about_money') ?>" class="btn btn-warning mx-1">
                        <i class="ti ti-chevron-left"></i> กลับ
                    </a>
                </div>
            </div>

        </div>
    </form>
</div>
<?php $this->endSection(); ?>

<?php $this->section('scripts'); ?>

<?php $this->endSection(); ?>