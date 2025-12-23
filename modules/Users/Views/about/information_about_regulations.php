<?php $this->extend('template/users_layout') ?>

<?php $this->section('style'); ?>
<style>
    /* --- Premium Red & Gold Theme --- */
    .wave-header {
        background: linear-gradient(135deg, #800000 0%, #a00000 100%);
        padding: 60px 0 100px;
        position: relative;
        overflow: hidden;
        border-bottom: 3px solid #ffd700;
    }

    .wave-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><circle cx="2" cy="2" r="2" fill="rgba(255, 215, 0, 0.1)"/></svg>');
        opacity: 0.3;
    }

    .contact-title {
        font-family: 'Kanit', sans-serif;
        font-weight: 700;
        letter-spacing: 1px;
    }

    /* Card & Table Styling */
    .custom-table-container {
        background: #fff;
        border-radius: 20px;
        padding: 30px;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.08);
        margin-top: -60px;
        position: relative;
        z-index: 5;
        border: 1px solid rgba(0, 0, 0, 0.02);
    }

    .table {
        border-collapse: separate;
        border-spacing: 0 12px;
        margin-top: 10px;
    }

    .table thead th {
        border: none;
        color: #800000;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.9rem;
        padding: 15px;
        border-bottom: 2px solid #f0f0f0;
    }

    .table tbody tr {
        background-color: #ffffff;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.02);
        border-radius: 12px;
    }

    .table tbody tr td {
        background-color: #fff;
        border-top: 1px solid #f9f9f9;
        border-bottom: 1px solid #f9f9f9;
        vertical-align: middle;
        padding: 18px 15px;
    }

    .table tbody tr td:first-child,
    .table tbody tr th:first-child {
        border-radius: 12px 0 0 12px;
        border-left: 1px solid #f9f9f9;
    }

    .table tbody tr td:last-child {
        border-radius: 0 12px 12px 0;
        border-right: 1px solid #f9f9f9;
    }

    .table tbody tr:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(128, 0, 0, 0.1);
        z-index: 2;
        position: relative;
    }

    .table tbody tr:hover td {
        background-color: #fffbfc;
        border-top-color: rgba(128, 0, 0, 0.05);
        border-bottom-color: rgba(128, 0, 0, 0.05);
    }

    /* Elements */
    .year-badge {
        background: linear-gradient(45deg, #ffd700, #ffc107);
        color: #800000;
        padding: 6px 15px;
        border-radius: 50px;
        font-weight: 600;
        font-size: 0.85rem;
        box-shadow: 0 2px 5px rgba(255, 215, 0, 0.3);
    }

    .btn-view-file {
        background: linear-gradient(45deg, #800000, #a00000);
        color: #fff !important;
        padding: 8px 25px;
        border-radius: 50px;
        text-decoration: none;
        font-size: 0.9rem;
        font-weight: 500;
        transition: all 0.3s ease;
        border: 1px solid rgba(255, 255, 255, 0.1);
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .btn-view-file:hover {
        background: linear-gradient(45deg, #a00000, #c00000);
        box-shadow: 0 5px 15px rgba(128, 0, 0, 0.3);
        transform: translateY(-2px);
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button.current,
    .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
        background: #800000 !important;
        color: white !important;
        border: none;
        border-radius: 50%;
    }

    .dataTables_wrapper .dataTables_filter input {
        border: 1px solid #ddd;
        border-radius: 20px;
        padding: 5px 15px;
        outline: none;
    }

    .dataTables_wrapper .dataTables_filter input:focus {
        border-color: #800000;
        box-shadow: 0 0 0 2px rgba(128, 0, 0, 0.1);
    }
</style>
<?php $this->endSection() ?>

<?php $this->section('content'); ?>
<div data-aos="fade-up" class="bg_content">
    <div class="wave-header">
        <div class="header-content text-center" data-aos="zoom-in">
            <h1 class="contact-title" style="color: white; text-shadow: 2px 2px 4px rgba(0,0,0,0.3); font-size: 2.5rem; margin-bottom: 10px;">
                ระเบียบวิทยาลัยการอาชีพฝาง
            </h1>
            <h4 class="mb-4" style="color: #ffd700; font-weight: 300;">วิทยาลัยการอาชีพฝาง</h4>
            <div class="d-inline-block px-4 py-2" style="background: rgba(255,255,255,0.1); border-radius: 50px; backdrop-filter: blur(5px);">
                <p class="contact-subtitle text-white-50 mb-0">
                    <i class="far fa-calendar-alt me-2 text-warning"></i>อัปเดตข้อมูลล่าสุดเมื่อ: <?php echo date('d F Y'); ?>
                </p>
            </div>
        </div>
    </div>

    <div class="container justify-content-center">
        <div class="custom-table-container mb-5 w-100">
            <div class="table-responsive">
                <table class="table" id="personnelTable">
                    <thead>
                        <tr>
                            <th width="10%" class="text-center">ลำดับ</th>
                            <th class="text-center" width="15%">ปีงบประมาณ</th>
                            <th>ชื่อเอกสาร / รายละเอียด</th>
                            <th width="15%" class="text-center">เครื่องมือ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($information_regulations)): ?>
                            <?php foreach ($information_regulations as $key => $value): ?>
                                <tr>
                                    <th class="text-center">
                                        <span class="text-dark "><?= sprintf("%02d", $key + 1) ?></span>
                                    </th>
                                    <td class="text-center">
                                        <span class="year-badge"><?= $value['data_year'] + 543 ?></span>
                                    </td>
                                    <td>
                                        <div class="fw-bold text-dark mb-1" style="font-size: 1.05rem;"><?= $value['information_regulations_file_name'] ?></div>

                                    </td>
                                    <td class="text-center">
                                        <a href="<?= base_url($value['information_regulations_file']) ?>"
                                            target="_blank"
                                            class="btn-view-file">
                                            <i class="fas fa-eye"></i> ดูไฟล์
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        $('#personnelTable').DataTable({
            language: dtLanguage, // Use global variable from valid layout if available
            responsive: true,
            order: [
                [0, 'asc']
            ], // Default sort by sequence
            pageLength: 25,
            dom: '<"d-flex justify-content-between align-items-center mb-4"f>t<"d-flex justify-content-between align-items-center mt-3"ip>',
        });
    });
</script>
<?php $this->endSection() ?>