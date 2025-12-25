<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ระบบจัดการเว็บไซต์</title>
    <link rel="icon" href="<?= base_url('public/img/logo_nbg.png') ?>" type="image/icon type">

    <link rel="stylesheet" href="<?php echo base_url('public/assets/css/styles.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('public/assets/css/myStyles.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('public/js/DatepickerThai/css/datepicker.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('public/css/dataTables.dataTables.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('public/css/font-awesome_4.7/css/font-awesome.min.css') ?>">

    <link rel="stylesheet" href="<?php echo base_url('public/css/jqueryBracket/jquery.bracket.min.css') ?>">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('public/css/kanit.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('public/css/select2.min.css') ?>" />
    <link rel="stylesheet" href="<?php echo base_url('public/css/cropper.min.css') ?>" />
</head>
<?php $this->renderSection('style'); ?>

<?php
$url = uri_string();
$control = explode('/', $url);
// print_r($control);die;
?>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-center">
                    <a href="<?= base_url('admin/dashboard') ?>" class="text-nowrap logo-img">
                        <img src="<?= base_url('public/img/logo_nbg.png') ?>" width="80" class="img-fluid my-2" alt="" />
                    </a>
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-8"></i>
                    </div>
                </div>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                    <ul id="sidebarnav">

                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">เมนูหลัก</span>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link <?= ($control[0] == "admin" && $control[1] == "dashboard") ? "active" : "" ?>" href="<?= base_url('admin/dashboard'); ?>" aria-expanded="false">
                                <span class="d-flex">
                                    <i class="ti ti-dashboard"></i>
                                </span>
                                <span class="hide-menu">แดชบอร์ด</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?= base_url('admin/information') ?>" aria-expanded="false">
                                <span class="d-flex">
                                    <i class="ti ti-database"></i>
                                </span>
                                <span class="hide-menu">ข้อมูลทั่วไป</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link <?= ($control[0] == "admin" && $control[1] == "information_about_personel") ? "active" : "" ?>" href="<?= base_url('admin/information/information_about_personel') ?>" aria-expanded="false">
                                <span class="d-flex">
                                    <i class="ti ti-users"></i>
                                </span>
                                <span class="hide-menu">ข้อมูลครูและบุคลากรฯ</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link <?= ($control[0] == "admin" && $control[1] == "information_about_money") ? "active" : "" ?>" href="<?= base_url('admin/information/information_about_money') ?>" aria-expanded="false">
                                <span class="d-flex">
                                    <i class="ti ti-users"></i>
                                </span>
                                <span class="hide-menu">ข้อมูลงบประมาณ</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link <?= ($control[0] == "admin" && $control[1] == "information_about_successful") ? "active" : "" ?>" href="<?= base_url('admin/information/information_about_successful') ?>" aria-expanded="false">
                                <span class="d-flex">
                                    <i class="ti ti-users"></i>
                                </span>
                                <span class="hide-menu">ข้อมูลรางวัลความสำเร็จ</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link <?= ($control[0] == "admin" && $control[1] == "information_about_regulations") ? "active" : "" ?>" href="<?= base_url('admin/information/information_about_regulations') ?>" aria-expanded="false">
                                <span class="d-flex">
                                    <i class="ti ti-users"></i>
                                </span>
                                <span class="hide-menu">ข้อมูลระเบียบวิทยาลัย</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link <?= ($control[0] == "admin" && $control[1] == "information_about_team") ? "active" : "" ?>" href="<?= base_url('admin/information/information_about_team') ?>" aria-expanded="false">
                                <span class="d-flex">
                                    <i class="ti ti-users"></i>
                                </span>
                                <span class="hide-menu">ข้อมูลโครงสร้างบริหาร</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link <?= ($control[0] == "admin" && $control[1] == "information_about_course") ? "active" : "" ?>" href="<?= base_url('admin/information/information_about_course') ?>" aria-expanded="false">
                                <span class="d-flex">
                                    <i class="ti ti-users"></i>
                                </span>
                                <span class="hide-menu">ข้อมูลหลักสูตร</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link <?= ($control[0] == "admin" && $control[1] == "information_about_equipment") ? "active" : "" ?>" href="<?= base_url('admin/information/information_about_equipment') ?>" aria-expanded="false">
                                <span class="d-flex">
                                    <i class="ti ti-users"></i>
                                </span>
                                <span class="hide-menu">ข้อมูลครุภัณฑ์</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link <?= ($control[0] == "admin" && $control[1] == "information_about_map") ? "active" : "" ?>" href="<?= base_url('admin/information/information_about_map') ?>" aria-expanded="false">
                                <span class="d-flex">
                                    <i class="ti ti-users"></i>
                                </span>
                                <span class="hide-menu">แผนผังภายในวิทยาลัย</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link <?= ($control[0] == "admin" && $control[1] == "publish_educational_development") ? "active" : "" ?>" href="<?= base_url('admin/publish/publish_educational_development') ?>" aria-expanded="false">
                                <span class="d-flex">
                                    <i class="ti ti-users"></i>
                                </span>
                                <span class="hide-menu">แผนพัฒนาสถานศึกษา</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link <?= ($control[0] == "admin" && $control[1] == "publish_year") ? "active" : "" ?>" href="<?= base_url('admin/publish/publish_year') ?>" aria-expanded="false">
                                <span class="d-flex">
                                    <i class="ti ti-calendar"></i>
                                </span>
                                <span class="hide-menu">แผนปฏิบัติการประจำปี</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link <?= ($control[0] == "admin" && $control[1] == "sar") ? "active" : "" ?>" href="<?= base_url('admin/publish/publish_sar') ?>" aria-expanded="false">
                                <span class="d-flex">
                                    <i class="ti ti-users"></i>
                                </span>
                                <span class="hide-menu">รายงานการประเมินตนเอง</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link <?= ($control[0] == "admin" && $control[1] == "sar") ? "active" : "" ?>" href="<?= base_url('admin/publish/publish_external_quality_report') ?>" aria-expanded="false">
                                <span class="d-flex">
                                    <i class="ti ti-users"></i>
                                </span>
                                <span class="hide-menu">รายงานการประเมินคุณภาพภายนอก</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link <?= ($control[0] == "admin" && $control[1] == "sar") ? "active" : "" ?>" href="<?= base_url('admin/publish/publish_summary_report') ?>" aria-expanded="false">
                                <span class="d-flex">
                                    <i class="ti ti-users"></i>
                                </span>
                                <span class="hide-menu">สรุปรายงานผลแผนปฏิบัติการประจำปี</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link <?= ($control[0] == "admin" && $control[1] == "publish_repository") ? "active" : "" ?>" href="<?= base_url('admin/publish/publish_repository') ?>" aria-expanded="false">
                                <span class="d-flex">
                                    <i class="ti ti-users"></i>
                                </span>
                                <span class="hide-menu">แบบฟรอม พัสดุ และการเงิน</span>
                            </a>
                        </li>





                        <li class="sidebar-item">
                            <a class="sidebar-link <?= ($control[0] == "admin" && $control[1] == "slide") ? "active" : "" ?>" href="<?= base_url('admin/slide') ?>" aria-expanded="false">
                                <span class="d-flex">
                                    <i class="ti ti-slideshow"></i>
                                </span>
                                <span class="hide-menu">ภาพสไลด์โปรโมท</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link <?= ($control[0] == "admin" && $control[1] == "course") ? "active" : "" ?>" href="<?= base_url('admin/course') ?>" aria-expanded="false">
                                <span class="d-flex">
                                    <i class="ti ti-book-upload"></i>
                                </span>
                                <span class="hide-menu">หลักสูตร</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link <?= ($control[0] == "admin" && $control[1] == "organization") ? "active" : "" ?>" href="<?= base_url('admin/organization') ?>" aria-expanded="false">
                                <span class="d-flex">
                                    <i class="ti ti-sitemap"></i>
                                </span>
                                <span class="hide-menu">โครงสร้างองค์กร</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link <?= ($control[0] == "admin" && $control[1] == "member") ? "active" : "" ?>" href=" <?= base_url('admin/member') ?>">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-users"></i>
                                </div>
                                <span class="hide-menu">บุคลากร</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link <?= ($control[0] == "admin" && $control[1] == "news") ? "active" : "" ?>" href="<?= base_url('admin/news'); ?>">
                                <span class="d-flex">
                                    <i class="ti ti-news"></i>
                                </span>
                                <span class="hide-menu">ข่าวสาร</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link <?= ($control[0] == "admin" && $control[1] == "reward") ? "active" : "" ?>" href="<?= base_url('admin/reward'); ?>" aria-expanded="false">
                                <span class="d-flex">
                                    <i class="ti ti-trophy"></i>
                                </span>
                                <span class="hide-menu">รางวัลความสำเร็จ</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link <?= ($control[0] == "admin" && $control[1] == "law") ? "active" : "" ?>" href="<?= base_url('admin/law'); ?>" aria-expanded="false">
                                <span class="d-flex">
                                    <i class="ti ti-gavel"></i>
                                </span>
                                <span class="hide-menu">กฏหมายที่เกี่ยวข้อง</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link <?= ($control[0] == "admin" && $control[1] == "ita") ? "active" : "" ?>" href="<?= base_url('admin/ita'); ?>" aria-expanded="false">
                                <span class="d-flex">
                                    <i class="ti ti-search"></i>
                                </span>
                                <span class="hide-menu">ITA: ประจำปี</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?= base_url('admin/Document'); ?>" aria-expanded="false">
                                <span class="d-flex">
                                    <i class="ti ti-folder-minus"></i>
                                </span>
                                <span class="hide-menu">เอกสาร</span>
                            </a>
                        </li>
                        <?php
                        if (@$_SESSION['per']['Manage_users']['action_view'] >= 1) {
                        ?>
                            <li class="sidebar-item ">
                                <a class="sidebar-link <?= ($control[0] == "admin" && $control[1] == "Users") ? "active" : "" ?>" href="<?= base_url('admin/Users'); ?>" aria-expanded="false">
                                    <span class="d-flex">
                                        <i class="ti ti-settings-2"></i>
                                    </span>
                                    <span class="hide-menu">จัดการผู้ใช้งาน</span>
                                </a>
                            </li>
                        <?php
                        }
                        ?>
                        <?php
                        if (@$_SESSION['per']['Manage_users']['action_view'] >= 1) {
                        ?>
                            <li class="sidebar-item ">
                                <a class="sidebar-link <?= ($control[0] == "Link" && $control[1] == "Users") ? "active" : "" ?>" href="<?= base_url('admin/Link'); ?>" aria-expanded="false">
                                    <span class="d-flex">
                                        <i class="fa fa-link" style="font-size: 21px;"></i>
                                    </span>
                                    <span class="hide-menu">Link </span>
                                </a>
                            </li>
                        <?php
                        }
                        ?>

                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">ตั้งค่านโยบาบการบริการ</span>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?= base_url('admin/configs/website?content_name=นโยบายเว็บไซต์'); ?>" aria-expanded="false">
                                <span class="d-flex">
                                    <i class="ti ti-settings-2"></i>
                                </span>
                                <span class="hide-menu">นโยบายเว็บไซต์</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?= base_url('admin/configs/website?content_name=การรักษาปลอดภัยเว็บไซต์'); ?>" aria-expanded="false">
                                <span class="d-flex">
                                    <i class="ti ti-settings-2"></i>
                                </span>
                                <span class="hide-menu">การรักษาปลอดภัยเว็บไซต์</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?= base_url('admin/configs/website?content_name=การคุ้มครองข้อมูลส่วนบุคคล'); ?>" aria-expanded="false">
                                <span class="d-flex">
                                    <i class="ti ti-settings-2"></i>
                                </span>
                                <span class="hide-menu">การคุ้มครองข้อมูลส่วนบุคคล</span>
                            </a>
                        </li>

                        <!-- <li class="sidebar-item">
                            <a class="sidebar-link" href="<?= base_url('admin/configs/website?content_name=การปฏิเสธความรับผิด'); ?>" aria-expanded="false">
                                <span class="d-flex">
                                    <i class="ti ti-settings-2"></i>
                                </span>
                                <span class="hide-menu">การปฏิเสธความรับผิด</span>
                            </a>
                        </li> -->
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?= base_url('admin/configs/website?content_name=นโยบายไม่รับของขวัญและของกำนัลทุกชนิด'); ?>" aria-expanded="false">
                                <span class="d-flex">
                                    <i class="ti ti-settings-2"></i>
                                </span>
                                <span class="hide-menu">นโยบายไม่รับของขวัญและของกำนัลทุกชนิด</span>
                            </a>
                        </li>


                        <li class="sidebar-item ">
                            <a class="sidebar-link <?= ($control[0] == "admin" && $control[1] == "Alert") ? "active" : "" ?>" href="<?= base_url('admin/Alert'); ?>" aria-expanded="false">
                                <span class="d-flex">
                                    <i class="ti ti-bell-plus"></i>
                                </span>
                                <span class="hide-menu">ประกาศ</span>
                            </a>
                        </li>

                        <!-- <li class="sidebar-item">
                            <a class="sidebar-link" href="<?= base_url('admin/logout') ?>" aria-expanded="false">
                                <span>
                                    <i class="ti ti-logout"></i>
                                </span>
                                <span class="hide-menu">ออกจากระบบ</span>
                            </a>
                        </li> -->

                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
            <div class="fixed-profile p-3 mx-4 mb-2 bg-secondary-subtle rounded mt-3">
                <div class="hstack gap-3">
                    <div class="john-img">
                        <img src="<?= base_url('public/img/blank-member.jpg') ?>" class="rounded-circle" width="40" height="40" alt="modernize-img">
                    </div>
                    <div class="john-title">
                        <h6 class="mb-0 fs-4 fw-semibold">Administrator</h6>
                        <!-- <span class="fs-2">Designer</span> -->
                    </div>
                    <a href="<?= base_url('admin/logout') ?>" class="border-0 bg-transparent text-primary ms-auto" tabindex="0" type="button" aria-label="logout" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="logout">
                        <i class="ti ti-power fs-6"></i>
                    </a>
                </div>
            </div>
        </aside>
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            <header class="app-header">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <ul class="navbar-nav">
                        <li class="nav-item d-block d-xl-none">
                            <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                                <i class="ti ti-menu-2"></i>
                            </a>
                        </li>
                    </ul>
                </nav>
            </header>
            <!--  Header End -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <?php if (session()->getFlashdata('msg')) { ?>
                            <div class="alert alert-<?= session()->getFlashdata('msg')['status'] ?>" role="alert">
                                <?= session()->getFlashdata('msg')['msg'] ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <?php $this->renderSection('content'); ?>
            </div>
        </div>
    </div>
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

    <script src="<?php echo base_url('public/js/highcharts/highcharts.js') ?>"></script>
    <script src="<?php echo base_url('public/js/highcharts/modules/exporting.js') ?> "></script>
    <script src="<?php echo base_url('public/js/highcharts/modules/export-data.js') ?> "></script>
    <script src="<?php echo base_url('public/js/highcharts/modules/accessibility.js') ?> "></script>

    <script src="<?= base_url('public/assets/libraries/ckeditor/ckeditor.js') ?>"></script>
    <script src="<?= base_url('public/assets/libraries/ckeditor/adapters/jquery.js') ?>"></script>

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

        Highcharts.setOptions({
            lang: {
                thousandsSep: ',',
                viewFullscreen: 'แสดงแผนภูมิเต็มจอ',
                printChart: 'พิมพ์แผนภูมิ',
                downloadCSV: 'ดาวน์โหลดไฟล์ .CSV',
                downloadJPEG: 'ดาวน์โหลดไฟล์ .JPEG',
                downloadPDF: 'ดาวน์โหลดไฟล์ .PDF',
                downloadPNG: 'ดาวน์โหลดไฟล์ .PNG',
                downloadXLS: 'ดาวน์โหลดไฟล์ .XLS',
                downloadSVG: 'ดาวน์โหลดไฟล์ .SVG',
                viewData: 'แสดงตารางข้อมูล',
                hideData: 'ซ่อนตารางข้อมูล',
            },
            credits: false,
        });

        $(document).ready(function() {
            $('.phone-input').mask('000-000-0000');
            $('.number-2-digit').mask('00', {
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
            $('.numberic').mask('#,##0', {
                reverse: true
            })

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
    <?php $this->renderSection('scripts'); ?>
</body>

</html>