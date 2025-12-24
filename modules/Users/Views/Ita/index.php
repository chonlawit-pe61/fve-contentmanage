<?= $this->extend('template/users_layout') ?>

<?= $this->section('style') ?>
<style>
    /* --- Magazine Style Layout (Adapted for ITA) --- */
    .news-page-bg {
        background-color: #f9fafb;
    }

    /* Dynamic Hero Section */
    .news-hero {
        position: relative;
        height: 350px;
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 4rem;
        border-radius: 0 0 50px 50px;
        overflow: hidden;
    }

    .news-hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(to bottom, rgba(26, 37, 60, 0.9), rgba(128, 0, 0, 0.8));
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
        font-size: 3rem;
        font-weight: 800;
        margin-bottom: 1rem;
        color: #eee;
        text-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        letter-spacing: -1px;
    }

    .news-hero p {
        font-size: 1.2rem;
        font-weight: 300;
        opacity: 0.9;
    }

    .news-container {
        max-width: 1000px;
        margin: -80px auto 0;
        padding: 0 20px 4rem;
        position: relative;
        z-index: 3;
    }

    /* Filter Menu (Year Selector) */
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
        left: 50%;
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
        text-decoration: none;
    }

    .filter-btn:hover {
        color: #990000;
        background: rgba(128, 0, 0, 0.05);
    }

    .filter-btn.active {
        background: #990000;
        color: #fff;
        box-shadow: 0 4px 15px rgba(128, 0, 0, 0.3);
    }

    /* Accordion Custom Styling */
    .ita-accordion-item {
        border: none;
        margin-bottom: 1.5rem;
        background: transparent;
    }

    .ita-header button {
        background: #fff;
        border-radius: 15px !important;
        padding: 1.5rem 2rem;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
        border: 1px solid rgba(0, 0, 0, 0.02);
        font-size: 1.2rem;
        font-weight: 700;
        color: #333;
        transition: all 0.3s ease;
    }

    .ita-header button:not(.collapsed) {
        background: #990000;
        color: #fff;
        box-shadow: 0 10px 30px rgba(153, 0, 0, 0.2);
    }

    .ita-header button::after {
        transition: all 0.3s;
    }

    .ita-header button:not(.collapsed)::after {
        filter: brightness(0) invert(1);
    }

    .ita-body {
        background: #fff;
        margin-top: 10px;
        border-radius: 15px;
        padding: 2rem;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.03);
    }

    .subtopic-title {
        color: #990000;
        font-weight: 600;
        font-size: 1.1rem;
        margin-bottom: 0.5rem;
        display: flex;
        align-items: center;
    }

    .subtopic-item {
        margin-bottom: 1.5rem;
        padding-bottom: 1.5rem;
        border-bottom: 1px dashed #eee;
    }

    .subtopic-item:last-child {
        border-bottom: none;
        margin-bottom: 0;
        padding-bottom: 0;
    }

    .link-item {
        display: block;
        padding: 8px 15px;
        background: #f8f9fa;
        border-radius: 8px;
        margin-bottom: 8px;
        color: #555;
        text-decoration: none;
        transition: all 0.2s;
        border-left: 3px solid transparent;
    }

    .link-item:hover {
        background: #fffbe6;
        color: #990000;
        border-left: 3px solid #ffc107;
        transform: translateX(5px);
    }

    .link-item i {
        margin-right: 10px;
        color: #ffc107;
    }

    /* Animation */
    [data-aos] {
        pointer-events: none;
    }

    [data-aos].aos-animate {
        pointer-events: auto;
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="news-page-bg">

    <!-- Hero Section -->
    <div class="news-hero" style="background-image: url('<?= base_url('public/img/bg-people.jpg') ?>');">
        <div class="news-hero-content" data-aos="fade-down">
            <h1>การประเมินคุณธรรมและความโปร่งใส ในการดำเนินงานของหน่วยงานภาครัฐ</h1>
            <p>Open Data Integrity and Transparency Assessment: OIT</p>
        </div>
    </div>

    <div class="news-container">

        <!-- Year Selector (Filter Style) -->
        <?php if (!empty($years)) : ?>
            <div class="filter-menu" data-aos="fade-up">
                <?php foreach ($years as $y) : ?>
                    <a href="<?= base_url('ita?year=' . $y['ita_year']) ?>"
                        class="filter-btn <?= ($active_year == $y['ita_year']) ? 'active' : '' ?>">
                        <?= $y['ita_year'] ?>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <!-- Topics List -->
        <?php if (!empty($topics)) : ?>
            <div class="accordion" id="itaAccordion">
                <?php foreach ($topics as $index => $topic) : ?>
                    <div class="accordion-item ita-accordion-item" data-aos="fade-up" data-aos-delay="<?= $index * 50 ?>">
                        <h2 class="accordion-header ita-header" id="heading<?= $topic['id'] ?>">
                            <button class="accordion-button <?= ($index !== 0) ? 'collapsed' : '' ?>"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#collapse<?= $topic['id'] ?>"
                                aria-expanded="<?= ($index === 0) ? 'true' : 'false' ?>"
                                aria-controls="collapse<?= $topic['id'] ?>">
                                <?= $index + 1 ?>. <?= $topic['name'] ?>
                            </button>
                        </h2>
                        <div id="collapse<?= $topic['id'] ?>"
                            class="accordion-collapse collapse <?= ($index === 0) ? 'show' : '' ?>"
                            aria-labelledby="heading<?= $topic['id'] ?>"
                            data-bs-parent="#itaAccordion">
                            <div class="accordion-body ita-body">
                                <?php if (!empty($topic['subtopics'])) : ?>
                                    <?php foreach ($topic['subtopics'] as $subtopic) : ?>
                                        <div class="subtopic-item">
                                            <div class="subtopic-title">
                                                <i class="ti ti-folder me-2"></i><?= $subtopic['name'] ?>
                                            </div>
                                            <?php if (!empty($subtopic['description'])) : ?>
                                                <p class="text-muted small ms-4 mb-2"><?= $subtopic['description'] ?></p>
                                            <?php endif; ?>

                                            <?php if (!empty($subtopic['links'])) : ?>
                                                <div class="ms-4">
                                                    <?php foreach ($subtopic['links'] as $link) : ?>
                                                        <a href="<?= $link['url'] ?>" target="_blank" class="link-item">
                                                            <i class="ti ti-link"></i>
                                                            <?= !empty($link['description']) ? $link['description'] : $link['url'] ?>
                                                        </a>
                                                    <?php endforeach; ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <div class="text-center text-muted py-3">กำลังดำเนินการอัปเดตข้อมูล</div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else : ?>
            <div class="text-center py-5" data-aos="fade-up">
                <div class="mb-3">
                    <i class="ti ti-files fs-1 text-muted"></i>
                </div>
                <h3 class="text-muted">ไม่พบข้อมูลสำหรับปีงบประมาณ <?= $active_year ?></h3>
            </div>
        <?php endif; ?>

    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    AOS.init({
        duration: 800,
        once: true,
        offset: 50,
    });
</script>
<?= $this->endSection() ?>