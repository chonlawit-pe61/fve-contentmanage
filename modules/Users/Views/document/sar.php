<?php $this->extend('template/users_layout') ?>

<?php $this->section('style'); ?>
<style>
    /* Premium Red & Gold Theme Variables */
    :root {
        --sar-primary: #800000;
        --sar-primary-dark: #4a0000;
        --sar-gold: #d4af37;
        --sar-gold-light: #f3e5ab;
    }

    .sar-page-container {
        padding-bottom: 60px;
    }

    /* --- Modern Banner Section --- */
    .sar-banner-modern {
        background: linear-gradient(135deg, var(--sar-primary) 0%, var(--sar-primary-dark) 100%);
        border-radius: 25px;
        padding: 60px 30px;
        text-align: center;
        color: white;
        box-shadow: 0 20px 50px rgba(128, 0, 0, 0.25);
        position: relative;
        overflow: hidden;
        margin-bottom: 50px;
        isolation: isolate;
    }

    /* Animated background effect */
    .sar-banner-modern::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255, 255, 255, 0.08) 0%, transparent 60%);
        animation: rotate-bg 25s linear infinite;
        z-index: -1;
    }

    @keyframes rotate-bg {
        from {
            transform: rotate(0deg);
        }

        to {
            transform: rotate(360deg);
        }
    }

    .sar-logo {
        height: 130px;
        margin-bottom: 25px;
        filter: drop-shadow(0 10px 20px rgba(0, 0, 0, 0.3));
        transition: transform 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .sar-logo:hover {
        transform: scale(1.1) rotate(2deg);
    }

    .sar-title {
        font-size: 2.8rem;
        font-weight: 800;
        margin-bottom: 15px;
        text-transform: uppercase;
        letter-spacing: 2px;
        text-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        background: linear-gradient(to right, #fff, var(--sar-gold-light), #fff);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-size: 200% auto;
        animation: shine 5s linear infinite;
    }

    @keyframes shine {
        to {
            background-position: 200% center;
        }
    }

    .sar-subtitle {
        font-size: 1.4rem;
        font-weight: 500;
        color: rgba(255, 255, 255, 0.95);
        letter-spacing: 1px;
    }

    /* --- Document Grid System --- */
    .doc-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 30px;
        padding: 0 10px;
    }

    /* --- Document Card Component --- */
    .doc-card {
        background: white;
        border-radius: 20px;
        padding: 35px 25px;
        text-align: center;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        border: 1px solid rgba(0, 0, 0, 0.04);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-between;
        height: 100%;
        position: relative;
        overflow: hidden;
        text-decoration: none !important;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
    }

    /* Hover Lift & Shadow */
    .doc-card:hover {
        transform: translateY(-12px);
        box-shadow: 0 25px 50px rgba(128, 0, 0, 0.15);
        border-color: rgba(128, 0, 0, 0.1);
    }

    /* Bottom Gold Line Animation */
    .doc-card::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 5px;
        background: linear-gradient(90deg, var(--sar-primary), var(--sar-gold));
        transform: scaleX(0);
        transition: transform 0.4s ease;
        transform-origin: left;
    }

    .doc-card:hover::after {
        transform: scaleX(1);
    }

    /* Icon Styling */
    .doc-icon-wrapper {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        background: rgba(128, 0, 0, 0.05);
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 25px;
        transition: all 0.4s ease;
    }

    .doc-card:hover .doc-icon-wrapper {
        background: var(--sar-primary);
        transform: scale(1.1) rotate(-5deg);
    }

    .doc-icon {
        font-size: 2.5rem;
        color: var(--sar-primary);
        transition: all 0.4s ease;
    }

    .doc-card:hover .doc-icon {
        color: var(--sar-gold);
    }

    /* Title Styling */
    .doc-title {
        font-size: 1.15rem;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 25px;
        line-height: 1.6;
        transition: color 0.3s;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        flex-grow: 1;
    }

    .doc-card:hover .doc-title {
        color: var(--sar-primary);
    }

    /* Download Button Styling */
    .doc-btn {
        padding: 10px 30px;
        background: white;
        color: var(--sar-primary);
        border-radius: 50px;
        font-size: 0.9rem;
        font-weight: 700;
        transition: all 0.3s;
        border: 2px solid var(--sar-primary);
        display: inline-flex;
        align-items: center;
        gap: 8px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .doc-btn i {
        transition: transform 0.3s;
    }

    .doc-card:hover .doc-btn {
        background: var(--sar-primary);
        color: white;
        box-shadow: 0 5px 15px rgba(128, 0, 0, 0.3);
    }

    .doc-card:hover .doc-btn i {
        transform: translateY(2px);
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .sar-title {
            font-size: 1.8rem;
        }

        .sar-subtitle {
            font-size: 1.1rem;
        }

        .sar-banner-modern {
            padding: 40px 20px;
        }

        .sar-logo {
            height: 100px;
        }

        .doc-grid {
            grid-template-columns: 1fr;
        }
    }
</style>
<?php $this->endSection() ?>

<?php $this->section('content'); ?>
<div data-aos="fade-up" class="bg_content sar-page-container">
    <div class="container">
        <!-- Page Header (Optional, kept for structure but visually replacing with new banner) -->
        <div class="py-4"></div>

        <div class="row w-100 m-0">
            <!-- Modern Banner -->
            <div class="col-lg-12">
                <div class="sar-banner-modern mt-5">
                    <img class="sar-logo img-fluid" src="<?php echo base_url('public/img/logofve_t.png') ?>" alt="Logo">
                    <div class="title-wrapper">
                        <div class="sar-title"><?php echo $publicDocument['title'] ?></div>
                        <div class="sar-subtitle">วิทยาลัยเทคนิคเชียงคํา</div>
                    </div>
                </div>
            </div>

            <!-- Documents Grid -->
            <div class="col-lg-12">
                <div class="doc-grid">
                    <?php if (!empty($documentFile)): ?>
                        <?php foreach ($documentFile as $index => $row): ?>
                            <a href="<?php echo base_url($row['file_path']) ?>"
                                download
                                class="doc-card"
                                data-aos="fade-up"
                                data-aos-delay="<?php echo ($index * 100) % 800; // Staggered delay 
                                                ?>">

                                <div class="doc-icon-wrapper">
                                    <!-- Changed to a file icon instead of just cloud download for main visual -->
                                    <i class="fa fa-file-text-o doc-icon"></i>
                                </div>

                                <div class="doc-title"><?php echo $row['title'] ?></div>

                                <div class="doc-btn">
                                    ดาวน์โหลด <i class="fa fa-download"></i>
                                </div>
                            </a>
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
    // No extra scripts needed for this pure CSS implementation
</script>
<?php $this->endSection() ?>