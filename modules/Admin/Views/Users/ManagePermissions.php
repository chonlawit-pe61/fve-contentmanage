<?php $this->extend('template/admin_layout') ?>

<?php $this->section('content'); ?>
<div class="card shadow shadow-lg">
    <div class="card-body">
        <div class="row">
            <div class="col-12 my-2">
                <h3>จัดการสิทธิ์การใช้งาน</h3>
            </div>


            <div class="col-12 my-2">
                <form action="<?= base_url('admin/Users/savePermissions') ?>" method="post">
                    <input type="hidden" name="user_id" value="<?= $_GET['user_id'] ?>">
                    <div class="table-responsive">
                        <table id="table" class="table align-middle text-nowrap mb-0">
                            <thead class="bg-primary-subtle text-primary text-center">
                                <tr class="text-muted fw-semibold">
                                    <th scope="col" width="5%">#</th>
                                    <th class="text-start" scope="col" width="40%">โมดูล</th>
                                    <th class="text-center" scope="col" width="10%">ดูข้อมูล</th>
                                    <th class="text-center" width="10%">
                                        เพิ่มข้อมูล
                                    </th>
                                    <th class="text-center" width="10%">
                                        แก้ไขข้อมูล
                                    </th>
                                    <th class="text-center" width="10%">
                                        ลบข้อมูล
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($Module)) {
                                    $idx = 0;
                                    foreach ($Module as $row) {
                                        $idx++;
                                ?>
                                        <tr class="text-muted fw-semibold">
                                            <td scope="col"><?= $idx ?></td>
                                            <td scope="col"><?= $row['module_name'] ?></td>
                                            <td class="text-center">
                                                <input <?= @$permission_User[$row['module_id']]['action_view'] ? 'checked' : '' ?> value="1" type="checkbox" name="permission[<?= $row['module_id'] ?>][action_view]">
                                            </td>
                                            <td class="text-center">
                                                <input value="1" <?= @$permission_User[$row['module_id']]['action_insert'] ? 'checked' : '' ?> type="checkbox" name="permission[<?= $row['module_id'] ?>][action_insert]">
                                            </td>
                                            <td class="text-center">
                                                <input value="1" type="checkbox" <?= @$permission_User[$row['module_id']]['action_update'] ? 'checked' : '' ?> name="permission[<?= $row['module_id'] ?>][action_update]">
                                            </td>
                                            <td class="text-center">
                                                <input value="1" type="checkbox" <?= @$permission_User[$row['module_id']]['action_delete'] ? 'checked' : '' ?> name="permission[<?= $row['module_id'] ?>][action_delete]">
                                            </td>
                                        </tr>
                                <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="my-3 text-center">
                        <button type="submit" class="btn btn-success">บันทึก</button>
                        <a href="<?= base_url('admin/Users') ?>" class="btn btn-warning">ย้อนกลับ</a>
                    </div>
                </form>
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
                    url: "<?= base_url('admin/Alert/deleteAlert') ?>",
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