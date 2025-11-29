<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>เข้าสู่ระบบ</title>
    <link rel="icon" href="<?= base_url('public/img/logo.jpeg') ?>" type="image/icon type">
    <link rel="stylesheet" href="<?php echo base_url('public/assets/css/styles.css') ?>">
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <div
            class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3">
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="" class="text-nowrap logo-img text-center d-block py-3 w-100">
                                    <img src="<?= base_url('public/img/logo_cktc.png') ?>" width="120" alt="">
                                </a>
                                <p class="text-center">ระบบจัดการเว็บไซต์วิทยาลัยเทคนิคเชียงคำ</p>
                                <div class="row">
                                    <div class="col-12">
                                        <?php if (session()->getFlashdata('msg')) { ?>
                                            <div class="alert alert-danger" role="alert">
                                                <?= session()->getFlashdata('msg') ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <form action="<?= base_url('admin/sign-in') ?>" method="POST">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">ชื่อผู้ใช้งาน</label>
                                        <input type="text" class="form-control" id="" name="username" autocomplete="off">
                                    </div>
                                    <div class="mb-4">
                                        <label for="exampleInputPassword1" class="form-label">รหัสผ่าน</label>
                                        <input type="password" class="form-control" id="" name="password" autocomplete="off">
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">เข้าสู่ระบบ</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>