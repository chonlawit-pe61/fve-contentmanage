<?php $this->extend('template/users_layout') ?>

<?php $this->section('style'); ?>
<style>
    /* --- Modern Editorial Theme --- */
    body {
        background-color: #f9f9f9;
        font-family: 'Sarabun', sans-serif;
    }

    .editorial-container {
        max-width: 1200px;
        margin: 3rem auto;
        padding: 0 1.5rem;
        display: grid;
        grid-template-columns: 1fr;
        /* Main Content + Sidebar */
        gap: 3rem;
    }

    /* Main Content Column */
    .main-content {
        background: #fff;
        padding: 3rem;
        border-radius: 12px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.03);
    }

    /* Header */
    .article-header {
        margin-bottom: 2.5rem;
        border-bottom: 1px solid #eee;
        padding-bottom: 2rem;
    }

    .category-badge {
        display: inline-block;
        background-color: var(--vc-gold);
        color: #fff;
        font-size: 0.85rem;
        font-weight: 700;
        text-transform: uppercase;
        padding: 4px 12px;
        border-radius: 4px;
        margin-bottom: 1rem;
        letter-spacing: 0.5px;
    }

    .article-title {
        font-size: 2.5rem;
        font-weight: 800;
        color: #1a1a1a;
        line-height: 1.3;
        margin-bottom: 1.2rem;
    }

    .article-meta {
        display: flex;
        align-items: center;
        color: #666;
        font-size: 0.95rem;
        gap: 20px;
    }

    .article-meta i {
        color: var(--vc-primary);
        margin-right: 6px;
    }

    /* Hero Image */
    .hero-image-wrapper {
        margin-bottom: 3rem;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
    }

    .article-hero-image {
        width: 100%;
        height: auto;
        display: block;
        transition: transform 0.5s ease;
    }

    .hero-image-wrapper:hover .article-hero-image {
        transform: scale(1.02);
    }

    /* Typography */
    .article-body {
        font-size: 1.15rem;
        line-height: 1.8;
        color: #2d2d2d;
    }

    .article-body p {
        margin-bottom: 1.8rem;
    }

    /* Lead Paragraph */
    .article-body>p:first-of-type {
        font-size: 1.35rem;
        font-weight: 500;
        color: #000;
        line-height: 1.6;
        margin-bottom: 2.5rem;
    }

    /* Drop Cap */
    .article-body>p:first-of-type::first-letter {
        float: left;
        font-size: 3.5rem;
        line-height: 0.8;
        font-weight: 800;
        color: var(--vc-primary);
        margin-right: 12px;
        margin-top: 6px;
    }

    .article-body h2 {
        font-size: 1.8rem;
        font-weight: 700;
        color: #1a1a1a;
        margin-top: 3rem;
        margin-bottom: 1.5rem;
        padding-left: 15px;
        border-left: 4px solid var(--vc-gold);
    }

    .article-body blockquote {
        font-size: 1.4rem;
        font-style: italic;
        color: #444;
        text-align: center;
        margin: 3rem 0;
        padding: 2rem;
        background: #fcfcfc;
        border-top: 2px solid var(--vc-gold);
        border-bottom: 2px solid var(--vc-gold);
    }

    /* Attachments */
    .attachments-box {
        background: #f8f9fa;
        border: 1px solid #e9ecef;
        border-radius: 8px;
        padding: 1.5rem;
        margin-top: 4rem;
    }

    .attachments-box h4 {
        font-size: 1.1rem;
        font-weight: 700;
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
    }

    .download-item {
        display: flex;
        align-items: center;
        background: #fff;
        padding: 1rem;
        border: 1px solid #dee2e6;
        border-radius: 6px;
        text-decoration: none;
        transition: all 0.2s;
    }

    .download-item:hover {
        border-color: var(--vc-primary);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
    }

    .dl-icon {
        font-size: 1.8rem;
        color: #dc3545;
        margin-right: 1rem;
    }

    .dl-info span {
        display: block;
        font-weight: 600;
        color: #333;
    }

    .dl-info small {
        color: #888;
    }

    /* Sidebar */
    .sidebar {
        position: sticky;
        top: 2rem;
        height: fit-content;
    }

    .sidebar-widget {
        background: #fff;
        padding: 1.5rem;
        border-radius: 12px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.03);
        margin-bottom: 2rem;
    }

    .sidebar-title {
        font-size: 1.1rem;
        font-weight: 700;
        color: #1a1a1a;
        margin-bottom: 1.2rem;
        padding-bottom: 0.5rem;
        border-bottom: 2px solid var(--vc-gold);
    }

    /* Share Buttons */
    .share-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 10px;
    }

    .share-btn {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 10px;
        border-radius: 6px;
        color: #fff;
        text-decoration: none;
        font-size: 0.9rem;
        font-weight: 600;
        transition: opacity 0.2s;
    }

    .share-btn:hover {
        opacity: 0.9;
        color: #fff;
    }

    .share-fb {
        background: #1877f2;
    }

    .share-line {
        background: #00c300;
    }

    .share-tw {
        background: #1da1f2;
    }

    .share-link {
        background: #6c757d;
    }

    .share-btn i {
        margin-right: 6px;
    }

    /* Back Button */
    .back-nav {
        margin-bottom: 2rem;
    }

    .back-link {
        display: inline-flex;
        align-items: center;
        color: #666;
        text-decoration: none;
        font-weight: 600;
        transition: color 0.2s;
    }

    .back-link:hover {
        color: var(--vc-primary);
    }

    .back-link i {
        margin-right: 8px;
    }

    @media (max-width: 992px) {
        .editorial-container {
            grid-template-columns: 1fr;
            gap: 2rem;
        }

        .sidebar {
            position: static;
        }

        .article-title {
            font-size: 2rem;
        }
    }
</style>
<?php $this->endSection() ?>

<?php $this->section('content'); ?>

<div class="editorial-container">

    <!-- Main Content -->
    <main class="main-content" data-aos="fade-up">

        <!-- Back Nav (Mobile Only) -->
        <div class="back-nav d-lg-none">
            <a href="<?= base_url('/') ?>" class="back-link">
                <i class="ti ti-arrow-left"></i> กลับไปหน้ารวมข่าวสาร
            </a>
        </div>

        <header class="article-header">

            <h1 class="article-title"><?= esc($reward['title']) ?></h1>

            <div class="article-meta">
                <span><i class="far fa-calendar-alt"></i> <?= date('d F Y', strtotime($reward['create_at'])) ?></span>
                <!-- Add Author if available -->
                <span><i class="far fa-user"></i> ประชาสัมพันธ์</span>
            </div>
        </header>

        <!-- Hero Image -->
        <?php
        $heroImage = base_url('public/img/logo.jpeg'); // Default
        if (!empty($reward['image_path']) && file_exists(ROOTPATH . $reward['image_path'])) {
            $heroImage = base_url($reward['image_path']);
        }
        ?>
        <div class="hero-image-wrapper">
            <img src="<?= $heroImage ?>" alt="<?= esc($reward['title']) ?>" class="article-hero-image" style="width: 100%; height: auto; object-fit: cover;">
        </div>

        <div class="article-body">
            <?= $reward['description'] ?>
        </div>


    </main>



</div>

<?php $this->endSection() ?>

<?php $this->section('scripts'); ?>
<script>
    AOS.init({
        duration: 800,
        once: true,
        offset: 50
    });
</script>
<?php $this->endSection() ?>