<?php $this->extend('template/users_layout') ?>

<?php $this->section('style'); ?>
<style>
    body {
        font-family: 'Sarabun', sans-serif;
        background-color: #f8f9fa;
    }

    /* --- Premium Profile Card --- */
    .profile-card-wrapper {
        max-width: 900px;
        margin: 4rem auto;
        background: #fff;
        border-radius: 20px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        position: relative;
    }

    /* Banner Header */
    .profile-banner {
        height: 200px;
        background: linear-gradient(135deg, var(--vc-primary-dark) 0%, var(--vc-primary) 100%);
        position: relative;
    }

    .profile-banner::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: radial-gradient(circle at 20% 50%, rgba(255, 215, 0, 0.15) 0%, transparent 50%);
    }

    /* Profile Content Container */
    .profile-content {
        padding: 0 40px 40px;
        position: relative;
        text-align: center;
    }

    /* Avatar Image */
    .profile-avatar-container {
        position: relative;
        margin-top: -120px; /* Increased overlap */
        margin-bottom: 25px;
        display: inline-block;
        transition: transform 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .profile-avatar-container:hover {
        transform: scale(1.05);
    }

    .profile-avatar {
        width: 240px; /* Increased size */
        height: 240px;
        border-radius: 50%;
        object-fit: cover;
        border: 8px solid #fff;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2), 0 0 0 1px rgba(0,0,0,0.05); /* Enhanced shadow */
        background: #fff;
        position: relative;
        z-index: 2;
    }

    .profile-avatar-border {
        position: absolute;
        top: -10px;
        left: -10px;
        right: -10px;
        bottom: -10px;
        border-radius: 50%;
        border: 2px dashed var(--vc-gold); /* Dashed for more visual interest */
        z-index: 1;
        animation: spinSlow 30s linear infinite;
        box-shadow: 0 0 20px rgba(255, 215, 0, 0.3); /* Gold glow */
    }

    /* Text Info */
    .profile-name {
        font-size: 2.2rem;
        font-weight: 700;
        color: #333;
        margin-bottom: 5px;
    }

    .profile-position {
        font-size: 1.2rem;
        color: var(--vc-primary);
        font-weight: 600;
        margin-bottom: 30px;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    /* Info Grid */
    .profile-details-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
        text-align: left;
        margin-top: 30px;
        background: #fcfcfc;
        padding: 30px;
        border-radius: 15px;
        border: 1px solid #eee;
    }

    .detail-item {
        display: flex;
        align-items: flex-start;
        margin-bottom: 15px;
    }

    .detail-icon {
        width: 40px;
        height: 40px;
        background: rgba(255, 215, 0, 0.15);
        color: var(--vc-primary);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        margin-right: 15px;
        flex-shrink: 0;
    }

    .detail-content h5 {
        font-size: 0.9rem;
        color: #888;
        margin: 0 0 3px;
        font-weight: 600;
        text-transform: uppercase;
    }

    .detail-content p {
        font-size: 1.05rem;
        color: #333;
        margin: 0;
        font-weight: 500;
    }

    /* Organization Tags */
    .org-tags-container {
        margin-top: 30px;
        text-align: center;
    }

    .org-tag {
        display: inline-flex;
        align-items: center;
        background: #fff;
        border: 1px solid #eee;
        padding: 8px 20px;
        border-radius: 50px;
        margin: 5px;
        font-size: 0.95rem;
        color: #555;
        box-shadow: 0 3px 10px rgba(0,0,0,0.03);
        transition: all 0.3s ease;
    }

    .org-tag i {
        color: var(--vc-gold);
        margin-right: 8px;
        font-size: 1.1rem;
    }

    .org-tag:hover {
        transform: translateY(-2px);
        border-color: var(--vc-gold);
        color: var(--vc-primary);
        box-shadow: 0 5px 15px rgba(0,0,0,0.08);
    }

    @keyframes spinSlow {
        100% { transform: rotate(360deg); }
    }

    @media (max-width: 768px) {
        .profile-card-wrapper {
            margin: 2rem 1rem;
        }
        .profile-content {
            padding: 0 20px 30px;
        }
        .profile-avatar {
            width: 150px;
            height: 150px;
        }
        .profile-avatar-container {
            margin-top: -75px;
        }
        .profile-name {
            font-size: 1.8rem;
        }
    }
</style>
<?php $this->endSection() ?>

<?php $this->section('content'); ?>

<?php if (!empty($personal['member'])): ?>
    <?php $m = $personal['member']; ?>
    
    <div class="container">
        <div class="profile-card-wrapper" data-aos="fade-up">
            <!-- Banner -->
            <div class="profile-banner"></div>

            <!-- Content -->
            <div class="profile-content">
                <!-- Avatar -->
                <div class="profile-avatar-container">
                    <div class="profile-avatar-border"></div>
                    <img class="profile-avatar" src="<?= base_url(!empty($m['image_path']) && file_exists(ROOTPATH . $m['image_path']) ? $m['image_path'] : 'public/img/blank-member.jpg') ?>" alt="Profile Image">
                </div>

                <!-- Name & Position -->
                <h1 class="profile-name"><?= esc($m['pre_name'] . $m['first_name'] . ' ' . $m['last_name']) ?></h1>
                <p class="profile-position"><?= esc($m['position'] ?: 'ไม่ระบุตำแหน่ง') ?></p>

                <!-- Details Grid -->
                <div class="profile-details-grid">
                    <div class="detail-item">
                        <div class="detail-icon"><i class="fa fa-graduation-cap"></i></div>
                        <div class="detail-content">
                            <h5>วุฒิการศึกษา</h5>
                            <p><?= esc($m['graduation_name'] ?: '-') ?></p>
                        </div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-icon"><i class="fa fa-envelope"></i></div>
                        <div class="detail-content">
                            <h5>อีเมล</h5>
                            <p><?= esc($m['email'] ?: '-') ?></p>
                        </div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-icon"><i class="fa fa-phone"></i></div>
                        <div class="detail-content">
                            <h5>เบอร์โทรศัพท์</h5>
                            <p><?= esc($m['phone'] ?: '-') ?></p>
                        </div>
                    </div>
                    <!-- Add more details if available -->
                </div>

                <!-- Organization Tags -->
                <?php if (!empty($personal['org'])): ?>
                    <div class="org-tags-container">
                        <?php foreach ($personal['org'] as $org): ?>
                            <div class="org-tag">
                                <i class="fa fa-sitemap"></i>
                                <?= esc($org['name']) ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>

<?php else: ?>
    <div class="container py-5 text-center">
        <div class="alert alert-light shadow-sm" role="alert" style="max-width: 500px; margin: 0 auto; border-radius: 15px;">
            <i class="fa fa-exclamation-circle text-muted mb-3" style="font-size: 3rem;"></i>
            <h4 class="text-muted">ไม่พบข้อมูลบุคลากร</h4>
        </div>
    </div>
<?php endif; ?>

<?php $this->endSection() ?>

<?php $this->section('scripts'); ?>
<script>
    AOS.init();
</script>
<?php $this->endSection() ?>