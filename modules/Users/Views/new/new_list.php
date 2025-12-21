<?php $this->extend('template/users_layout') ?>

<?php $this->section('style'); ?>
<style>
    /* --- Magazine Style Layout --- */
    .news-page-bg {
        background-color: #f9fafb;
    }

    /* Dynamic Hero Section */
    .news-hero {
        position: relative;
        height: 400px;
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 4rem;
        border-radius: 0 0 50px 50px;
        /* Unique shape */
        overflow: hidden;
    }

    .news-hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(to bottom, rgba(26, 37, 60, 0.8), rgba(128, 0, 0, 0.8));
        /* Dark Blue to Red */
        z-index: 1;
    }

    .news-hero-content {
        position: relative;
        z-index: 2;
        text-align: center;
        color: #fff;
        padding: 0 20px;
        max-width: 800px;
    }

    .news-hero h1 {
        font-size: 3.5rem;
        font-weight: 800;
        margin-bottom: 1rem;
        text-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        letter-spacing: -1px;
    }

    .news-hero p {
        font-size: 1.25rem;
        font-weight: 300;
        opacity: 0.9;
        margin-bottom: 2rem;
    }

    .news-container {
        max-width: 1200px;
        margin: -80px auto 0;
        /* Overlap the hero */
        padding: 0 20px 4rem;
        position: relative;
        z-index: 3;
    }

    /* Filter Menu (Floating) */
    .filter-menu {
        background: #fff;
        padding: 15px 20px;
        border-radius: 50px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        display: inline-flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 10px;
        margin-bottom: 3rem;
        position: relative;
        left: 40%;
        transform: translateX(-50%);
    }

    .filter-btn {
        background: transparent;
        color: #666;
        border: none;
        padding: 0.6rem 1.5rem;
        border-radius: 30px;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .filter-btn:hover {
        color: var(--vc-primary);
        background: rgba(128, 0, 0, 0.05);
    }

    .filter-btn.active {
        background: var(--vc-primary);
        color: #fff;
        box-shadow: 0 4px 15px rgba(128, 0, 0, 0.3);
    }

    /* Article Grid */
    .article-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(340px, 1fr));
        gap: 2.5rem;
    }

    /* --- Magazine Card Styling --- */
    .article-card {
        background: #fff;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.06);
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        display: flex;
        flex-direction: column;
        text-decoration: none;
        color: inherit;
        position: relative;
        border: 1px solid rgba(0, 0, 0, 0.03);
    }

    .article-card.is-hidden {
        display: none;
        /* Simple hide for now */
    }

    .article-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.12);
    }

    .card-image-wrapper {
        height: 240px;
        overflow: hidden;
        position: relative;
    }

    .card-image-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s ease;
    }

    .article-card:hover .card-image-wrapper img {
        transform: scale(1.1);
    }

    /* Category Badge (Floating on Image) */
    .card-category {
        position: absolute;
        top: 20px;
        right: 20px;
        background: rgba(255, 255, 255, 0.95);
        color: var(--vc-primary);
        padding: 6px 16px;
        border-radius: 30px;
        font-size: 0.8rem;
        font-weight: 700;
        text-transform: uppercase;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        z-index: 2;
        backdrop-filter: blur(5px);
    }

    .card-content {
        padding: 25px;
        display: flex;
        flex-direction: column;
        flex-grow: 1;
    }

    /* Date Line */
    .card-date {
        font-size: 0.85rem;
        color: #999;
        margin-bottom: 10px;
        display: flex;
        align-items: center;
        font-weight: 500;
    }

    .card-date i {
        color: var(--vc-gold);
        margin-right: 8px;
    }

    .card-title {
        font-size: 1.4rem;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 12px;
        line-height: 1.4;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        transition: color 0.3s;
    }

    .article-card:hover .card-title {
        color: var(--vc-primary);
    }

    .card-excerpt {
        font-size: 1rem;
        color: #666;
        line-height: 1.7;
        margin-bottom: 20px;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    /* Read More Button */
    .card-footer {
        margin-top: auto;
    }

    .read-more-btn {
        display: inline-flex;
        align-items: center;
        color: var(--vc-primary);
        font-weight: 700;
        font-size: 0.95rem;
        transition: all 0.3s;
    }

    .read-more-btn i {
        margin-left: 8px;
        background: rgba(128, 0, 0, 0.1);
        width: 30px;
        height: 30px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s;
    }

    .article-card:hover .read-more-btn i {
        background: var(--vc-primary);
        color: #fff;
        transform: translateX(5px);
    }
</style>
<?php $this->endSection() ?>

<?php $this->section('content'); ?>
<div class="news-page-bg">

    <!-- Hero Section -->
    <?php
    // Use the first news item image as hero background if available, else default
    $heroBg = base_url('public/img/bg-people.jpg');
    if (!empty($news) && !empty($news[0]['image_path']) && file_exists(ROOTPATH . $news[0]['image_path'])) {
        $heroBg = base_url($news[0]['image_path']);
    }
    ?>
    <div class="news-hero" style="background-image: url('<?= $heroBg ?>');">
        <div class="news-hero-content" data-aos="fade-up">
            <h1 class="text-white">ข่าวสารและกิจกรรม</h1>
            <p>ติดตามความเคลื่อนไหว กิจกรรมเด่น และเรื่องราวความสำเร็จของชาววิทยาลัยการอาชีพฝาง</p>
        </div>
    </div>

    <div class="news-container">

        <!-- Filter Menu -->
        <?php if (!empty($category)): ?>
            <div class="filter-menu" data-aos="fade-up" data-aos-delay="100">
                <a href="<?php echo base_url('news') ?>" class="filter-btn text-dark <?php echo @$_GET['category'] == '' ? 'active' : '' ?>">
                    ทั้งหมด
                </a>
                <?php foreach ($category as $row): ?>
                    <a href="<?php echo base_url('news?category=' . $row['id']) ?>" class="filter-btn text-dark <?php echo @$_GET['category'] == $row['id'] ? 'active' : '' ?>" data-filter="<?= esc($row['id'], 'attr') ?>">
                        <?= esc($row['name']) ?>
                    </a>
                <?php endforeach; ?>

            </div>
        <?php endif; ?>


        <!-- Article Grid Wrapper -->
        <div style="position: relative;">
            <div class="article-grid">
                <?php if (!empty($news)): ?>
                    <?php $i = 0; ?>
                    <?php foreach ($news as $row): ?>
                        <a class="article-card" href="<?= base_url('News/detail/' . esc($row['id'], 'url')) ?>"
                            data-category="<?= esc($row['category_id'], 'attr') ?>"
                            data-aos="fade-up" data-aos-delay="<?= $i * 50;
                                                                $i++; ?>">

                            <div class="card-image-wrapper">
                                <span class="card-category"><?= esc($row['category_name']) ?></span>
                                <?php if (!empty($row['image_path']) && file_exists(ROOTPATH . $row['image_path'])): ?>
                                    <img src="<?= base_url('public/img/logofve_t.png') ?>" alt="<?= esc($row['title']) ?>">
                                <?php else: ?>
                                    <img class="img-fluid" style="object-fit: contain;" src="<?php echo base_url('public/img/logofve_t.png') ?>" alt="No Image Available">
                                <?php endif; ?>
                            </div>
                            <div class="card-content">
                                <div class="card-date">
                                    <i class="far fa-calendar-alt"></i>
                                    <?= date('d M Y', strtotime($row['create_at'])) ?>
                                </div>
                                <h3 class="card-title"><?= esc($row['title']) ?></h3>

                                <div class="card-footer">
                                    <span class="read-more-btn">
                                        อ่านเพิ่มเติม <i class="ti ti-arrow-right"></i>
                                    </span>
                                </div>
                            </div>
                        </a>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="col-12 text-center py-5">
                        <h3 class="text-muted">ไม่พบข้อมูลข่าวสาร</h3>
                    </div>
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