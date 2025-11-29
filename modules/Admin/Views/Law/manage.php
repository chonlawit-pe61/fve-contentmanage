<?php $this->extend('template/admin_layout') ?>

<?php $this->section('content'); ?>
<div class="card shadow shadow-lg">
    <form action="<?= base_url('admin/law/save-law') ?>" method="POST" autocomplete="off" enctype="multipart/form-data" class="once-only">
        <!-- Hidden -->
        <input type="hidden" name="id" value="<?= (@$law['id']) ? $law['id'] : '' ?>">
        <div class="card-body">
            <div class="row">
                <div class="col-12 my-2">
                    <h3>กฏหมายที่เกี่ยวข้อง</h3>
                </div>
                <div class="col-12 my-2">
                    <nav class="py-2" aria-label="breadcrumb" style="--bs-breadcrumb-divider: '/'">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('admin/reward') ?>">กฏหมายที่เกี่ยวข้อง</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                <?= (@$law['id']) ? 'แก้ไขข้อมูล' : 'เพิ่มข้อมูล' ?>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="row justify-content-center my-2">
                <div class="col-md-3 my-2">
                    <label for="title" class="form-label">ประเภท <span class="text-danger">*</span></label>
                    <select name="type_id" id="type_id" class="form-select" required>
                        <option value="">-- เลือก --</option>
                        <?php foreach ($law_types as $type) { ?>
                            <option value="<?= $type['id'] ?>" <?= (@$law['type_id'] == $type['id']) ? 'selected' : '' ?>><?= $type['name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-7 my-2">
                    <label for="title" class="form-label">หัวข้อ <span class="text-danger">*</span></label>
                    <input type="text" id="title" name="title" class="form-control" value="<?= @$law['title'] ?>" required>
                </div>
                <div class="col-md-10 my-2">
                    <label for="file_path" class="form-label">ไฟล์แนบ <span class="text-danger">*</span></label>
                    <?php if (empty($law['file_path'])) { ?>
                        <input type="file" name="file" id="file" class="form-control" accept="application/pdf">
                        <span class="text-danger" style="font-size: 12px;">สามารถอัพโหลดเอกสารนามสกุล .pdf เท่านั้น</span>
                    <?php } else {  ?>
                        <br>
                        <a href="<?= base_url($law['file_path']) ?>" target="_blank" class="mx-2">
                            <i class="ti ti-file"></i>
                            <?php
                            $file_name = str_replace('public/uploads/laws/', '', $law['file_path']);
                            echo $file_name
                            ?>
                        </a>
                        <button type="button" class="btn btn-danger btn-sm mx-md-5" onclick="deleteFile('<?= $law['id'] ?>')">
                            <i class="ti ti-trash"></i> ลบไฟล์
                        </button>
                    <?php } ?>
                </div>
            </div>

            <div class="row justify-content-center my-2">
                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-success mx-1 btn-submit">
                        <i class="ti ti-device-floppy"></i> บันทึก
                    </button>
                    <a href="<?= base_url('admin/reward') ?>" class="btn btn-warning mx-1">
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
    function deleteFile(id) {
        Swal.fire({
            title: "ยืนยันการลบข้อมูล ?",
            text: "หากลบแล้วจะไม่สามารถกู้ข้อมูลกลับได้ หรือหากต้องการกู้ข้อมูลให้ติดต่อเจ้าหน้าที่ดูแล",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "ลบข้อมูล",
            cancelButtonText: "ยกเลิก"

        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    method: "POST",
                    url: "<?= base_url('admin/law/delete-file') ?>",
                    data: {
                        id: id
                    },
                });

                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "ลบข้อมูลสำเร็จ",
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    window.location.reload();
                });
            }
        });
    }
</script>
<?php $this->endSection(); ?>