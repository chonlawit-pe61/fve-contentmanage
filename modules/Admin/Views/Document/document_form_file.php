<?php $this->extend('template/admin_layout') ?>

<?php $this->section('content'); ?>
<div class="card shadow shadow-lg">
    <form action="<?= base_url('admin/Document/manageDocumentFile') ?>" method="POST" autocomplete="off" enctype="multipart/form-data" class="once-only">
        <input type="hidden" name="public_document_id" value="<?= (@$public_document_id) ? $public_document_id : '' ?>">
        <input type="hidden" name="public_document_file_id" value="<?= (@$public_document_file_id) ? $public_document_file_id : '' ?>">
        <div class="card-body">
            <div class="row">
                <div class="col-12 my-2">
                    <h3>หมวดเอกสาร
                    </h3>
                </div>
                <div class="col-12 my-2">
                    <nav class="py-2" aria-label="breadcrumb" style="--bs-breadcrumb-divider: '/'">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('admin/Document') ?>">หมวดเอกสาร
                                </a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                <?= (@$document['id']) ? 'แก้ไขข้อมูล' : 'เพิ่มข้อมูล' ?>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row justify-content-center my-2">
                <div class="col-md-10 my-2">
                    <label for="title" class="form-label">ชื่อเอกสาร <span class="text-danger">*</span></label>
                    <input type="text" id="title" name="title" class="form-control" value="<?= @$document_file['title'] ?>" required>
                </div>
                <div class="col-md-10 my-2">
                    <label for="title" class="form-label">ปีการศึกษา <span class="text-danger">*</span></label>
                    <?php
                    $currentYear = date('Y');
                    $startYear = $currentYear - 10;
                    $endYear = $currentYear + 10;
                    ?>
                    <select name="edu_year" class="form-select" aria-label="Default select example">
                        <?php for ($year = $startYear; $year <= $endYear; $year++): ?>
                            <option <?php echo @$document_file['edu_year'] == $year ? 'selected' : '' ?> value="<?= $year ?>">
                                <?= $year + 543 ?>
                            </option>
                        <?php endfor; ?>
                    </select>
                </div>
                <div class="col-md-10 my-2">
                    <label for="title" class="form-label">อัพโหลดเอกสาร</label>
                    <input type="file" id="file" name="file" class="form-control">
                </div>
            </div>
            <div class="row justify-content-center my-2">
                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-success mx-1 btn-submit">
                        <i class="ti ti-device-floppy"></i> บันทึก
                    </button>
                    <a href="<?= base_url('admin/Document') ?>" class="btn btn-warning mx-1">
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