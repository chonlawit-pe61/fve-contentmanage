<?php $this->extend('template/users_layout') ?>

<?php $this->section('style'); ?>
<style>
    .news-page-bg {
        background-color: #f4f7f9;
    }

    .news-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 4rem 1rem;
    }

    .page-header {
        text-align: center;
        margin-bottom: 2rem;
    }

    .page-header h1 {
        font-size: 2.75rem;
        font-weight: 700;
        color: #1a253c;
    }

    .page-header p {
        font-size: 1.1rem;
        color: #6c757d;
        max-width: 600px;
        margin: 0.5rem auto 0;
    }

    /* ----- NEW: Filter Menu Styling ----- */
    .filter-menu {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 0.75rem;
        margin-bottom: 3rem;
    }

    .filter-btn {
        background-color: #fff;
        color: #4a5568;
        border: 1px solid #e2e8f0;
        padding: 0.6rem 1.2rem;
        border-radius: 50px;
        font-size: 0.9rem;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.2s ease-in-out;
    }

    .filter-btn:hover {
        background-color: #f7fafc;
        border-color: #cbd5e0;
    }

    .filter-btn.active {
        background-color: #4338ca;
        color: #fff;
        border-color: #4338ca;
        box-shadow: 0 4px 12px rgba(67, 56, 202, 0.2);
    }

    /* ----- Article Grid ----- */
    .article-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        gap: 2rem;
    }

    /* ----- Article Card Styling ----- */
    .article-card {
        background: #ffffff;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        overflow: hidden;
        display: flex;
        /* Changed from 'flex' */
        flex-direction: column;
        text-decoration: none;
        color: inherit;
        /* NEW: Transition for filtering */
        transition: transform 0.3s ease, box-shadow 0.3s ease, opacity 0.4s ease, visibility 0.4s ease;
        opacity: 1;
        visibility: visible;
    }

    /* NEW: Class for hidden cards */
    .article-card.is-hidden {
        opacity: 0;
        visibility: hidden;
        transform: scale(0.95);
        /* We use position absolute to make it disappear from the grid flow */
        position: absolute;
    }


    .article-card:hover {
        transform: translateY(-8px) scale(1.0);
        /* Adjust hover transform */
        box-shadow: 0 12px 25px rgba(0, 0, 0, 0.1);
    }

    .card-image-wrapper {
        width: 100%;
        height: 200px;
        overflow: hidden;
    }

    .card-image-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.4s ease;
    }

    .article-card:hover .card-image-wrapper img {
        transform: scale(1.05);
    }

    .card-content {
        padding: 1.5rem;
        display: flex;
        flex-direction: column;
        flex-grow: 1;
    }

    .card-category {
        display: inline-block;
        background-color: #eef2ff;
        color: #4338ca;
        padding: 0.25rem 0.75rem;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
        margin-bottom: 0.75rem;
        text-transform: uppercase;
    }

    .card-title {
        font-size: 1.25rem;
        font-weight: 600;
        color: #1a253c;
        margin-bottom: 0.5rem;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .card-excerpt {
        font-size: 0.95rem;
        color: #6c757d;
        line-height: 1.6;
        margin-bottom: 1rem;
        flex-grow: 1;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .card-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 0.85rem;
        color: #888;
        border-top: 1px solid #f0f0f0;
        padding-top: 1rem;
        margin-top: auto;
    }

    .read-more {
        color: #4338ca;
        font-weight: 600;
        text-decoration: none;
    }

    .read-more i {
        margin-left: 0.25rem;
        transition: transform 0.2s ease;
    }

    .article-card:hover .read-more i {
        transform: translateX(4px);
    }
</style>
<?php $this->endSection() ?>

<?php $this->section('content'); ?>
<div class="news-page-bg">
    <div class="news-container">

        <div class="page-header" data-aos="fade-up">
            <h1>ข่าวสารและกิจกรรม</h1>
            <p>ติดตามข่าวสารล่าสุด กิจกรรมต่างๆ และเรื่องราวความสำเร็จของเราได้ที่นี่</p>
        </div>

        <!-- NEW: Filter Menu -->
        <?php if (!empty($category)): ?>
            <div class="filter-menu" data-aos="fade-up" data-aos-delay="100">
                <a href="<?php echo base_url('news') ?>" class="filter-btn <?php echo @$_GET['category'] == '' ? 'active' : '' ?>">
                    ทั้งหมด
                </a>
                <?php foreach ($category as $row): ?>
                    <a href="<?php echo base_url('news?category=' . $row['id']) ?>" class="filter-btn <?php echo @$_GET['category'] == $row['id'] ? 'active' : '' ?>" data-filter="<?= esc($row['id'], 'attr') ?>">
                        <?= esc($row['name']) ?>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>


        <!-- Article Grid Wrapper for proper animation handling -->
        <div style="position: relative;">
            <div class="article-grid">
                <?php if (!empty($news)): ?>
                    <?php $i = 0; ?>
                    <?php foreach ($news as $row): ?>
                        <!-- ADDED data-category attribute -->
                        <a class="card" href="<?= base_url('News/detail/' . esc($row['id'], 'url')) ?>"
                            class="row-card"
                            data-category="<?= esc($row['category_id'], 'attr') ?>"
                            data-aos="fade-up" data-aos-delay="<?= $i * 50;
                                                                $i++; ?>">

                            <div class="card-image-wrapper">
                                <?php if (!empty($row['image_path']) && file_exists(ROOTPATH . $row['image_path'])): ?>
                                    <img src="<?= base_url($row['image_path']) ?>" alt="<?= esc($row['title']) ?>">
                                <?php else: ?>
                                    <img class="img-fluid" style="object-fit: contain;" src="<?php echo base_url('public/img/logo_cktc.png') ?>" alt="No Image Available">
                                <?php endif; ?>
                            </div>
                            <div class="card-content">
                                <span class="card-category"><?= esc($row['category_name']) ?></span>
                                <h3 class="card-title"><?= esc($row['title']) ?></h3>
                                <div class="card-footer">
                                    <span class="card-date">
                                        <i class="far fa-calendar-alt"></i>
                                        <?= date('d M Y', strtotime($row['create_at'])) ?>
                                    </span>
                                    <span class="read-more">
                                        อ่านต่อ <i class="ti ti-arrow-narrow-right"></i>
                                    </span>
                                </div>
                            </div>
                        </a>
                    <?php endforeach; ?>
                <?php else: ?>
                    <!-- Fallback message here -->
                <?php endif; ?>
            </div>
        </div>

    </div>
</div>
<?php $this->endSection() ?>

<?php $this->section('scripts'); ?>
<script>
    AOS.init({
        duration: 600,
        once: true,
        offset: 50,
    });

    // NEW: Filtering Logic
    document.addEventListener('DOMContentLoaded', function() {
        const filterMenu = document.querySelector('.filter-menu');
        if (!filterMenu) return;

        const filterButtons = filterMenu.querySelectorAll('.filter-btn');
        const articleCards = document.querySelectorAll('.article-card');
        const articleGrid = document.querySelector('.article-grid');

        filterMenu.addEventListener('click', function(e) {
            // Only run if a button is clicked
            if (!e.target.matches('.filter-btn')) {
                return;
            }

            // Remove active class from all buttons and add to the clicked one
            filterButtons.forEach(btn => btn.classList.remove('active'));
            e.target.classList.add('active');

            const filterValue = e.target.getAttribute('data-filter');

            // To prevent layout shift, we handle hiding and showing
            articleGrid.style.height = articleGrid.offsetHeight + 'px';

            // Hide all cards first
            articleCards.forEach(card => {
                card.classList.add('is-hidden');
            });

            // After a short delay to allow the fade-out animation, show the relevant cards
            setTimeout(() => {
                articleCards.forEach(card => {
                    const cardCategory = card.getAttribute('data-category');
                    if (filterValue === 'all' || filterValue === cardCategory) {
                        card.classList.remove('is-hidden');
                    }
                });
                // Reset grid height
                articleGrid.style.height = 'auto';
            }, 400); // This should match the CSS transition duration
        });
    });
</script>
<?php $this->endSection() ?>