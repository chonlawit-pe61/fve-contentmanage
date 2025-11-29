<?php $this->extend('template/admin_layout') ?>

<?php $this->section('content'); ?>
<div class="card shadow shadow-lg">
    <div class="card-body">
        <div class="row">
            <div class="col-12 my-2">
                <h3>ลิงค์ต่างๆ</h3>
            </div>
            <div class="col-12 my-2">
                <a href="<?= base_url('admin/Link/manage') ?>" class="btn btn-sm mb-1 px-4 fs-4  bg-primary-subtle text-primary float-start">
                    <i class="ti ti-plus"></i> เพิ่มลิงค์
                </a>
            </div>

            <div class="col-12 my-2">
                <div class="table-responsive">
                    <table id="table" class="table align-middle text-nowrap mb-0">
                        <thead class="bg-primary-subtle text-primary text-center">
                            <tr class="text-muted fw-semibold">
                                <th scope="col" width="5%">#</th>
                                <th class="text-start" width="30%">หัวข้อ</th>
                                <th width="30%">ลิ้งค์</th>
                                <th scope="col" width="10%">ไอค่อน</th>
                                <th width="10%">เครื่องมือ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($Link)) {
                                $idx = 0;
                                foreach ($Link as $row) {
                                    $idx++;
                            ?>
                                    <tr class="text-muted fw-semibold">
                                        <td scope="col"><?= $idx ?></td>
                                        <td scope="col"><?= $row['box_name'] ?></td>
                                        <td>
                                            <?= $row['box_url'] ?>
                                        </td>
                                        <td class="text-center" scope="col" width="10%">
                                            <i class="fa <?= $row['box_icon'] ?>"></i>
                                        </td>
                                        <td class="text-center" scope="col" width="10%">

                                            <?php
                                            if ($row['box_name'] == 'ITA') {
                                            ?>
                                                <a href="<?= base_url('admin/Link/manage?id=' . $row['box_id']) ?>" class="btn btn-warning">แก้ไข</a>

                                            <?php
                                            } else {
                                            ?>
                                                <a href="<?= base_url('admin/Link/manage?id=' . $row['box_id']) ?>" class="btn btn-warning">แก้ไข</a>
                                                <button onclick="deleteDocument('<?= $row['box_id'] ?>')" class="btn btn-danger">ลบ</button>
                                            <?php
                                            }
                                            ?>
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
                    url: "<?= base_url('admin/Link/deleteLink') ?>",
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