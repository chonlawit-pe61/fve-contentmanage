<?php $this->extend('template/admin_layout') ?>

<?php $this->section('content'); ?>
<div class="card shadow shadow-lg">
    <div class="card-body">
        <div class="row">
            <div class="col-12 my-2">
                <?php
                if (!empty($_GET['user_id'])) {
                ?>
                    <h3>แก้ผู้ใช้งาน</h3>
                <?php
                } else {
                ?>
                    <h3>เพิ่มผู้ใช้งาน</h3>
                <?php
                }
                ?>

            </div>
            <form action="<?= base_url('admin/Users/saveUser') ?>" method="post">
                <input type="hidden" name="user_id" value="<?= @$_GET['user_id'] ?>">
                <div class="row justify-content-center my-2">
                    <div class="col-md-4 my-2">
                        <label for="title" class="form-label">Username <span class="text-danger">*</span></label>
                        <input type="text" name="username" class="form-control" value="<?= @$user['username'] ?>" required>
                    </div>
                    <div class="col-md-4 my-2">
                        <label for="title" class="form-label">Password <span class="text-danger">*</span></label>
                        <input type="text" name="password" class="form-control" value="<?= @$user['password'] ?>" required>
                    </div>
                </div>
                <div class="row justify-content-center my-2">
                    <div class="col-md-4 my-2">
                        <label for="title" class="form-label">ชื่อ <span class="text-danger">*</span></label>
                        <input type="text" name="f_name" class="form-control" value="<?= @$user['f_name'] ?>" required>
                    </div>
                    <div class="col-md-4 my-2">
                        <label for="title" class="form-label">นามสกุล <span class="text-danger">*</span></label>
                        <input type="text" name="l_name" class="form-control" value="<?= @$user['l_name'] ?>" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <button class="btn btn-success">บันทึก</button>
                        <a href="<?= base_url('admin/Users') ?>" class="btn btn-warning">ย้อนกลับ</a>
                    </div>
                </div>
            </form>

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