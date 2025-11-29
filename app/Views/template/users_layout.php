<!doctype html>
<html lang="en">
<?php

use App\Models\MainModel;
use Modules\Admin\Models\CourseModel;
use Modules\Admin\Models\InformationModel;
use Modules\Users\Models\DocumentModel;
use Modules\Users\Models\AboutModel;
use Modules\Users\Models\OrganizationModel;

$OrganizationModel = new OrganizationModel();
$MainModel = new MainModel();
$InformationModel = new InformationModel();
$org_4 = $OrganizationModel->getOrganizationList(4);
$org_5 = $OrganizationModel->getOrganizationList(5);
$org_6 = $OrganizationModel->getOrganizationList(6);
$org_7 = $OrganizationModel->getOrganizationList(7);

$AboutModel = new AboutModel();
$information = $AboutModel->getInformationEducational();

// t;

// logs
$logs = $MainModel->countLogs('view', 'user');

// echo '<pre>';
// print_r($information);
// die();
$DocumentModel = new DocumentModel();

$public_document = $DocumentModel->getPublicDocument();

$CourseModel = new CourseModel();

$course = $CourseModel->courseById();
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>วิทยาลัยเทคนิคเชียงคํา</title>
    <link rel="icon" href="<?= base_url('public/img/logofve.png') ?>" type="image/icon type">

    <link rel="stylesheet" href="<?php echo base_url('public/assets/css/styles.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('public/assets/css/myStyles.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('public/js/DatepickerThai/css/datepicker.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('public/css/dataTables.dataTables.min.css') ?>">


    <link rel="stylesheet" href="<?php echo base_url('public/css/jqueryBracket/jquery.bracket.min.css') ?>">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('public/css/kanit.css') ?>">

    <link rel="stylesheet" href="<?php echo base_url('public/css/cropper.min.css') ?>" />
    <link rel="stylesheet" href="<?php echo base_url('public/css/select2.min.css') ?>" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" integrity="sha512-1cK78a1o+ht2JcaW6g8OXYwqpev9+6GqOkz9xmBN9iUUhIndKtxwILGWYOSibOKjLsEdjyjZvYDq/cZwNeak0w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/magnific-popup/dist/magnific-popup.css">
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url('public/css/font-awesome_4.7/css/font-awesome.min.css') ?>">
    <!-- <link href="<?php echo base_url('public/css/orgchart.css') ?>" rel="stylesheet"> -->
</head>
<?php $this->renderSection('style'); ?>

<?php
$url = uri_string();
$control = explode('/', $url);
?>
<style>
    html,
    body {
        font-family: 'Kanit', sans-serif;
        background-color: #f1f6fc;
        margin: 0;
        padding: 0;
    }

    .header_bg {
        background-color: #860000;
        /* background-color: white; */
    }

    #navbarSupportedContent {
        background: transparent !important;
    }

    .bg_content {
        background-color: #FFFFFF;
    }

    .modal-backdrop {
        display: none;
    }

    body.modal-open {
        transform: none !important;
        overflow: auto !important;
        touch-action: auto !important;
    }

    .bg_footer {
        background-color: #7b0000;
        color: white;
        font-family: 'Prompt', sans-serif;
    }

    .ve-section-title {
        color: #ffc107;
        font-size: 1.2rem;
        font-weight: bold;
        margin-bottom: 1rem;
    }



    hr {
        margin-top: 1rem;
        margin-bottom: 1rem;
        border: 0;
        border-top: 1px solid rgba(0, 0, 0, 1);
    }


    .ve-list {
        list-style: none;
        padding-left: 0;
    }

    .ve-list li::before {
        content: "⦿ ";
        color: white;
        margin-right: 0.3rem;
    }

    .ve-footer {
        margin-top: 3rem;
        padding: 2rem 0;

        text-align: center;
        font-size: 0.9rem;
    }

    .ve-footer strong {
        display: block;
        font-size: 1.1rem;
        margin-top: 1rem;
    }

    .ve-footer a {
        color: #ffcc00;
        text-decoration: none;
    }

    .header_bg {
        background-color: white;
        /* color: bla; */
        /* background-color: #870100; */
    }

    .dropdown-submenu {
        position: relative;
    }

    .dropdown-submenu>.dropdown-menu {
        top: 0;
        left: 100%;
        margin-top: -1px;
        display: none;
    }

    @media (min-width: 992px) {
        .dropdown-submenu:hover>.dropdown-menu {
            display: block;
        }
    }

    /* บังคับให้ลูกศรแสดงด้านขวา */
    .dropend>.dropdown-toggle::after {
        float: right;
        margin-left: 0.255em;
        vertical-align: 0.255em;
        content: "\25B6";
        border: none;
    }

    @media (max-width: 991.98px) {
        .dropdown-submenu>.dropdown-menu {
            position: relative;
            left: 0;
            top: 0;
            display: none;
            margin-left: 1rem;
        }

        .dropdown-submenu.open>.dropdown-menu {
            display: block;
        }
    }

    .dropdown-menu {
        width: 300px;
    }

    .bg-header-table {
        --bs-bg-opacity: 1;
        background-color: rgb(175, 57, 57) !important;
    }

    .bg-primary-subtle-new {
        background-color: rgb(209, 209, 209);
    }
</style>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark header_bg fixed-top shadow-sm ">
        <div class="container px-lg-5">
            <a href="<?php echo base_url() ?>">
                <div class="d-flex align-middle">
                    <img class="img-fluid" style="height: 70px;" src="<?php echo base_url($information['image_path']) ?>" alt="">
                    <h5 class="my-auto mx-1">
                        วิทยาลัยเทคนิคเชียงคํา
                        <p class="mb-0">ChiangKham Technical College</p>
                    </h5>
                </div>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 fw-light">
                    <li class="nav-item">
                        <a class="nav-link active text-dark" aria-current="page" href="<?php echo base_url('/') ?>">หน้าแรก</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-dark" href="#" id="dataDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            ข้อมูลฯ
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dataDropdown">
                            <li><a class="dropdown-item" href="<?php echo base_url('/About/information_educational') ?>">ข้อมูลทั่วไปของสถานศึกษา</a></li>
                            <li><a class="dropdown-item" href="<?php echo base_url('/About/information_student') ?>">ข้อมูลนักเรียน</a></li>
                            <!-- <li><a class="dropdown-item" href="<?php echo base_url('/About/information_about_manage') ?>">โครงสร้างการบริหาร</a></li> -->
                            <!-- <li><a class="dropdown-item" href="<?php echo base_url('/About/information_law') ?>">กฎหมายที่เกี่ยวข้อง</a></li> -->
                            <li><a class="dropdown-item" href="<?php echo base_url('/About/information_giftPolicy') ?>">นโยบายไม่รับของขวัญ</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            หน่วยงาน
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li class="dropdown-submenu dropend">
                                <a class="dropdown-item dropdown-toggle ms-auto" href="#" data-bs-toggle="dropdown">ฝ่ายบริหารทรัพยากร</a>
                                <ul class="dropdown-menu">
                                    <?php
                                    if (!empty($org_4)) {
                                        foreach ($org_4 as $row) {
                                    ?>
                                            <li><a class="dropdown-item" href="<?php echo base_url('Organization/' . $row['id']) ?>"><?php echo $row['name'] ?></a></li>
                                    <?php
                                        }
                                    }
                                    ?>
                                </ul>
                            </li>
                            <li class="dropdown-submenu dropend">
                                <a class="dropdown-item dropdown-toggle ms-auto" href="#" data-bs-toggle="dropdown">ฝ่ายแผนงานและความร่วมมือ</a>
                                <ul class="dropdown-menu">
                                    <?php
                                    if (!empty($org_5)) {
                                        foreach ($org_5 as $row) {
                                    ?>
                                            <li><a class="dropdown-item" href="<?php echo base_url('Organization/' . $row['id']) ?>"><?php echo $row['name'] ?></a></li>
                                    <?php
                                        }
                                    }
                                    ?>
                                </ul>
                            </li>
                            <li class="dropdown-submenu dropend">
                                <a class="dropdown-item dropdown-toggle ms-auto" href="#" data-bs-toggle="dropdown">ฝ่ายพัฒนากิจการนักศึกษา
                                </a>
                                <ul class="dropdown-menu">
                                    <?php
                                    if (!empty($org_6)) {
                                        foreach ($org_6 as $row) {
                                    ?>
                                            <li><a class="dropdown-item" href="<?php echo base_url('Organization/' . $row['id']) ?>"><?php echo $row['name'] ?></a></li>
                                    <?php
                                        }
                                    }
                                    ?>
                                </ul>
                            </li>
                            <li class="dropdown-submenu dropend">
                                <a class="dropdown-item dropdown-toggle ms-auto" href="#" data-bs-toggle="dropdown">ฝ่ายวิชาการ
                                </a>
                                <ul class="dropdown-menu">
                                    <?php
                                    if (!empty($org_7)) {
                                        foreach ($org_7 as $row) {
                                    ?>
                                            <li><a class="dropdown-item" href="<?php echo base_url('Organization/' . $row['id']) ?>"><?php echo $row['name'] ?></a></li>
                                    <?php
                                        }
                                    }
                                    ?>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="<?= base_url('news') ?>">ข่าวสาร</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-dark" href="#" id="dataDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            เอกสาร
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dataDropdown">
                            <?php
                            if (!empty($public_document)) {
                                foreach ($public_document as $row) {
                                    if (!empty($row['url'])) {
                            ?>
                                        <li>
                                            <a
                                                class="dropdown-item" target="_blank" style="text-wrap: auto;" href="<?php echo $row['url'] ?>"><?= $row['title'] ?>
                                            </a>
                                        </li>
                                    <?php
                                    } else {
                                    ?>
                                        <li>
                                            <a
                                                class="dropdown-item" style="text-wrap: auto;" href="<?php echo base_url('document?type=' . $row['id']) ?>"><?= $row['title'] ?>
                                            </a>
                                        </li>
                                    <?php
                                    }
                                    ?>

                            <?php
                                }
                            }
                            ?>

                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-dark" href="<?php echo base_url('contact') ?>">ติดต่อเรา</a>
                    </li>


                </ul>
            </div>
        </div>
    </nav>
    <div class="" style="padding-top: 85px;">
        <?php $this->renderSection('content'); ?>
    </div>
    <style>
        /* ===== โค้ดเดิมของคุณ (คงไว้ได้ทั้งหมด) ===== */
        .footer {
            background-color: #8b0000;
            color: #fff;
            padding: 40px 20px;
            font-family: "Sarabun", sans-serif;
        }

        .footer-container {
            display: grid;
            grid-template-columns: 1.5fr 1fr 1fr 1fr;
            gap: 70px;
            max-width: 1500px;
            margin: auto;
        }



        .footer-col-right {
            border-right: 3px solid gold;
        }

        .footer-col h3 {
            font-size: 18px;
            margin-bottom: 15px;
            color: #ffc107;
            padding-left: 10px;
        }

        .footer-col ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .footer-col ul li {
            margin-bottom: 8px;
            font-size: 15px;
        }

        .logo-col {
            text-align: left;
        }

        .footer-logo {
            width: 120px;
            margin-bottom: 10px;
        }

        address {
            font-size: 14px;
            line-height: 1.6;
            margin-top: 10px;
            color: #f0d9d9;
        }

        li::marker {
            font-size: 20px;
            vertical-align: middle;
            line-height: 20px;
        }

        /* ===== เพิ่มเติมเพื่อความยืดหยุ่น/กันล้น ===== */
        .footer * {
            box-sizing: border-box;
        }

        .footer h2 {
            font-size: clamp(18px, 2.2vw, 28px);
            margin: 0 0 6px;
        }

        .footer p {
            font-size: clamp(13px, 1.6vw, 16px);
            margin: 0;
            opacity: .95;
        }

        .footer-col {
            min-width: 0;
        }

        /* กันข้อความล้นคอลัมน์ */
        address {
            word-wrap: break-word;
            word-break: break-word;
        }

        /* แสดงเส้นขวาเฉพาะคอลัมน์ที่ต้องการในจอใหญ่ */
        .footer-col-right {
            border-right: 3px solid gold;
            padding-right: 20px;
        }

        .footer-col-right:last-child {
            border-right: none;
        }

        /* ===== Breakpoints ที่ละเอียดขึ้น ===== */
        /* XL ≈ ≤ 1200px : ลดเป็น 3 คอลัมน์ */
        @media (max-width: 1200px) {
            .footer-container {
                grid-template-columns: 1.2fr 1fr 1fr;
                gap: 48px;
                padding-inline: 16px;
            }

            .footer-col-right {
                padding-right: 16px;
            }

            .footer-logo {
                width: 110px;
            }
        }

        /* LG ≈ ≤ 992px : 2 คอลัมน์ + จัดโลโก้ให้สวยขึ้น */
        @media (max-width: 992px) {
            .footer-container {
                grid-template-columns: 1fr 1fr;
                gap: 36px 28px;
            }

            /* เส้นกั้นเปลี่ยนเป็นแนวนอนแทน เพื่อไม่ให้แน่น */
            .footer-col-right {
                border-right: none;
                border-bottom: 2px solid rgba(255, 215, 0, .6);
                padding-bottom: 16px;
            }

            .footer-col-right:last-child {
                border-bottom: none;
            }

            .logo-col {
                text-align: left;
            }

            .footer-logo {
                width: 100px;
            }
        }

        /* MD ≈ ≤ 768px : จัดหัวข้อ/รายการให้คลิกง่าย */
        @media (max-width: 768px) {
            .footer-col h3 {
                font-size: 17px;
            }

            .footer-col ul li {
                font-size: 16px;
                line-height: 1.7;
            }
        }

        /* SM ≈ ≤ 600px : 1 คอลัมน์ เต็มความกว้าง + จัดกึ่งกลาง */
        @media (max-width: 600px) {
            .footer-container {
                grid-template-columns: 1fr;
                gap: 28px;
            }

            .logo-col {
                text-align: center;
            }

            .footer-logo {
                margin: 0 auto 12px;
                width: 96px;
            }

            .footer h2,
            .footer p,
            address {
                text-align: center;
            }

            .footer-col-right {
                border: none;
                padding: 0;
            }

            .footer {
                padding: 28px 16px;
            }
        }

        /* XS ≈ ≤ 380px : ลดช่องไฟเพิ่มพื้นที่ */
        @media (max-width: 380px) {
            .footer {
                padding: 24px 12px;
            }

            .footer-col ul li {
                margin-bottom: 6px;
            }
        }
    </style>

    <footer class="footer">
        <div class="footer-container container-lg">
            <!-- โลโก้ + ชื่อวิทยาลัย -->
            <div class="footer-col logo-col">
                <div class="d-flex">
                    <div>
                        <img src="<?php echo base_url('public/img/logo_cktc.png') ?>" alt="College Logo" class="footer-logo" />
                    </div>
                    <div class="my-auto mx-3">
                        <h2 class="text-white">วิทยาลัยเทคนิคเชียงคำ</h2>
                        <p>ChiangKham Technical College</p>
                    </div>
                </div>
                <address>
                    <?= $information['address'] ?><br>
                    199 Ban Nong Yao, Mae Soon Subdistrict, Fang District, Chiang Mai 50110, Thailand
                </address>
                <div class="d-flex align-items-center">
                    <a href="<?= $information['facebook'] ?>" target="_blank">
                        <div class="bg-white  rounded-circle my-auto text-center mx-1" style="height: 30px;vertical-align: middle;width: 30px;">
                            <i class="fab fa-facebook-f text-dark my-auto mx-auto text-center mt-1" style="vertical-align: middle;"></i>
                        </div>
                    </a>
                    <a href="<?= $information['youtube'] ?>" target="_blank">
                        <div class="bg-white  rounded-circle my-auto text-center mx-1" style="height: 30px;vertical-align: middle;width: 30px;">
                            <i class="fab fa-youtube text-dark mt-2"></i>
                        </div>
                    </a>
                    <div class="bg-white  rounded-circle my-auto text-center mx-1" style="height: 30px;vertical-align: middle;width: 30px;">
                        <i class="fab fa-tiktok text-dark mt-2" aria-hidden="true"></i>
                    </div>
                    <div class="mx-3 d-flex align-items-center">
                        <i class="fas fa-user text-warning fs-7" aria-hidden="true"></i><span class="mx-1">online <?= $logs['num'] ?></span>
                    </div>

                </div>
            </div>

            <!-- นโยบายการให้บริการ -->
            <div class="footer-col footer-col-right mx-5 mx-lg-0">
                <h3>นโยบายการให้บริการ</h3>
                <ul style="list-style:unset">
                    <li>
                        <a class="text-white" href="<?php echo base_url('policy') ?>">นโยบายเว็บไซต์</a>
                    </li>
                    <li><a class="text-white" href="<?php echo base_url('policy/securityPolicy') ?>">การรักษาปลอดภัยเว็บไซต์</a> </li>
                    <li><a class="text-white" href="<?php echo base_url('policy/privacyPolicy') ?>">การคุ้มครองข้อมูลส่วนบุคคล</a> </li>
                    <li><a class="text-white" href="<?php echo base_url('contact') ?>">ติดต่อเรา</a></li>
                </ul>
            </div>

            <!-- แผนกวิชาที่เปิดสอน -->
            <div class="footer-col footer-col-right mx-5 mx-lg-0">
                <h3>แผนกวิชาที่เปิดสอน</h3>
                <ul style="list-style:unset">
                    <?php
                    if (!empty($course)) {
                        foreach ($course as $row) {
                    ?>
                            <li class="">
                                <a class="text-white" href="<?php echo base_url('Course/detail/' . $row['id']) ?>"><?php echo $row['name'] ?></a>
                            </li>
                    <?php
                        }
                    }
                    ?>
                </ul>
            </div>

            <!-- หน่วยงาน -->
            <!-- <div class="footer-col mx-5 mx-lg-0">
                <h3>หน่วยงาน</h3>
                <ul style="list-style:unset">
                    <li>ฝ่ายบริหารทรัพยากร</li>
                    <li>ฝ่ายแผนงานและความร่วมมือ</li>
                    <li>ฝ่ายพัฒนากิจการนักเรียน นักศึกษา</li>
                    <li>ฝ่ายวิชาการ</li>
                    <li>ข่าวสารสำหรับนักเรียน นักศึกษา</li>
                    <li>ข่าวสารสำหรับครูและบุคลากร</li>
                    <li>ข่าวประชาสัมพันธ์</li>
                    <li>ข่าวประกวดราคา</li>
                    <li>ข่าวรับสมัครงาน</li>
                </ul>
            </div> -->

        </div>
        <div class="container-lg" style="max-width: 1500px">
            <div class="col-lg-12 my-3 text-center">
                <h3 style="font-size: 18px;margin-bottom: 15px;color: #ffc107;padding-left: 10px;">หน่วยงาน</h3>
                <div class="row ">
                    <div class="col-lg-3 mx-auto">
                        <ul>
                            <li style="font-size: 18px;color:#ffc107;" class="mb-2">ฝ่ายบริหารทรัพยากร</li>
                            <?php
                            if (!empty($org_4)) {
                                $none_style = 'none';
                            }
                            ?>
                            <li style="list-style:<?= $none_style ?>">
                                <ul class="text-start" style="padding-left: 20px; list-style:disc;font-size: 15px;">
                                    <?php
                                    if (!empty($org_4)) {
                                        foreach ($org_4 as $row) {
                                    ?>
                                            <li><a class="text-white text-start" href="<?php echo base_url('Organization/' . $row['id']) ?>"><?php echo $row['name'] ?></a></li>
                                    <?php
                                        }
                                    }
                                    ?>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-3 mx-auto">
                        <ul>
                            <li style="font-size: 18px;color:#ffc107;" class="mb-2">ฝ่ายแผนงานและความร่วมมือ</li>
                            <?php
                            if (!empty($org_4)) {
                                $none_style = 'none';
                            }
                            ?>
                            <li style="list-style:<?= $none_style ?>">
                                <ul class="text-start" style="padding-left: 20px; list-style:disc;font-size: 15px;">
                                    <?php
                                    if (!empty($org_4)) {
                                        foreach ($org_4 as $row) {
                                    ?>
                                            <li><a class="text-white" href="<?php echo base_url('Organization/' . $row['id']) ?>"><?php echo $row['name'] ?></a></li>
                                    <?php
                                        }
                                    }
                                    ?>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-3 mx-auto">
                        <ul>
                            <li style="font-size: 18px; color:#ffc107;" class="mb-2">ฝ่ายพัฒนากิจการนักเรียนนักศึกษา</li>
                            <?php
                            if (!empty($org_6)) {
                                $none_style = 'none';
                            }
                            ?>
                            <li style="list-style:<?= $none_style ?>">
                                <ul class="text-start" style="padding-left: 20px; list-style:disc;font-size: 15px;">
                                    <?php
                                    if (!empty($org_6)) {
                                        foreach ($org_6 as $row) {
                                    ?>
                                            <li><a class="text-white" href="<?php echo base_url('Organization/' . $row['id']) ?>"><?php echo $row['name'] ?></a></li>
                                    <?php
                                        }
                                    }
                                    ?>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-3 mx-auto">
                        <ul>
                            <li style="font-size: 18px; color:#ffc107;" class="mb-2">ฝ่ายวิชาการ</li>
                            <?php
                            if (!empty($org_7)) {
                                $none_style = 'none';
                            }
                            ?>
                            <li style="list-style:<?= $none_style ?>">
                                <ul class="text-start" style="padding-left: 20px; list-style:disc;font-size: 15px;">
                                    <?php
                                    if (!empty($org_7)) {
                                        foreach ($org_7 as $row) {
                                    ?>
                                            <li><a class="text-white" href="<?php echo base_url('Organization/' . $row['id']) ?>"><?php echo $row['name'] ?></a></li>
                                    <?php
                                        }
                                    }
                                    ?>
                                </ul>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>

    </footer>

    <!-- <div class="bg_footer">
        <div class="container d-flex flex-col justify-content-center">
            <div class="pt-5">
                <div class="row justify-content-lg-center justify-start">

                    <div class="col-md-3 px-3 col-6 ">
                        <div class="ve-section-title text-center">นโยบายการให้บริการ
                        </div>
                        <div class="d-flex justify-content-center ">
                            <ul class="ve-list mx-auto">
                                <li><a class="text-white" href="<?php echo base_url('policy') ?>">นโยบายเว็บไซต์</a>
                                </li>
                                <li><a class="text-white" href="<?php echo base_url('policy/securityPolicy') ?>">การรักษาปลอดภัยเว็บไซต์</a> </li>
                                <li><a class="text-white" href="<?php echo base_url('policy/privacyPolicy') ?>">การคุ้มครองข้อมูลส่วนบุคคล</a> </li>
                                <li><a class="text-white" href="<?php echo base_url('contact') ?>">ติดต่อเรา</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 px-3 col-6">
                        <div class="ve-section-title text-center">แผนกวิชาที่เปิดสอน</div>
                        <div class="d-flex justify-content-center">
                            <ul id="" class="ve-list text-white">
                                <?php
                                if (!empty($course)) {
                                    foreach ($course as $row) {
                                ?>
                                        <li id="menu-item-7889" class=""><a class="text-white" href="<?php echo base_url('Course/detail/' . $row['id']) ?>"><?php echo $row['name'] ?></a></li>
                                <?php
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 px-3 col-12 text-start">
                        <div class="ve-section-title">หน่วยงาน</div>
                        <ul id="" class="ve-list">
                            <li id="" class=""><a class="text-white" href="">ฝ่ายบริหารทรัพยากร</a></li>
                            <li id="" class=""><a class="text-white" href="">ฝ่ายแผนงานและความร่วมมือ</a></li>
                            <li id="" class=""><a class="text-white" href="">ฝ่ายพัฒนากิจการนักเรียน นักศึกษา</a></li>
                            <li id="" class=""><a class="text-white" href="">ฝ่ายวิชาการ</a></li>
                            <li id="menu-item-3345" class=""><a class="text-white" href="">ข่าวสารสำหรับนักเรียน นักศึกษา</a></li>
                            <li id="menu-item-3344" class=""><a class="text-white" href="">ข่าวสารสำหรับครูและบุคลากร</a></li>
                            <li id="menu-item-3342" class=""><a class="text-white" href="">ข่าวประชาสัมพันธ์</a></li>
                            <li id="menu-item-3341" class=""><a class="text-white" href="">ข่าวประกวดราคา</a></li>
                            <li id="menu-item-3343" class=""><a class="text-white" href="">ข่าวรับสมัครงาน</a></li>
                        </ul>

                    </div>

                    <div class="col-lg-12">
                        <div class="ve-footer mt-0 mb-0 pb-0">

                            <strong>วิทยาลัยเทคนิคเชียงคำ</strong>
                            <?php echo $information['address'] . ' ' . $information['phone'] ?>

                            ออกแบบและพัฒนาโดย นายนฤเบศ สอนง่าย ครูประจำสาขาวิชาเทคโนโลยีธุรกิจดิจิทัล
                        </div>
                    </div>
                </div>
            </div>
            <hr>
        </div>
    </div> -->
    <script src="<?php echo base_url('public/js/jquery-3.5.1.min.js') ?>"></script>
    <script src="<?php echo base_url('public/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?php echo base_url('public/js/jquery.mask.min.js') ?>"></script>

    <script src="<?php echo base_url('public/js/popper.min.js') ?>"></script>
    <script src="<?php echo base_url('public/js/popper.min.js') ?>"></script>
    <script src="<?php echo base_url("public/js/DatepickerThai/bootstrap-datepicker.js"); ?>"></script>
    <script src="<?php echo base_url("public/js/DatepickerThai/bootstrap-datepicker-thai.js"); ?>"></script>
    <script src="<?php echo base_url("public/js/DatepickerThai/bootstrap-datepicker.th.js"); ?>"></script>
    <script src="<?php echo base_url("public/js/dataTables.min.js"); ?>"></script>
    <script src="<?php echo base_url("public/js/sweetalert2@11.js"); ?>"></script>
    <script src="<?php echo base_url("public/js/index.global.min.js"); ?>"></script>
    <script src="<?php echo base_url('public/js/cropper.min.js') ?>"></script>
    <script src="<?php echo base_url('public/js/select2.min.js') ?>"></script>

    <script src="<?= base_url('public/assets/js/sidebarmenu.js') ?>"></script>
    <script src="<?= base_url('public/assets/js/app.min.js') ?>"></script>
    <script src="<?= base_url('public/js/jqueryBracket/jquery.bracket.min.js') ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js" integrity="sha512-A7AYk1fGKX6S2SsHywmPkrnzTZHrgiVT7GcQkLGDe2ev0aWb8zejytzS8wjo7PGEXKqJOrjQ4oORtnimIRZBtw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdn.jsdelivr.net/npm/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
    <!-- <script src="<?php echo base_url('public/js/orgchart.js') ?>"></script> -->
    <script src="https://d3js.org/d3.v7.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/d3-flextree@2.1.2/build/d3-flextree.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/d3-org-chart@3"></script>

    <script>
        let dtLanguage = {
            "lengthMenu": "แสดง _MENU_ รายการ",
            "search": "ค้นหา:",
            "zeroRecords": "ไม่มีข้อมูล",
            "emptyTable": "ไม่มีข้อมูลในตาราง",
            "info": "รายการที่ _START_ ถึง _END_ จาก _TOTAL_ รายการ",
            "infoFiltered": "(กรองข้อมูลจากทั้งหมด _MAX_ แถว)",
            "infoEmpty": "ไม่มีข้อมูล",
            "paginate": {
                "first": "หน้าแรก",
                "last": "หน้าสุดท้าย",
                "next": "ถัดไป",
                "previous": "ก่อนหน้า"
            },
        };

        $(document).ready(function() {
            $('.phone-input').mask('000-000-0000');
            $('.shirt_number').mask('00', {
                translation: {
                    '0': {
                        pattern: /[0-9]/,
                        optional: true
                    }
                }
            });
            $('.number-3-digit').mask('000', {
                translation: {
                    '0': {
                        pattern: /[0-9]/,
                        optional: true
                    }
                }
            });

            $('.once-only').submit(function() {
                $(".btn-submit").attr("disabled", true);
                setTimeout(() => {
                    $(".btn-submit").attr("disabled", false);
                }, 1000);
            });

            $('.date-picker').datepicker({
                format: "dd/mm/yyyy",
                autoclose: true,
                language: 'th-en',
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const submenuToggles = document.querySelectorAll('.dropdown-submenu > a');
            submenuToggles.forEach(function(toggle) {
                toggle.addEventListener('click', function(e) {
                    const parentLi = this.parentElement;
                    if (window.innerWidth < 992) {
                        e.preventDefault();
                        parentLi.classList.toggle('open');
                    }
                });
            });
        });
    </script>
    <script>
        // เรียก AOS ครั้งแรก
        AOS.init({
            once: false,
            duration: 800,
            easing: 'ease-in-out'
        });

        // modal แสดง → ลบ class animate
        $('.modal').on('shown.bs.modal', function() {
            $(this).find('[data-aos]').removeClass('aos-animate');
        });

        // modal ซ่อน → refresh AOS ใหม่
        $('.modal').on('hidden.bs.modal', function() {
            setTimeout(() => {
                AOS.refreshHard();
            }, 100);
        });
    </script>
    <?php $this->renderSection('scripts'); ?>
</body>

</html>