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
$CourseModel = new CourseModel();
$DocumentModel = new DocumentModel();

$org_4 = $OrganizationModel->getOrganizationList(4);
$org_5 = $OrganizationModel->getOrganizationList(5);
$org_6 = $OrganizationModel->getOrganizationList(6);
$org_7 = $OrganizationModel->getOrganizationList(7);

$AboutModel = new AboutModel();
$information = $AboutModel->getInformationEducational();

$public_document = $DocumentModel->getPublicDocument();
$course_type = $CourseModel->getCourseType();
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>วิทยาลัยการอาชีพฝาง</title>
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

    /* Premium Red & Gold Navbar Styles - v2 (Refined) */
    .header_bg {
        background: #800000;
        /* Deep Royal Red */
        background: linear-gradient(90deg, #800000 0%, #990000 100%);
        border-bottom: 1px solid rgba(212, 175, 55, 0.3);
        /* Subtle Gold Border */
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.2);
    }

    .navbar-brand h5 {
        color: #FFFFFF;
        font-weight: 600;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
    }

    .navbar-brand p {
        color: #E5C100;
        /* Muted Gold */
        font-size: 0.85rem;
        font-weight: 400;
        margin-top: -2px;
        letter-spacing: 0.5px;
    }

    .navbar-nav .nav-link {
        color: rgba(255, 255, 255, 0.85) !important;
        font-weight: 400;
        font-size: 1rem;
        padding: 0.5rem 1.2rem;
        transition: all 0.3s ease;
    }

    /* Hover & Active State - No Underline, Just Color & Glow */
    .navbar-nav .nav-link:hover,
    .navbar-nav .nav-link.active,
    .navbar-nav .show>.nav-link {
        color: #FFD700 !important;
        /* Bright Gold */
        text-shadow: 0 0 10px rgba(255, 215, 0, 0.3);
        transform: translateY(-1px);
    }

    /* Dropdown Menu */
    .dropdown-menu {
        background-color: #ffffff;
        border: none;
        border-top: 3px solid #B8860B;
        /* Dark Goldenrod */
        border-radius: 0 0 6px 6px;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        padding: 0.5rem 0;
        margin-top: 10px;
        /* Slight gap */
    }

    /* Dropdown Triangle/Arrow */


    .dropdown-item {
        color: #333;
        padding: 0.6rem 1.5rem;
        font-weight: 400;
        font-size: 0.95rem;
        transition: all 0.2s ease;
        white-space: normal;
    }



    @media (min-width: 992px) {
        .px-lg-5 {
            padding-right: 3rem !important;
            padding-left: 3rem !important;
        }


    }

    @media (min-width: 992px) and (max-width: 1400px) {
        .container_navbar {
            max-width: 1120px !important;
        }
    }

    .dropdown-item:hover,
    .dropdown-item:focus {
        background-color: #FFF8E1;
        /* Very Light Gold */
        color: #800000;
        padding-left: 1.8rem;
        /* Slide effect */
        font-weight: 500;
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
            width: 225px;
        }
    }

    /* บังคับให้ลูกศรแสดงด้านขวา */
    .dropend>.dropdown-toggle::after {
        float: right;
        margin-left: 0.255em;
        vertical-align: 0.255em;
        content: "\25b6";
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

        .dropdown-menu {
            width: auto !important;
            min-width: auto !important;
        }

        .dropdown-item {
            white-space: normal !important;
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
        <div class="container px-lg-5 container_navbar">
            <a class="navbar-brand" href="<?php echo base_url() ?>">
                <div class="d-flex align-middle">
                    <img class="img-fluid" style="height: 70px;" src="<?php echo base_url('public/img/logofve_t.png') ?>" alt="">
                    <h5 class="my-auto mx-1">
                        วิทยาลัยการอาชีพฝาง
                        <p class="mb-0">Fang Industrial and Community Education College</p>
                    </h5>
                </div>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 fw-light">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?php echo base_url('/') ?>">หน้าแรก</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dataDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            ข้อมูลฯ
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dataDropdown">
                            <li class="dropdown-submenu dropend">
                                <a class="dropdown-item dropdown-toggle ms-auto" href="#" data-bs-toggle="dropdown">ข้อมูลพื้นฐาน 9 ประเภท</a>
                                <ul class="dropdown-menu">
                                    <a class="dropdown-item" href="<?php echo base_url('/About/information_educational') ?>">
                                        ข้อมูลทั่วไปของสถานศึกษา
                                    </a>
                                    <a class="dropdown-item" href="<?php echo base_url('/About/information_student') ?>">
                                        ข้อมูลนักเรียน
                                    </a>
                                    <a class="dropdown-item" href="<?php echo base_url('/About/information_about_personel') ?>">
                                        ข้อมูลครูและบุคลากรฯ
                                    </a>
                                    <a class="dropdown-item" href="<?php echo base_url('/About/information_about_money') ?>">
                                        ข้อมูลงบประมาณฯ
                                    </a>
                                </ul>
                            </li>
                            <li>
                                <a class="dropdown-item" href="<?php echo base_url('/About/information_about_manage') ?>">ผู้บริหารงานศึกษา</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="<?php echo base_url('/About/information_about_manage') ?>">โครงสร้างการบริหาร</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="<?php echo base_url('/About/information_law') ?>">กฎหมายที่เกี่ยวข้อง</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="">ระเบียบวิทยาลัยการอาชีพฝาง</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="<?php echo base_url('/About/information_giftPolicy') ?>">นโยบายไม่รับของขวัญ</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="">ความภาคภูมิใจ</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="<?php echo base_url('/About/information_about_successful') ?>">รางวัลความสำเร็จ</a>
                            </li>



                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            แผนกวิชา
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php
                            if (!empty($course_type)) {
                                foreach ($course_type as $row) {
                            ?>
                                    <li class="dropdown-submenu dropend">
                                        <a class="dropdown-item dropdown-toggle ms-auto" href="#" data-bs-toggle="dropdown"><?= $row['name'] ?></a>
                                        <?php
                                        $course_level1 = $CourseModel->getCourse(0, $row['id']);
                                        $course_level2 = [];
                                        foreach ($course_level1 as $course) {
                                            $temp = $CourseModel->getCourse($course['id'], $row['id']);
                                            $course_level2 = array_merge($course_level2, $temp);
                                        }

                                        if (!empty($course_level2)) { ?>
                                            <ul class="dropdown-menu">
                                                <?php
                                                foreach ($course_level2 as $child) {
                                                ?>

                                                    <li><a class="dropdown-item" href="<?= base_url('Course/detail/' . $child['id']) ?>"><?php echo $child['name'] ?></a></li>
                                                <?php
                                                }
                                                ?>
                                            </ul>
                                        <?php
                                        }
                                        ?>
                                    </li>
                            <?php
                                }
                            }
                            ?>

                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('news') ?>">ข่าวสาร</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dataDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                        <a class="nav-link" href="<?php echo base_url('contact') ?>">ITA<?= date("Y") ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('contact') ?>">ติดต่อเรา</a>
                    </li>


                </ul>
            </div>
        </div>
    </nav>
    <div class="" style="padding-top: 85px;">
        <?php $this->renderSection('content'); ?>
    </div>
    <style>
        /* --- Standard Clean Footer --- */
        .footer-clean {
            background-color: #990000;
            /* Brighter, Standard Red */
            color: #ffffff;
            font-family: 'Kanit', sans-serif;
            padding-top: 60px;
            padding-bottom: 20px;
            font-weight: 300;
        }

        .footer-clean h5 {
            color: #FFD700;
            /* Gold */
            font-weight: 500;
            margin-bottom: 20px;
            font-size: 1.1rem;
            text-transform: uppercase;
        }

        /* Brand */
        .footer-brand {
            margin-bottom: 20px;
        }

        .footer-brand img {
            width: 60px;
            margin-bottom: 15px;
        }

        .footer-brand h4 {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .footer-brand span {
            font-size: 0.85rem;
            opacity: 0.8;
            display: block;
            margin-bottom: 20px;
        }

        /* Links List */
        .clean-links {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .clean-links li {
            margin-bottom: 10px;
        }

        .clean-links a {
            color: rgba(255, 255, 255, 0.9);
            text-decoration: none;
            font-size: 0.95rem;
            transition: color 0.2s;
        }

        .clean-links a:hover {
            color: #FFD700;
            text-decoration: underline;
        }

        /* Contact */
        .footer-contact p {
            margin-bottom: 10px;
            font-size: 0.95rem;
            display: flex;
            align-items: flex-start;
        }

        .footer-contact i {
            margin-right: 10px;
            margin-top: 5px;
            color: #FFD700;
        }

        /* Socials */
        .social-clean {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }

        .social-clean a {
            width: 35px;
            height: 35px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            text-decoration: none;
            transition: background 0.3s;
        }

        .social-clean a:hover {
            background: #FFD700;
            color: #990000;
        }

        /* Copyright */
        .copyright-clean {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            margin-top: 40px;
            padding-top: 20px;
            text-align: center;
            font-size: 0.85rem;
            opacity: 0.7;
        }

        /* Back to Top */
        .back-to-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 50px;
            height: 50px;
            background: #FFD700;
            color: #990000;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            z-index: 999;
            text-decoration: none;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s;
        }

        .back-to-top.show {
            opacity: 1;
            visibility: visible;
        }

        .back-to-top:hover {
            background: #fff;
            color: #990000;
            transform: translateY(-5px);
        }
    </style>

    <footer class="footer-clean">
        <div class="container">
            <div class="row">
                <!-- Col 1: Brand -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="footer-brand">
                        <img src="<?php echo base_url('public/img/logofve_t.png') ?>" alt="Logo">
                        <h4 style="color: #FFD700;">วิทยาลัยการอาชีพฝาง</h4>
                        <span style="color: #FFD700;">Fang Industrial and Community Education College</span>
                    </div>
                    <div class="social-clean">
                        <a href="<?= $information['facebook'] ?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <a href="<?= $information['youtube'] ?>" target="_blank"><i class="fab fa-youtube"></i></a>
                        <a href="#"><i class="fab fa-tiktok"></i></a>
                    </div>
                </div>

                <!-- Col 2: Quick Links -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <h5>เมนูหลัก & นโยบาย</h5>
                    <div class="row">
                        <div class="col-6">
                            <ul class="clean-links">
                                <li><a href="<?php echo base_url('/') ?>">หน้าแรก</a></li>
                                <li><a href="<?php echo base_url('news') ?>">ข่าวสาร</a></li>
                                <li><a href="<?php echo base_url('contact') ?>">ติดต่อเรา</a></li>
                            </ul>
                        </div>
                        <div class="col-6">
                            <ul class="clean-links">
                                <li><a href="<?php echo base_url('policy') ?>">นโยบายเว็บไซต์</a></li>
                                <li><a href="<?php echo base_url('policy/securityPolicy') ?>">ความปลอดภัย</a></li>
                                <li><a href="<?php echo base_url('policy/privacyPolicy') ?>">ข้อมูลส่วนบุคคล</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Col 3: Contact -->
                <div class="col-lg-4 col-md-12 mb-4">
                    <h5>ข้อมูลติดต่อ</h5>
                    <div class="footer-contact">
                        <p>
                            <i class="fas fa-map-marker-alt"></i>
                            <span>
                                <?= $information['address'] ?><br>
                                199 Ban Nong Yao, Mae Sun Subdistrict,<br>
                                Fang District, Chiang Mai Province, Mae Son Mae Sun, Fang District, Chiang Mai 50110
                            </span>
                        </p>
                        <!-- Add Phone/Email if needed -->
                    </div>
                </div>
            </div>

            <div class="copyright-clean w-100">
                &copy; <?php echo date('Y'); ?> Fang Industrial and Community Education College.
            </div>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <a href="#" class="back-to-top" id="backToTop"><i class="fas fa-arrow-up"></i></a>

    <script>
        // Back to Top Script
        window.addEventListener('scroll', function() {
            var backToTop = document.getElementById('backToTop');
            if (window.scrollY > 300) {
                backToTop.classList.add('show');
            } else {
                backToTop.classList.remove('show');
            }
        });

        document.getElementById('backToTop').addEventListener('click', function(e) {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    </script>
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