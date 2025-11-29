<?php $this->extend('template/users_layout') ?>

<?php $this->section('style'); ?>
<style>
    .article-page-bg {
        background-color: #ffffff;
    }

    .article-container {
        max-width: 800px;
        margin: 0 auto;
        padding: 4rem 1rem;
    }

    .article-header {
        margin-bottom: 2rem;
    }

    .back-to-news {
        display: inline-block;
        color: #6c757d;
        text-decoration: none;
        margin-bottom: 1.5rem;
        font-weight: 500;
        transition: color 0.2s ease;
    }

    .back-to-news:hover {
        color: #1a253c;
    }

    .back-to-news i {
        margin-right: 0.5rem;
    }

    .article-category {
        display: inline-block;
        background-color: #eef2ff;
        color: #4338ca;
        padding: 0.3rem 0.8rem;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
        text-transform: uppercase;
        margin-bottom: 1rem;
    }

    .article-title {
        font-size: 2.8rem;
        font-weight: 700;
        color: #1a253c;
        line-height: 1.2;
        margin-bottom: 1rem;
    }

    .article-meta {
        font-size: 0.9rem;
        color: #6c757d;
    }

    .article-meta i {
        margin-right: 0.5rem;
    }

    .article-hero-image {
        width: 100%;
        max-height: 450px;
        object-fit: cover;
        border-radius: 12px;
        margin-bottom: 2.5rem;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }

    .article-body {
        font-size: 1.1rem;
        line-height: 1.8;
        color: #343a40;
    }

    .article-body p {
        margin-bottom: 1.5rem;
    }

    .article-body h2 {
        font-size: 1.8rem;
        font-weight: 600;
        margin-top: 2.5rem;
        margin-bottom: 1rem;
        color: #1a253c;
    }

    .article-body h3 {
        font-size: 1.5rem;
        font-weight: 600;
        margin-top: 2rem;
        margin-bottom: 1rem;
        color: #1a253c;
    }

    .article-body blockquote {
        border-left: 4px solid #4338ca;
        padding-left: 1.5rem;
        margin: 2rem 0;
        font-style: italic;
        color: #6c757d;
    }

    .article-body ul {
        padding-left: 1.5rem;
        margin-bottom: 1.5rem;
    }

    /* --- NEW: Attachment Section Styles --- */
    .article-attachments {
        margin-top: 3rem;
        padding: 1.5rem;
        background-color: #f8f9fa;
        border: 1px solid #e9ecef;
        border-radius: 8px;
    }

    .article-attachments h4 {
        font-size: 1.2rem;
        font-weight: 600;
        color: #343a40;
        margin-top: 0;
        margin-bottom: 1rem;
    }

    .attachment-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .attachment-item {
        display: flex;
        align-items: center;
        padding: 0.75rem 0;
        border-bottom: 1px solid #e9ecef;
    }

    .attachment-item:last-child {
        border-bottom: none;
    }

    .attachment-item .icon {
        font-size: 1.5rem;
        color: #6c757d;
        margin-right: 1rem;
        width: 25px;
        text-align: center;
    }

    .attachment-item .details {
        flex-grow: 1;
    }

    .attachment-item .filename {
        color: #0d6efd;
        text-decoration: none;
        font-weight: 500;
    }

    .attachment-item .filename:hover {
        text-decoration: underline;
    }

    .attachment-item .filesize {
        font-size: 0.85rem;
        color: #6c757d;
    }

    /* --- End of Attachment Styles --- */

    .article-footer {
        margin-top: 3rem;
        padding-top: 2rem;
        border-top: 1px solid #e2e8f0;
    }

    .social-share h4 {
        font-size: 1rem;
        font-weight: 600;
        color: #4a5568;
        margin-bottom: 1rem;
    }

    .share-buttons a {
        display: inline-block;
        color: #fff;
        padding: 0.6rem;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        text-align: center;
        margin-right: 0.5rem;
        font-size: 1rem;
        line-height: 1.4;
        transition: opacity 0.2s ease;
    }

    .share-buttons a:hover {
        opacity: 0.85;
    }

    .share-facebook {
        background-color: #1877F2;
    }

    .share-twitter {
        background-color: #1DA1F2;
    }

    .share-line {
        background-color: #00B900;
    }

    .related-articles {
        margin-top: 4rem;
    }

    .related-articles h3 {
        font-size: 1.8rem;
        font-weight: 600;
        color: #1a253c;
        margin-bottom: 2rem;
        text-align: center;
    }

    .related-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 1.5rem;
    }
</style>
<?php $this->endSection() ?>

<?php $this->section('content'); ?>
<div class="article-page-bg">
    <div class="article-container" data-aos="fade-up">


        <header class="article-header">
            <a href="<?= base_url('news') ?>" class="back-to-news">
                <i class="ti ti-arrow-big-left"></i> กลับไปหน้ารวมข่าวสาร
            </a>

            <?php if (!empty($news['category_name'])): ?>
                <div class="article-category"><?= esc($news['category_name']) ?></div>
            <?php endif; ?>

            <h1 class="article-title"><?= esc($news['title']) ?></h1>

            <div class="article-meta">
                <span>
                    <i class="far fa-calendar-alt"></i> เผยแพร่เมื่อ:
                    <?= date('d F Y', strtotime($news['create_at'])) ?>
                </span>
            </div>
        </header>

        <?php if (!empty($news['image_path']) && file_exists(ROOTPATH . $news['image_path'])) { ?>
            <img style="object-fit: contain;" src="<?= base_url($news['image_path']) ?>" alt="<?= esc($news['title']) ?>" class="article-hero-image">
        <?php } else {
        ?>
            <img style="object-fit: contain;" src="<?php echo base_url('public/img/logo.jpeg') ?>" alt="<?= esc($news['title']) ?>" class="article-hero-image">
        <?php
        } ?>

        <div class="article-body">
            <?= $news['description'] ?>
        </div>

        <!-- --- NEW: Attachment Section --- -->
        <?php if (!empty($news['document_path'])): ?>
            <div class="article-attachments">
                <h4><i class="ti ti-file-description"></i> ไฟล์แนบ</h4>
                <ul class="attachment-list">
                    <li class="attachment-item">
                        <div class="icon"><i class="ti ti-folder"></i></div>
                        <div class="details">
                            <a href="<?= base_url($news['document_path']) ?>" download class="filename">
                                <?= esc($news['document_name']) ?>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        <?php endif; ?>
    </div>


</div>
<?php $this->endSection() ?>

<?php $this->section('scripts'); ?>
<script>
    AOS.init({
        duration: 800,
        once: true,
        offset: 100
    });
</script>
<?php $this->endSection() ?>