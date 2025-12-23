<?php $this->extend('template/users_layout') ?>

<?php $this->section('style'); ?>
<!-- Import Sarabun Font -->
<link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;500;700&display=swap" rel="stylesheet">
<!-- Import FontAwesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />

<style>
    :root {
        --primary: #870100;
        --accent: #D4AF37;
        --bg-color: #f9f9f9;
        --card-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
    }

    .bg_content {
        background-color: var(--bg-color);
        font-family: 'Sarabun', sans-serif;
        padding-bottom: 60px;
        min-height: 100vh;
        width: 100%;
        display: block;
        /* Ensure block formatting context */
    }

    /* Header Section */
    .header-container {
        width: 100%;
        padding: 40px 0;
        text-align: center;
        margin-bottom: 20px;
        display: block;
    }

    .page-heading {
        color: var(--primary);
        font-weight: 800;
        font-size: 2.5rem;
        margin-bottom: 10px;
        text-transform: uppercase;
        position: relative;
        display: inline-block;
    }


    .page-subheading {
        color: #777;
        font-size: 1.1rem;
    }

    /* Content Section */
    .content-container {
        width: 100%;
        max-width: 1200px;
        margin: 0 auto;
        display: block;
    }

    /* Card Styling */
    .law-card {
        background: #fff;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: var(--card-shadow);
        margin-bottom: 30px;
        border: 1px solid rgba(0, 0, 0, 0.03);
    }

    .law-card-header {
        background: linear-gradient(135deg, #a00d0d 0%, #750606 100%);
        padding: 15px 25px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-left: 5px solid var(--accent);
    }

    .law-card-title {
        color: #fff;
        font-size: 1.4rem;
        font-weight: 700;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .law-card-badge {
        background: rgba(255, 255, 255, 0.2);
        color: #fff;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 0.85rem;
        white-space: nowrap;
    }

    /* List Container */
    .law-items-wrapper {
        padding: 0;
        margin: 0;
    }

    /* List Item Row */
    .law-row {
        display: flex;
        /* Flexbox for row content */
        align-items: center;
        padding: 20px 25px;
        border-bottom: 1px solid #f0f0f0;
        transition: background 0.2s;
        gap: 20px;
    }

    .law-row:last-child {
        border-bottom: none;
    }

    .law-row:hover {
        background: #fffdfd;
    }

    /* Columns inside row */
    .col-icon {
        flex: 0 0 50px;
        text-align: center;
        font-size: 1.8rem;
        color: #e74c3c;
    }

    .col-details {
        flex: 1;
        /* Take remaining space */
    }

    .col-action {
        flex: 0 0 auto;
    }

    .file-title {
        font-size: 1.1rem;
        font-weight: 600;
        color: #333;
        margin-bottom: 4px;
        line-height: 1.3;
        display: block;
    }

    .file-index {
        font-size: 0.85rem;
        color: #999;
    }

    /* Button */
    .btn-dl {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 8px 18px;
        background: #fff;
        color: var(--primary);
        border: 1px solid var(--primary);
        border-radius: 6px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s;
        font-size: 0.95rem;
    }

    .btn-dl:hover {
        background: var(--primary);
        color: #fff;
        transform: translateY(-2px);
        box-shadow: 0 4px 10px rgba(135, 1, 0, 0.2);
    }

    /* Mobile Responsive */
    @media (max-width: 768px) {
        .law-row {
            flex-direction: column;
            align-items: flex-start;
            gap: 15px;
        }

        .col-icon {
            font-size: 1.5rem;
            flex: 0 0 auto;
            margin-bottom: 5px;
        }

        .col-action {
            width: 100%;
        }

        .btn-dl {
            width: 100%;
            justify-content: center;
        }
    }
</style>
<?php $this->endSection() ?>
<?php $this->section('content'); ?>

<!-- Main Wrapper -->
<div class="bg_content">

    <!-- Title Section -->
    <div class="header-container mt-4" data-aos="fade-down">
        <div class="container" style="display: unset;">
            <h1 class="page-heading">กฎหมายและระเบียบที่เกี่ยวข้อง</h1>
            <p class="page-subheading">วิทยาลัยการอาชีพฝาง</p>
        </div>
    </div>

    <!-- Content Section -->
    <div class="content-container">
        <div class="container px-4" style="display: unset;">

            <div class="row">
                <div class="col-12"> <!-- STRICT Full Width Column -->

                    <?php if (!empty($law_types)): ?>
                        <?php foreach ($law_types as $index => $row): ?>

                            <!-- Card Component -->
                            <div class="law-card" data-aos="fade-up" data-aos-delay="<?= $index * 100 ?>">

                                <!-- Card Header -->
                                <div class="law-card-header">
                                    <h3 class="law-card-title">
                                        <i class="fa-solid fa-scale-balanced"></i>
                                        <?= $row['name'] ?>
                                    </h3>
                                    <?php $count = !empty($file_laws[$row['id']]) ? count($file_laws[$row['id']]) : 0; ?>
                                    <span class="law-card-badge"><?= $count ?> รายการ</span>
                                </div>

                                <!-- Card List -->
                                <div class="law-items-wrapper">

                                    <?php if (!empty($file_laws[$row['id']])): ?>
                                        <?php foreach ($file_laws[$row['id']] as $key => $file): ?>

                                            <!-- List Item -->
                                            <div class="law-row">

                                                <!-- Icon -->
                                                <div class="col-icon">
                                                    <i class="fa-regular fa-file-pdf"></i>
                                                </div>

                                                <!-- Details -->
                                                <div class="col-details">
                                                    <span class="file-title"><?= $file['title'] ?></span>
                                                </div>

                                                <!-- Button -->
                                                <div class="col-action">
                                                    <a href="<?= base_url($file['file_path']) ?>" target="_blank" class="btn-dl">
                                                        <i class="fa-solid fa-download"></i> ดาวน์โหลด
                                                    </a>
                                                </div>

                                            </div>

                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <div class="p-5 text-center text-muted">
                                            <i class="fa-solid fa-folder-open mb-3" style="font-size: 2.5rem; opacity: 0.3;"></i>
                                            <p>ไม่มีเอกสารในหมวดหมู่นี้</p>
                                        </div>
                                    <?php endif; ?>

                                </div>
                            </div>
                            <!-- End Card -->

                        <?php endforeach; ?>
                    <?php endif; ?>

                </div>
            </div>

        </div>
    </div>

</div>

<?php $this->endSection() ?>
<?php $this->section('scripts'); ?>
<script>
    // No scripts needed
</script>
<?php $this->endSection() ?>