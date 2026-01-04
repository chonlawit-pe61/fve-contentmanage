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
        margin-bottom: 4rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        z-index: 1;
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

    /* --- Brand New Card Design --- */
    .executive-card {
        background: var(--white);
        border-radius: 16px;
        transition: all 0.4s ease;
        border: none;
        height: 100%;
        position: relative;
        overflow: visible;
        /* Allow playful overlapping */
        margin-top: 30px;
        /* Space for pop-up effect */
    }

    /* The "Maroon Background" Frame requested by user */
    .img-frame {
        background: linear-gradient(135deg, #870100 0%, #600000 100%);
        /* Deep Maroon Gradient */
        padding: 6px;
        /* Width of the colored frame */
        border-radius: 14px;
        box-shadow: 0 10px 20px rgba(135, 1, 0, 0.2);
        width: 180px;
        /* Base width */
        height: 220px;
        /* 4:5 Portrait Portrait */
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
        /* Slightly less than frame */
        display: block;
        background-color: #fff;
        /* Fallback */
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
        font-size: 1.25rem;
        margin-bottom: 8px;
        line-height: 1.3;

    }

    .executive-position {
        color: var(--primary-color);
        font-weight: 600;
        font-size: 0.95rem;
        display: inline-block;
        position: relative;
        padding-bottom: 5px;
        margin-bottom: 12px;
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
        /* Light Gold */
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

    .director-card {
        max-width: 600px;
        margin: 0 auto;
        padding: 0;
        background: transparent;
        box-shadow: none;
    }

    .director-card .img-frame {
        width: 260px;
        height: 320px;
        padding: 10px;
        /* Thicker frame for director */
        background: linear-gradient(135deg, #d4af37 0%, #870100 100%);
        /* Gold to Red for Director */
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    }

    .director-card .card-info {
        margin-top: 5px;
    }

    .director-card .executive-name {
        font-size: 1.8rem;
        margin-top: 1.5rem;
        color: #000;
    }

    .director-card .executive-position {
        font-size: 1.3rem;
        color: var(--primary-color);
        background: rgba(135, 1, 0, 0.08);
        /* Light red pill bg */
        padding: 8px 25px;
        border-radius: 50px;
    }

    .director-card .card-contact {
        margin-top: 20px;
        padding-top: 20px;
        font-size: 1.1rem;
    }

    .director-card .contact-icon {
        width: 35px;
        height: 35px;
        font-size: 1rem;
    }

    /* Responsive Grid */
    .executives-row {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 30px;
    }

    .exec-col {
        flex: 0 0 280px;
        /* Fixed rough width */
        max-width: 320px;
    }
</style>
<?php $this->endSection() ?>
<?php $this->section('content'); ?>
<div class="bg_content">
    <div class="container justify-content-center">
        <div class="py-5">
            <!-- Header -->
            <div class="text-center mb-5" data-aos="fade-down">
                <h1 class="section-title">คณะผู้บริหาร <br>
                    <span style="font-size: 0.6em; font-weight: 500; color: #666; text-transform: none;">วิทยาลัยการอาชีพฝาง</span>
                </h1>
            </div>

            <!-- Content -->
            <?php if (!empty($personal)): ?>

                <!-- 1. Director Section (Top, Center, Big) -->
                <?php
                $director = $personal[0];
                $dir_img = (!empty($director['image_path']) && file_exists(ROOTPATH . $director['image_path'])) ? base_url($director['image_path']) : base_url('public/img/blank-member.jpg');
                ?>
                <div class="director-wrapper text-center">
                    <div class="executive-card director-card" data-aos="zoom-in" data-aos-duration="1000">
                        <div class="img-frame">
                            <img class="img-personal" src="<?= $dir_img ?>" alt="<?= $director['first_name'] ?>">
                        </div>
                        <div class="card-info">
                            <h4 class="executive-name"><?= $director['prename'] . $director['first_name'] . ' ' . $director['last_name'] ?></h4>
                            <span class="executive-position"><?= $director['org_name'] ?></span>

                            <!-- Contact Info for Director -->
                            <?php if (!empty($director['phone']) || !empty($director['email'])): ?>
                                <div class="card-contact">
                                    <?php if (!empty($director['phone'])): ?>
                                        <div class="contact-item">
                                            <div class="contact-icon"><i class="fas fa-phone-alt"></i></div>
                                            <span class="contact-text"><?= $director['phone'] ?></span>
                                        </div>
                                    <?php endif; ?>
                                    <?php if (!empty($director['email'])): ?>
                                        <div class="contact-item">
                                            <div class="contact-icon"><i class="fas fa-envelope"></i></div>
                                            <span class="contact-text"><?= $director['email'] ?></span>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <!-- 2. Other Executives (Grid) -->
                <div class="executives-row">
                    <?php foreach ($personal as $key => $row): ?>
                        <?php if ($key == 0) continue; // Skip Director 
                        ?>
                        <?php
                        $img = (!empty($row['image_path']) && file_exists(ROOTPATH . $row['image_path'])) ? base_url($row['image_path']) : base_url('public/img/blank-member.jpg');
                        ?>
                        <div class="exec-col" data-aos="fade-up" data-aos-delay="<?= ($key % 4) * 100 + 100 ?>">
                            <div class="executive-card">
                                <div class="img-frame">
                                    <img class="img-personal" src="<?= $img ?>" alt="<?= $row['first_name'] ?>">
                                </div>
                                <div class="card-info">
                                    <h5 class="executive-name"><?= $row['prename'] . $row['first_name'] . ' ' . $row['last_name'] ?></h5>
                                    <span class="executive-position"><?= $row['org_name'] ?></span>

                                    <!-- Contact Info for Executives -->
                                    <?php if (!empty($row['phone']) || !empty($row['email'])): ?>
                                        <div class="card-contact">
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
                        </div>
                    <?php endforeach; ?>
                </div>

            <?php endif; ?>
        </div>
    </div>
</div>
<?php $this->endSection() ?>
<?php $this->section('scripts'); ?>
<script>
    // Animations handled by AOS
</script>
<?php $this->endSection() ?>