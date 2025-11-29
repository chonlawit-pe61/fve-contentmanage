<?php $this->extend('template/admin_layout') ?>

<?php $this->section('content'); ?>
<div class="card shadow shadow-lg">
    <form action="<?= base_url('admin/configs/save-content') ?>" method="POST" autocomplete="off" enctype="multipart/form-data" class="once-only">
        <!-- Hidden -->
        <input type="hidden" name="id" value="<?= (@$data['id']) ? $data['id'] : '' ?>">
        <div class="card-body">
            <div class="row justify-content-center my-2">
                <div class="col-12 text-center">
                    <h2 class="text-primary">
                        จัดการข้อมูล<?= $_GET['content_name'] ?>
                    </h2>
                </div>
                <div class="col-md-10 mb-3">
                    <label for="content_name" class="form-label">Content</label>
                    <input type="text" class="form-control" id="content_name" name="content_name" value="<?= @$_GET['content_name'] ?>" readonly>
                </div>

                <div class="col-md-10 mb-3">
                    <label for="content_description" class="form-label">เนื้อหา</label>
                    <textarea name="content_description" id="content_description" class="form-control"><?= ($data) ? $data['content_description'] : '' ?></textarea>
                </div>

                <div class="col-3">
                    <button type="submit" class="btn btn-success w-100">บันทึก</button>
                </div>
            </div>
        </div>
    </form>
</div>
<?php $this->endSection(); ?>

<?php $this->section('scripts'); ?>
<script>
    $(document).ready(function () {
        CKEDITOR.replace('content_description');
    })
</script>
<?php $this->endSection(); ?>