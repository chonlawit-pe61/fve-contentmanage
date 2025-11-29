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
    :root {
        --vc-primary: #800000;
        --vc-primary-dark: #660000;
        --vc-primary-light: #a01a1a;
        --vc-gold: #FFD700;
        --vc-gold-hover: #FFC107;
        --vc-text-light: #ffffff;
        --vc-bg-light: #f1f6fc;
    }

    html, body {
        font-family: 'Kanit', sans-serif;
        background-color: var(--vc-bg-light);
        margin: 0;
        padding: 0;
    }

    /* Navbar & Header */
    .bg-maroon-gradient {
        background: linear-gradient(90deg, var(--vc-primary-dark) 0%, var(--vc-primary-light) 100%);
        color: var(--vc-text-light);
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
    }

    .navbar-brand-text h5 {
        font-weight: 700;
        letter-spacing: 0.5px;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
    }

    .navbar-brand-text p {
        font-size: 0.85rem;
        opacity: 0.9;
        letter-spacing: 0.5px;
    }

    .navbar-dark .navbar-nav .nav-link {
        color: rgba(255, 255, 255, 0.9);
        font-weight: 500;
        transition: all 0.3s ease;
        padding: 0.5rem 1rem;
    }

    .navbar-dark .navbar-nav .nav-link:hover,
    .navbar-dark .navbar-nav .nav-link.active {
        color: var(--vc-gold);
        background-color: rgba(255, 255, 255, 0.1);
        border-radius: 5px;
    }

    #navbarSupportedContent {
        background: transparent !important;
    }

    /* Dropdowns */
    .dropdown-menu {
        border: none;
        border-radius: 8px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        margin-top: 10px;
        padding: 0.5rem 0;
    }

    .dropdown-item {
        padding: 10px 20px;
        font-size: 0.95rem;
        font-weight: 400;
        color: #333;
        transition: all 0.2s;
        border-bottom: 1px solid #f0f0f0;
        position: relative;
    }

    .dropdown-item:last-child {
        border-bottom: none;
    }

    .dropdown-item:hover, .dropdown-item:focus {
        background-color: #f8f9fa;
        color: var(--vc-primary);
        border-left: 4px solid var(--vc-primary);
    }

    /* Nested Dropdowns */
    @media (min-width: 992px) {
        .dropdown-menu li {
            position: relative;
        }
        .dropdown-menu .dropdown-submenu {
            display: none;
            position: absolute;
            left: 100%;
            top: -5px;
            min-width: 200px;
            margin-left: 0;
            border-radius: 8px;
        }
        .dropdown-menu > li:hover > .dropdown-submenu {
            display: block;
        }
        
        /* Custom Arrow for Nested Dropdown */
        .dropend .dropdown-toggle::after {
            border: none !important;
            content: "\f054"; /* FontAwesome Chevron Right */
            font-family: "Font Awesome 5 Free";
            font-weight: 900;
            font-size: 0.8rem;
            color: var(--vc-primary);
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
        }
        .dropdown-item:hover .dropdown-toggle::after {
            color: var(--vc-primary);
        }
    }

    @media (max-width: 991.98px) {
        .dropdown-menu .dropdown-submenu {
            display: block;
            position: static;
            margin-left: 20px;
            box-shadow: none;
            border-left: 1px solid #ccc;
        }
        .dropdown-item:hover {
            border-left: unset;
        }
    }

    /* General Utilities */
    .bg_content { background-color: #FFFFFF; }
    .modal-backdrop { display: none; }
    body.modal-open { transform: none !important; overflow: auto !important; touch-action: auto !important; }
    
    hr {
        margin-top: 1rem;
        margin-bottom: 1rem;
        border: 0;
        border-top: 1px solid rgba(0, 0, 0, 1);
    }

    .bg-header-table {
        --bs-bg-opacity: 1;
        background-color: rgb(175, 57, 57) !important;
    }

    .bg-primary-subtle-new {
        background-color: rgb(209, 209, 209);
    }

    /* Footer Styles */
    .footer {
        background: linear-gradient(135deg, var(--vc-primary-dark) 0%, var(--vc-primary) 100%);
        color: #fff;
        padding: 60px 0 30px;
        font-family: "Sarabun", sans-serif;
        position: relative;
        overflow: hidden;
    }

    /* Subtle Pattern Overlay */
    .footer::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-image: radial-gradient(circle at 20% 50%, rgba(255, 215, 0, 0.05) 0%, transparent 50%);
        pointer-events: none;
    }

    .footer * { box-sizing: border-box; }

    .footer-container {
        display: grid;
        grid-template-columns: 1.5fr 1fr 1fr 1.2fr;
        gap: 40px;
        max-width: 1400px;
        margin: auto;
        padding: 0 20px;
        position: relative;
        z-index: 1;
    }

    .footer h2 {
        font-size: 1.5rem;
        font-weight: 700;
        margin: 0 0 5px;
        text-shadow: 1px 1px 2px rgba(0,0,0,0.3);
    }

    .footer p {
        font-size: 0.9rem;
        margin: 0;
        opacity: 0.8;
        letter-spacing: 0.5px;
    }

    .footer-col h3 {
        font-size: 1.1rem;
        font-weight: 600;
        margin-bottom: 20px;
        color: var(--vc-gold);
        text-transform: uppercase;
        letter-spacing: 1px;
        position: relative;
        padding-bottom: 10px;
    }
    
    .footer-col h3::after {
        content: "";
        position: absolute;
        left: 0;
        bottom: 0;
        width: 40px;
        height: 3px;
        background-color: var(--vc-gold);
        border-radius: 2px;
    }

    .footer-col ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .footer-col ul li {
        margin-bottom: 12px;
    }

    .footer-link {
        color: rgba(255, 255, 255, 0.85);
        text-decoration: none;
        transition: all 0.3s ease;
        display: inline-block;
        font-size: 0.95rem;
    }

    .footer-link:hover {
        color: var(--vc-gold);
        transform: translateX(5px);
    }

    .footer-logo {
        width: 100px;
        filter: drop-shadow(0 4px 6px rgba(0,0,0,0.3));
        transition: transform 0.3s;
    }
    
    .footer-logo:hover {
        transform: scale(1.05);
    }

    address {
        font-size: 0.9rem;
        line-height: 1.6;
        margin-top: 15px;
        color: rgba(255, 255, 255, 0.8);
        font-style: normal;
    }

    /* Social Icons */
    .social-links {
        display: flex;
        gap: 15px;
        margin-top: 20px;
    }

    .social-icon {
        width: 40px;
        height: 40px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        text-decoration: none;
        transition: all 0.3s ease;
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .social-icon:hover {
        background: var(--vc-gold);
        color: var(--vc-primary);
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.3);
    }

    /* Copyright Bar */
    .copyright-bar {
        margin-top: 50px;
        padding-top: 20px;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
        text-align: center;
        font-size: 0.85rem;
        color: rgba(255, 255, 255, 0.6);
    }

    /* Footer Responsive */
    @media (max-width: 1200px) {
        .footer-container {
            grid-template-columns: 1fr 1fr;
            gap: 40px;
        }
    }

    @media (max-width: 768px) {
        .footer-container {
            grid-template-columns: 1fr;
            gap: 30px;
        }
        .footer-col {
            text-align: center;
        }
        .footer-col h3::after {
            left: 50%;
            transform: translateX(-50%);
        }
        .social-links {
            justify-content: center;
        }
        .footer-logo {
            margin: 0 auto 15px;
            display: block;
        }
    }
    
    /* Legacy/Other Styles */
    .ve-section-title {
        color: var(--vc-gold-hover);
        font-size: 1.2rem;
        font-weight: bold;
        margin-bottom: 1rem;
    }

    .ve-list { list-style: none; padding-left: 0; }
    .ve-list li::before { content: "⦿ "; color: white; margin-right: 0.3rem; }
    
    .ve-footer {
        margin-top: 3rem;
        padding: 2rem 0;
        text-align: center;
        font-size: 0.9rem;
    }
    .ve-footer strong { display: block; font-size: 1.1rem; margin-top: 1rem; }
    .ve-footer a { color: var(--vc-gold); text-decoration: none; }
</style>






<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-maroon-gradient fixed-top shadow">
        <div class="container px-lg-4">
            <a class="navbar-brand d-flex align-items-center" href="<?php echo base_url() ?>">
                <img class="img-fluid me-2" style="height: 60px; filter: drop-shadow(0px 2px 2px rgba(0,0,0,0.3));" src="<?php echo base_url($information['image_path']) ?>" alt="Logo">
                <div class="navbar-brand-text text-white">
                    <h5 class="mb-0 text-white">วิทยาลัยเทคนิคเชียงคํา</h5>
                    <p class="mb-0 text-white" style="font-size: 0.85rem; opacity: 0.9;">ChiangKham Technical College</p>
                </div>
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link <?php echo (uri_string() == '') ? 'active' : ''; ?>" aria-current="page" href="<?php echo base_url('/') ?>">
                            หน้าแรก
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dataDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            ข้อมูลฯ
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dataDropdown">
                            <li><a class="dropdown-item" href="<?php echo base_url('/About/information_educational') ?>">ข้อมูลทั่วไปของสถานศึกษา</a></li>
                            <li><a class="dropdown-item" href="<?php echo base_url('/About/information_student') ?>">ข้อมูลนักเรียน</a></li>
                            <li><a class="dropdown-item" href="<?php echo base_url('/About/information_giftPolicy') ?>">นโยบายไม่รับของขวัญ</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            หน่วยงาน
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                            <li class="dropend">
                                <a class="dropdown-item dropdown-toggle" href="#">ฝ่ายบริหารทรัพยากร</a>
                                <ul class="dropdown-menu dropdown-submenu shadow">
                                    <?php if (!empty($org_4)) : foreach ($org_4 as $row) : ?>
                                            <li><a class="dropdown-item" href="<?php echo base_url('Organization/' . $row['id']) ?>"><?php echo $row['name'] ?></a></li>
                                    <?php endforeach;
                                    endif; ?>
                                </ul>
                            </li>

                            <li class="dropend">
                                <a class="dropdown-item dropdown-toggle" href="#">ฝ่ายแผนงานและความร่วมมือ</a>
                                <ul class="dropdown-menu dropdown-submenu shadow">
                                    <?php if (!empty($org_5)) : foreach ($org_5 as $row) : ?>
                                            <li><a class="dropdown-item" href="<?php echo base_url('Organization/' . $row['id']) ?>"><?php echo $row['name'] ?></a></li>
                                    <?php endforeach;
                                    endif; ?>
                                </ul>
                            </li>

                            <li class="dropend">
                                <a class="dropdown-item dropdown-toggle" href="#">ฝ่ายพัฒนากิจการนักศึกษา</a>
                                <ul class="dropdown-menu dropdown-submenu shadow">
                                    <?php if (!empty($org_6)) : foreach ($org_6 as $row) : ?>
                                            <li><a class="dropdown-item" href="<?php echo base_url('Organization/' . $row['id']) ?>"><?php echo $row['name'] ?></a></li>
                                    <?php endforeach;
                                    endif; ?>
                                </ul>
                            </li>

                            <li class="dropend">
                                <a class="dropdown-item dropdown-toggle" href="#">ฝ่ายวิชาการ</a>
                                <ul class="dropdown-menu dropdown-submenu shadow">
                                    <?php if (!empty($org_7)) : foreach ($org_7 as $row) : ?>
                                            <li><a class="dropdown-item" href="<?php echo base_url('Organization/' . $row['id']) ?>"><?php echo $row['name'] ?></a></li>
                                    <?php endforeach;
                                    endif; ?>
                                </ul>
                            </li>

                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('news') ?>">ข่าวสาร</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="docDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            เอกสาร
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="docDropdown">
                            <?php if (!empty($public_document)) : foreach ($public_document as $row) : ?>
                                    <li>
                                        <?php if (!empty($row['url'])) : ?>
                                            <a class="dropdown-item text-wrap" target="_blank" href="<?php echo $row['url'] ?>"><?= $row['title'] ?></a>
                                        <?php else : ?>
                                            <a class="dropdown-item text-wrap" href="<?php echo base_url('document?type=' . $row['id']) ?>"><?= $row['title'] ?></a>
                                        <?php endif; ?>
                                    </li>
                            <?php endforeach;
                            endif; ?>
                        </ul>
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
    
 
    <footer class="footer">
        <div class="footer-container">
            <!-- 1. Logo & Contact -->
            <div class="footer-col">
                <div class="d-flex align-items-center mb-3 justify-content-center justify-content-md-start">
                    <img src="<?php echo base_url('public/img/logo_cktc.png') ?>" alt="College Logo" class="footer-logo me-3" />
                    <div>
                        <h2 class="text-white">วิทยาลัยเทคนิคเชียงคำ</h2>
                        <p class="text-white-50">ChiangKham Technical College</p>
                    </div>
                </div>
                <address>
                    <?= $information['address'] ?><br>
                    199 Ban Nong Yao, Mae Soon Subdistrict,<br>
                    Fang District, Chiang Mai 50110, Thailand
                </address>
                
                <div class="social-links">
                    <a href="<?= $information['facebook'] ?>" target="_blank" class="social-icon">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="<?= $information['youtube'] ?>" target="_blank" class="social-icon">
                        <i class="fab fa-youtube"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fab fa-tiktok"></i>
                    </a>
                </div>
                
                <div class="mt-3 text-white-50 small">
                    <i class="fas fa-user text-warning me-2"></i>Online: <?= $logs['num'] ?>
                </div>
            </div>

            <!-- 2. Policies -->
            <div class="footer-col">
                <h3>นโยบายการให้บริการ</h3>
                <ul>
                    <li><a class="footer-link" href="<?php echo base_url('policy') ?>">นโยบายเว็บไซต์</a></li>
                    <li><a class="footer-link" href="<?php echo base_url('policy/securityPolicy') ?>">การรักษาปลอดภัยเว็บไซต์</a></li>
                    <li><a class="footer-link" href="<?php echo base_url('policy/privacyPolicy') ?>">การคุ้มครองข้อมูลส่วนบุคคล</a></li>
                    <li><a class="footer-link" href="<?php echo base_url('contact') ?>">ติดต่อเรา</a></li>
                </ul>
            </div>

            <!-- 3. Departments (Consolidated) -->
            <div class="footer-col">
                <h3>หน่วยงานภายใน</h3>
                <ul>
                    <li><a class="footer-link" href="#">ฝ่ายบริหารทรัพยากร</a></li>
                    <li><a class="footer-link" href="#">ฝ่ายแผนงานและความร่วมมือ</a></li>
                    <li><a class="footer-link" href="#">ฝ่ายพัฒนากิจการนักเรียน</a></li>
                    <li><a class="footer-link" href="#">ฝ่ายวิชาการ</a></li>
                </ul>
            </div>

            <!-- 4. Courses -->
            <div class="footer-col">
                <h3>หลักสูตรที่เปิดสอน</h3>
                <ul>
                    <?php if (!empty($course)) : foreach ($course as $row) : ?>
                        <li>
                            <a class="footer-link" href="<?php echo base_url('Course/detail/' . $row['id']) ?>">
                                <?= $row['name'] ?>
                            </a>
                        </li>
                    <?php endforeach; endif; ?>
                </ul>
            </div>
        </div>

        <div class="copyright-bar container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start">
                    &copy; <?= date('Y') ?> ChiangKham Technical College. All Rights Reserved.
                </div>
                <div class="col-md-6 text-center text-md-end">
                    Designed & Developed by IT Department
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