<?php $this->extend('template/admin_layout') ?>

<?php $this->section('content'); ?>
<div class="card shadow shadow-lg">
    <div class="card-body">
        <div class="row">
            <div class="col-12 my-2">
                <h3>ผู้ใช้งาน</h3>
            </div>
            <div class="col-12 my-2">
                <a href="<?= base_url('admin/Users/manageUser') ?>" class="btn btn-sm mb-1 px-4 fs-4  bg-primary-subtle text-primary float-start">
                    <i class="ti ti-plus"></i> เพิ่มผู้ใช้งาน
                </a>
            </div>

            <div class="col-12 my-2">
                <div class="table-responsive">
                    <table id="table" class="table align-middle text-nowrap mb-0">
                        <thead class="bg-primary-subtle text-primary text-center">
                            <tr class="text-muted fw-semibold">
                                <th scope="col" width="5%">#</th>
                                <th class="text-start" scope="col" width="40%">ชื่อ</th>
                                <th class="text-start" scope="col" width="40%">นามสกุล</th>
                                <th scope="col" width="10%">เครื่องมือ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($users)) {
                                $idx = 0;
                                foreach ($users as $row) {
                                    $idx++;
                            ?>
                                    <tr class="text-muted fw-semibold">
                                        <td scope="col"><?= $idx ?></td>
                                        <td scope="col"><?= $row['f_name'] ?></td>
                                        <td scope="col"><?= $row['l_name'] ?></td>
                                        <td scope="col">
                                            <a href="<?= base_url('admin/Users/permissions?user_id=' . $row['id']) ?>" class="btn btn-info">จัดการสิทธิ์</a>
                                            <a href="<?= base_url('admin/Users/manageUser?user_id=' . $row['id']) ?>" class="btn btn-warning">แก้ไข</a>
                                            <button onclick="deleteAlert('<?= $row['id'] ?>')" class="btn btn-danger">ลบ</button>
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
    function deleteAlert(id) {
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
                    url: "<?= base_url('admin/Users/deleteUser') ?>",
                    data: {
                        user_id: id
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