<?php $this->extend('template/admin_layout') ?>

<?php $this->section('content'); ?>
<div class="card shadow shadow-lg">
    <div class="card-body">
        <div class="row">
            <div class="col-12 my-2">
                <h3>หมวดเอกสาร</h3>
            </div>
            <div class="col-12 my-2">
                <a href="<?= base_url('admin/Document/manage') ?>" class="btn btn-sm mb-1 px-4 fs-4  bg-primary-subtle text-primary float-start">
                    <i class="ti ti-plus"></i> เพิ่มหมวดเอกสาร
                </a>
            </div>

            <div class="col-12 my-2">
                <div class="table-responsive">
                    <table id="table" class="table align-middle text-nowrap mb-0">
                        <thead class="bg-primary-subtle text-primary text-center">
                            <tr class="text-muted fw-semibold">
                                <th scope="col" width="5%">#</th>
                                <th class="text-start" scope="col" width="85%">หมวดเอกสาร</th>
                                <th>แสดงหน้าหลัก</th>
                                <th scope="col" width="10%">เครื่องมือ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($document)) {
                                $idx = 0;
                                foreach ($document as $row) {
                                    $idx++;
                            ?>
                                    <tr class="text-muted fw-semibold">
                                        <td scope="col" width="5%"><?= $idx ?></td>
                                        <td scope="col" width="85%"><?= $row['title'] ?></td>
                                        <td>
                                            <div class="form-check form-switch">
                                                <input onchange="is_show('<?= $row['id'] ?>',this.checked ? 1 : 0)" class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" <?= $row['is_show'] ? 'checked' : '' ?>>
                                            </div>
                                        </td>
                                        <td scope="col" width="10%">
                                            <a href="<?= base_url('admin/Document/listFile/' . $row['id']) ?>" class="btn btn-success">เพิ่มเอกสาร</a>
                                            <a href="<?= base_url('admin/Document/manage/' . $row['id']) ?>" class="btn btn-warning">
                                                แก้ไขหมวดเอกสาร
                                            </a>
                                            <button type="button" onclick="deleteDocument('<?= $row['id'] ?>')" class="btn btn-danger">
                                                ลบหมวดเอกสาร
                                            </button>
                                        </td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
<?php $this->endSection(); ?>
<?php $this->section('scripts'); ?>
<script>
    const is_show = (id, status) => {
        $.ajax({
            type: "post",
            url: "<?= base_url('admin/Document/ShowContentDocument') ?>",
            data: {
                'id': id,
                'is_show': status
            },
            success: function(response) {

            }
        });
    }

    function deleteDocument(id) {
        // console.log(id);
        Swal.fire({
            title: "ยืนยันการลบข้อมูล ?",
            text: "หากลบแล้วจะไม่สามารถกู้ข้อมูลกลับได้",
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
                    url: "<?= base_url('admin/Document/deleteDocument') ?>",
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