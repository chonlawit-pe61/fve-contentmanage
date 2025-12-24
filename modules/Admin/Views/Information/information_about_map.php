<?php $this->extend('template/admin_layout') ?>

<?php $this->section('content'); ?>
<div class="card shadow shadow-lg">
    <form action="<?= base_url('admin/information/saveInformationAboutMap') ?>" method="POST" autocomplete="off" enctype="multipart/form-data" class="once-only">
        <input type="hidden" name="information_money_id" value="<?= (@$InformationMoney['information_money_id']) ? $InformationMoney['information_money_id'] : '' ?>">
        <div class="card-body">
            <div class="row">
                <div class="col-12 my-2">
                    <h3>
                        แผนผังภายในวิทยาลัย
                    </h3>
                </div>
                <div class="col-12 my-2">
                    <nav class="py-2" aria-label="breadcrumb" style="--bs-breadcrumb-divider: '/'">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="<?= base_url('admin/information/information_about_map') ?>">
                                    แผนผังภายในวิทยาลัย
                                </a>
                            </li>

                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row justify-content-center my-2">

                <div class="col-md-10 my-2">
                    <label for="title" class="form-label">รูปภาพ</label>
                    <input type="file" name="file_personel" class="form-control">
                    <?php
                    if (!empty(@$InformationMap['information_map_file'])) {
                    ?>
                        <img src="<?= base_url(@$InformationMap['information_map_file']) ?>" alt="" class="img-fluid">
                        <!-- <a class="btn btn-primary mt-3" href="<?= base_url(@$InformationMap['information_map_file']) ?>" target="_blank">ดูไฟล์</a> -->
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

                </div>
            </div>

        </div>
    </form>
</div>
<?php $this->endSection(); ?>

<?php $this->section('scripts'); ?>

<?php $this->endSection(); ?>