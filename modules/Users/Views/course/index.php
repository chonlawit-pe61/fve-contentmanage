<?php $this->extend('template/users_layout') ?>

<?php $this->section('style'); ?>
<style>
    :root {
        --primary-color: #870100;
        /* Maroon / Blood Red */
        --accent-color: #D4AF37;
        /* Gold */
        --text-dark: #2d3436;
        --bg-light: #f8f9fa;
        --white: #ffffff;
    }

    .bg_content {
        background: linear-gradient(180deg, #fff 0%, var(--bg-light) 100%);
        padding-bottom: 6rem;
        font-family: 'Sarabun', sans-serif;
    }

    .section-title {
        font-weight: 800;
        color: var(--primary-color);
        position: relative;
        display: inline-block;
        margin-bottom: 3rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        z-index: 1;
        font-size: 2rem;
    }

    .section-title::after {
        content: '';
        position: absolute;
        width: 60px;
        height: 5px;
        background: var(--accent-color);
        bottom: -12px;
        left: 50%;
        transform: translateX(-50%);
        border-radius: 10px;
    }

    .group-title {
        color: var(--text-dark);
        font-weight: 700;
        margin-top: 3rem;
        margin-bottom: 2rem;
        border-left: 5px solid var(--primary-color);
        padding-left: 15px;
        font-size: 1.5rem;
    }

    /* --- Brand New Card Design --- */
    .executive-card {
        background: var(--white);
        border-radius: 16px;
        transition: all 0.4s ease;
        border: none;
        height: 100%;
        position: relative;
        overflow: visible;
        margin-top: 30px;
    }

    /* The "Maroon Background" Frame */
    .img-frame {
        background: linear-gradient(135deg, #870100 0%, #600000 100%);
        padding: 6px;
        border-radius: 14px;
        box-shadow: 0 10px 20px rgba(135, 1, 0, 0.2);
        width: 180px;
        height: 220px;
        /* 4:5 Portrait */
        margin: 0 auto 20px;
        position: relative;
        transition: transform 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        z-index: 2;
    }

    .executive-card:hover .img-frame {
        transform: translateY(-15px) scale(1.02);
        box-shadow: 0 20px 30px rgba(135, 1, 0, 0.3);
    }

    /* Decorative Gold Accent on Frame */
    .img-frame::after {
        content: '';
        position: absolute;
        bottom: -5px;
        right: -5px;
        width: 40px;
        height: 40px;
        border-bottom: 4px solid var(--accent-color);
        border-right: 4px solid var(--accent-color);
        border-radius: 0 0 14px 0;
        opacity: 0.7;
        transition: 0.3s;
    }

    .executive-card:hover .img-frame::after {
        opacity: 1;
        width: 100%;
        height: 100%;
        border-radius: 14px;
    }

    .img-personal {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 10px;
        display: block;
        background-color: #fff;
    }

    /* Info Section */
    .card-info {
        text-align: center;
        padding: 0 15px 20px;
        position: relative;
        z-index: 2;
    }

    .executive-name {
        color: var(--text-dark);
        font-weight: 700;
        font-size: 1.15rem;
        margin-bottom: 8px;
        line-height: 1.3;
    }

    .executive-position {
        color: var(--primary-color);
        font-weight: 600;
        font-size: 0.9rem;
        display: inline-block;
        position: relative;
        padding-bottom: 5px;
    }

    /* --- Contact Info Styles --- */
    .card-contact {
        margin-top: 10px;
        border-top: 1px solid rgba(0, 0, 0, 0.05);
        padding-top: 15px;
        opacity: 0.8;
        transition: opacity 0.3s;
    }

    .executive-card:hover .card-contact {
        opacity: 1;
    }

    .contact-item {
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.9rem;
        color: #555;
        margin-bottom: 5px;
        transition: transform 0.2s;
        word-break: break-all;
    }

    .contact-item:hover {
        transform: translateX(5px);
        color: var(--primary-color);
    }

    .contact-icon {
        width: 28px;
        height: 28px;
        min-width: 28px;
        background: rgba(212, 175, 55, 0.15);
        color: var(--accent-color);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 10px;
        font-size: 0.8rem;
        transition: all 0.3s;
    }

    .contact-item:hover .contact-icon {
        background: var(--accent-color);
        color: #fff;
    }

    /* Responsive Grid */
    .executives-row {
        display: flex;
        flex-wrap: wrap;
        justify-content: start;
        gap: 30px;
    }

    .exec-col {
        flex: 0 0 250px;
        max-width: 280px;
    }

    a.card-link {
        text-decoration: none;
        display: block;
        height: 100%;
    }

    /* Philosophy Section reused styles */
    .philosophy-section {
        color: #333;
    }

    .philosophy-section h1 {
        font-size: 1.75rem;
        color: #870100;
        margin-top: 2rem;
    }
</style>
<?php $this->endSection() ?>

<?php $this->section('content'); ?>
<?php
// Group Data by Level Name or Category
$groupedTED = [];
if (!empty($TED)) {
    foreach ($TED as $row) {
        $levelName = !empty($row['level_name']) ? $row['level_name'] : 'บุคลากร';
        $groupedTED[$levelName][] = $row;
    }
}
?>

<div data-aos="fade-up" class="bg_content">
    <div class="container px-5">
        <div class="py-5 w-100">
            <!-- Course Header -->
            <div class="row mb-5">
                <div class="col-lg-12 text-center mb-4">
                    <h1 class="section-title"><?php echo $course['name'] ?></h1>
                </div>
                <div class="col-lg-12 mb-4 text-center">
                    <img class="img-fluid rounded shadow-sm" src="<?php echo base_url($course['course_img']) ?>" alt="" style="max-height: 500px; object-fit: cover;">
                </div>

                <!-- Description -->
                <div class="col-lg-12 mb-4 philosophy-section">
                    <div class="card shadow-sm border-0 p-4 mb-4">
                        <h5 class="text-primary fw-bold mb-3">
                            <i class="fas fa-graduation-cap me-2"></i>หลักสูตรประกาศนียบัตรวิชาชีพ (ปวช.)
                        </h5>
                        <div class="ps-3 border-start border-3 border-primary text-muted">
                            รับผู้จบ ม.3 หรือเทียบเท่า<br>
                            <?= $course['Vocational'] ?>
                        </div>
                    </div>

                    <div class="card shadow-sm border-0 p-4">
                        <h5 class="text-primary fw-bold mb-3">
                            <i class="fas fa-user-graduate me-2"></i>หลักสูตรประกาศนียบัตรวิชาชีพชั้นสูง (ปวส.)
                        </h5>
                        <div class="ps-3 border-start border-3 border-primary text-muted">
                            รับผู้จบ ปวช. หรือ ม.6 หรือเทียบเท่า<br>
                            <?php echo $course['HighVocational'] ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Personnel Section -->
            <?php if (!empty($groupedTED)): ?>
                <div class="row">
                    <div class="col-12 text-center mb-5">
                        <h2 class="section-title" style="font-size: 1.8rem;">บุคลากรประจำสาขาวิชา</h2>
                    </div>

                    <div class="col-12">
                        <?php foreach ($groupedTED as $levelName => $members): ?>
                            <div class="group-section mb-5" data-aos="fade-up">
                                <h3 class="group-title <?= ($levelName === 'หัวหน้าแผนก') ? 'd-none' : '' ?>"><?= $levelName ?></h3>
                                <div class="executives-row" style="justify-content: <?= ($levelName === 'หัวหน้าแผนก') ? 'center' : 'start' ?> !important;">
                                    <?php foreach ($members as $key => $row): ?>
                                        <?php
                                        $img_path = (!empty($row['image_path']) && file_exists(ROOTPATH . $row['image_path']))
                                            ? base_url($row['image_path'])
                                            : base_url('public/img/blank-member.jpg');

                                        // Link to personal detail if needed, otherwise #
                                        // Assuming organization_personal link works with member ID or similar
                                        $link = base_url("Organization/organization_personal/" . ($row['id'] ?? '#'));
                                        ?>
                                        <div class="exec-col" data-aos="fade-up" data-aos-delay="<?= ($key % 4) * 50 ?>">
                                            <a href="<?= $link ?>" class="card-link">
                                                <div class="executive-card">
                                                    <div class="img-frame">
                                                        <img class="img-personal" src="<?= $img_path ?>" alt="<?= $row['first_name'] ?>">
                                                    </div>
                                                    <div class="card-info">
                                                        <h5 class="executive-name">
                                                            <?= $row['prename'] . ' ' . $row['first_name'] . ' ' . $row['last_name'] ?>
                                                        </h5>
                                                        <span class="executive-position"><?= $row['level_name'] ?></span>

                                                        <!-- Contact Info -->
                                                        <?php if (!empty($row['phone']) || !empty($row['email'])): ?>
                                                            <div class="card-contact">
                                                                <?php if (!empty($row['position'])): ?>
                                                                    <div class="contact-item">
                                                                        <div class="contact-icon"><i class="fas fa-user-tie"></i></div>
                                                                        <span class="contact-text"><?= $row['position'] ?></span>
                                                                    </div>
                                                                <?php endif; ?>
                                                                <?php if (!empty($row['phone'])): ?>
                                                                    <div class="contact-item">
                                                                        <div class="contact-icon"><i class="fas fa-phone-alt"></i></div>
                                                                        <span class="contact-text"><?= $row['phone'] ?></span>
                                                                    </div>
                                                                <?php endif; ?>
                                                                <?php if (!empty($row['email'])): ?>
                                                                    <div class="contact-item">
                                                                        <div class="contact-icon"><i class="fas fa-envelope"></i></div>
                                                                        <span class="contact-text"><?= $row['email'] ?></span>
                                                                    </div>
                                                                <?php endif; ?>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>

        </div>
    </div>
</div>
<?php $this->endSection() ?>

<?php $this->section('scripts'); ?>
<script>
    // Animations handled globally by AOS
</script>
<?php $this->endSection() ?>