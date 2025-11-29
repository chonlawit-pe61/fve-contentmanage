<?php $this->extend('template/users_layout') ?>

<?php $this->section('style'); ?>
<style>
    body {
        font-family: 'Sarabun', sans-serif;
    }

    .hero-header {
        background: url('<?= base_url('public/img/bg-people.jpg') ?>') center center/cover no-repeat;
        padding: 6rem 2rem 4rem;
        text-align: center;
        color: #fff;
        position: relative;
    }


    .hero-header .content {
        position: relative;
        z-index: 2;
    }

    .hero-header h1 {
        font-size: 2.8rem;
        font-weight: 700;
        margin-bottom: 1rem;
        text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.4);
    }

    .profile-section {
        max-width: 1000px;
        /* margin: -80px auto 2rem; */
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        padding: 2rem;
        display: flex;
        flex-wrap: wrap;
        align-items: center;
    }

    .profile-img {
        flex: 1 1 220px;
        text-align: center;
        padding: 1rem;
    }

    .profile-img img {
        width: 180px;
        height: 180px;
        border-radius: 50%;
        object-fit: cover;
        border: 5px solid #fff;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }

    .profile-info {
        flex: 2 1 400px;
        padding: 1.5rem;
    }

    .profile-info h2 {
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
        color: #343a40;
    }

    .profile-info p.position {
        font-size: 1.1rem;
        color: #6c757d;
        margin-bottom: 1.5rem;
    }

    .info-row {
        display: flex;
        margin-bottom: 0.8rem;
        font-size: 0.95rem;
    }

    .info-row .label {
        min-width: 140px;
        font-weight: 600;
        color: #5a5a5a;
    }

    .info-row .value {
        color: #333;
    }

    .org-tags {
        padding: 1.5rem;
        text-align: center;
    }

    .org-tags span {
        background-color: #e7ecf4;
        color: #003366;
        padding: 0.5rem 1rem;
        margin: 0.25rem;
        border-radius: 20px;
        font-weight: 500;
        display: inline-block;
    }

    @media (max-width: 768px) {
        .profile-section {
            flex-direction: column;
        }

        .profile-info {
            padding: 1rem;
        }

        .profile-img {
            padding-bottom: 0;
        }
    }
</style>
<?php $this->endSection() ?>

<?php $this->section('content'); ?>

<?php if (!empty($personal['member'])): ?>
    <?php $m = $personal['member']; ?>
    <div class="profile-section mx-auto my-5">
        <div class="profile-img">
            <img src="<?= base_url(!empty($m['image_path']) && file_exists(ROOTPATH . $m['image_path']) ? $m['image_path'] : 'public/img/blank-member.jpg') ?>" alt="Profile Image">
        </div>
        <div class="profile-info">
            <h2><?= esc($m['pre_name'] . $m['first_name'] . ' ' . $m['last_name']) ?></h2>
            <p class="position"><?= esc($m['position'] ?: 'ไม่ระบุตำแหน่ง') ?></p>

            <div class="info-row">
                <span class="label">วุฒิการศึกษา:</span>
                <span class="value"><?= esc($m['graduation_name'] ?: '-') ?></span>
            </div>
            <div class="info-row">
                <span class="label">อีเมล:</span>
                <span class="value"><?= esc($m['email'] ?: '-') ?></span>
            </div>
            <div class="info-row">
                <span class="label">เบอร์โทร:</span>
                <span class="value"><?= esc($m['phone'] ?: '-') ?></span>
            </div>
            <div class="info-row">
                <?php if (!empty($personal['org'])): ?>
                    <div class="org-tags p-0">
                        <?php foreach ($personal['org'] as $org): ?>
                            <span><i class="ti ti-sitemap"></i> <?= esc($org['name']) ?></span>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>



<?php else: ?>
    <div class="text-center py-5">
        <h4 class="text-muted">ไม่พบข้อมูลบุคลากร</h4>
    </div>
<?php endif; ?>

<?php $this->endSection() ?>

<?php $this->section('scripts'); ?>
<script>
    AOS.init();
</script>
<?php $this->endSection() ?>