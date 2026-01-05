<?php $this->extend('template/admin_layout') ?>
<?php $this->section('style'); ?>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css" rel="stylesheet" />
<style>
    .select_font_4 {
        font-family: 'FontAwesome', 'sans-serif';
    }
</style>
<?php $this->endSection(); ?>
<?php $this->section('content'); ?>
<div class="card shadow shadow-lg">
    <form action="<?= base_url('admin/Link/saveLink') ?>" method="POST" autocomplete="off" enctype="multipart/form-data" class="once-only">
        <!-- Hidden -->
        <input type="hidden" name="id" value="<?= (@$_GET['id']) ? $_GET['id'] : '' ?>">
        <div class="card-body">
            <div class="row">
                <div class="col-12 my-2">
                    <h3>ข่าวสาร</h3>
                </div>
                <div class="col-12 my-2">
                    <nav class="py-2" aria-label="breadcrumb" style="--bs-breadcrumb-divider: '/'">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('admin/news') ?>">ข่าวสาร</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                <?= (@$_GET['id']) ? 'แก้ไขข้อมูล' : 'เพิ่มข้อมูล' ?>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row justify-content-center my-2">
                <div class="col-md-8 mb-4">
                    <label for="title" class="form-label">หัวข้อลิ้งค์ <span class="text-danger">*</span></label>
                    <input type="text" id="title" name="box_name" class="form-control" value="<?= @$Link['box_name'] ?>" required>
                </div>
                <div class="col-md-6 mb-4">
                    <label for="icon" class="form-label">icon</label>
                    <select id="icon" name="box_icon" required class="form-select select_font_4 form-select" aria-label="Default select example" data-live-search="true">
                        <option value="">เลือก icon</option>
                        <?php
                        if (!empty($icon)) {
                            foreach ($icon as $i) {
                        ?>
                                <option <?= @$Link['box_icon'] == $i['icon_class'] ? 'selected' : '' ?> value="<?= $i['icon_class'] ?>"><?= $i['icon_class'] ?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-2 my-3 text-center">
                    <label class="form-label" for="icon-preview">icon preview</label>
                    <p><i id="icon-preview" class=""></i></p>
                </div>
                <div class="col-md-8 mb-4">
                    <label for="title" class="form-label">ลิ้งค์ <span class="text-danger">*</span></label>
                    <input type="text" id="title" name="box_url" class="form-control" value="<?= @$Link['box_url'] ?>" required>
                </div>
            </div>
            <div class="row justify-content-center my-2">
                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-success mx-1 btn-submit">
                        <i class="ti ti-device-floppy"></i> บันทึก
                    </button>
                    <a href="<?= base_url('admin/news') ?>" class="btn btn-warning mx-1">
                        <i class="ti ti-chevron-left"></i> กลับ
                    </a>
                </div>
            </div>
        </div>
    </form>
</div>
<?php $this->endSection(); ?>

<?php $this->section('scripts'); ?>
<script>
    $(document).ready(function() {
        $('.form-select').select2();

        // Icon Preview Logic
        function updateIconPreview() {
            var iconClass = $('#icon').val();
            $('#icon-preview').attr('class', 'fa ' + iconClass + ' fa-2x');
        }

        $('#icon').on('change', function() {
            updateIconPreview();
        });

        // Initialize on load
        updateIconPreview();
    });
</script>
<?php $this->endSection(); ?>