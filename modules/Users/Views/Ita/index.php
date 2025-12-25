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

    /* Table Styles */
    .ita-table-container {
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
        background: #fff;
    }

    .ita-table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 0;
    }

    .ita-table thead th {
        background: #990000;
        color: #fff;
        padding: 1.2rem;
        font-weight: 600;
        text-align: left;
        border: none;
    }

    .ita-table tbody td {
        padding: 1.2rem;
        border-bottom: 1px solid #f0f0f0;
        vertical-align: top;
        color: #444;
    }

    .ita-table tbody tr:last-child td {
        border-bottom: none;
    }

    .ita-table tbody tr:hover {
        background-color: #fafafa;
    }

    .topic-row {
        background-color: #fff5f5;
        font-weight: 700;
        color: #800000;
        border-left: 5px solid #990000;
    }

    .topic-cell {
        font-size: 1.1rem;
    }

    .subtopic-cell {
        padding-left: 3rem !important;
    }

    .link-btn {
        display: inline-flex;
        align-items: center;
        padding: 6px 12px;
        background: #f8f9fa;
        color: #333;
        border: 1px solid #ddd;
        border-radius: 6px;
        text-decoration: none;
        font-size: 0.9rem;
        transition: all 0.2s;
        margin-bottom: 5px;
        margin-right: 5px;
    }

    .link-btn:hover {
        background: #990000;
        color: #fff;
        border-color: #990000;
    }

    .link-btn i {
        margin-right: 6px;
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

        <!-- Topics List Table -->
        <?php if (!empty($topics)) : ?>
            <div class="ita-table-container" data-aos="fade-up">
                <table class="ita-table">
                    <thead>
                        <tr>
                            <th style="width: 10%;" class="text-center">ข้อ</th>
                            <th style="width: 30%;" class="text-center">ข้อมูล</th>
                            <th style="width: 30%;" class="text-center">รายละเอียด</th>
                            <th style="width: 30%;" class="text-center">การเผยแพร่</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($topics as $index => $topic) : ?>
                            <!-- Topic Row -->
                            <tr class="topic-row">
                                <td colspan="4" class="topic-cell">
                                    <?= $index + 1 ?>. <?= $topic['name'] ?>
                                </td>
                            </tr>

                            <!-- Subtopics -->
                            <?php if (!empty($topic['subtopics'])) : ?>
                                <?php foreach ($topic['subtopics'] as $subIndex => $subtopic) : ?>
                                    <tr>
                                        <td class="subtopic-cell">
                                            <strong><?= $index + 1 ?>.<?= $subIndex + 1 ?></strong>
                                        </td>
                                        <td class="">
                                            <strong><?= $subtopic['name'] ?></strong>
                                        </td>
                                        <td class="">
                                            <?php if (!empty($subtopic['description'])) : ?>
                                                <p class="mb-0 text-muted small mt-1"><?= $subtopic['description'] ?></p>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if (!empty($subtopic['links'])) : ?>
                                                <div class="d-flex flex-wrap">
                                                    <?php foreach ($subtopic['links'] as $link) : ?>
                                                        <a href="<?= $link['url'] ?>" target="_blank" class="link-btn">
                                                            <i class="ti ti-link"></i>
                                                            <?= !empty($link['description']) ? $link['description'] : 'เปิดลิ้งค์' ?>
                                                        </a>
                                                    <?php endforeach; ?>
                                                </div>
                                            <?php else : ?>
                                                <span class="text-muted small">- ไม่พบข้อมูล -</span>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="2" class="text-center text-muted py-3">กำลังดำเนินการอัปเดตข้อมูล</td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
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