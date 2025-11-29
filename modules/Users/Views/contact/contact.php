<?php $this->extend('template/users_layout') ?>

<?php $this->section('style'); ?>
<style>
    .contact-section {
        background: #f8f9fa;
        padding: 60px 0;
    }

    .contact-card {
        background: #fff;
        border-radius: 16px;
        padding: 40px 30px;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
        position: relative;
    }

    .contact-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 40px rgba(0, 0, 0, 0.08);
    }

    .contact-header-bar {
        position: absolute;
        top: 0;
        left: 0;
        height: 8px;
        width: 100%;
        background: linear-gradient(90deg, #b20000, #e63946);
        border-top-left-radius: 16px;
        border-top-right-radius: 16px;
    }

    .contact-icon {
        font-size: 1.4rem;
        color: #b20000;
        margin-right: 12px;
    }

    .contact-item {
        margin-bottom: 18px;
        font-size: 1.1rem;
        color: #333;
        display: flex;
        align-items: center;
    }

    .contact-title {
        font-weight: 700;
        font-size: 2.2rem;
        color: #222;
        margin-bottom: 0.4rem;
    }

    .contact-sub {
        font-size: 1rem;
        color: #666;
        margin-bottom: 30px;
    }

    .section-divider {
        height: 1px;
        background: #e0e0e0;
        margin: 30px 0;
    }

    .map-frame {
        border-radius: 12px;
        overflow: hidden;
        height: 100%;
        min-height: 380px;
    }
</style>
<?php $this->endSection() ?>

<?php $this->section('content'); ?>
<div class="contact-section" data-aos="fade-up">
    <div class="container">
        <div class="row w-100">
            <div class="col-lg-12 mb-3">
                <div class="contact-card h-100">
                    <!-- <div class="contact-header-bar"></div> -->
                    <div class="text-center mb-4">
                        <h1 class="contact-title">
                            <i class="bi bi-chat-dots-fill me-2 contact-icon"></i>ติดต่อเรา
                        </h1>
                        <p class="contact-sub">คุณสามารถติดต่อสอบถามข้อมูลเพิ่มเติมได้จากช่องทางด้านล่าง</p>
                    </div>

                    <div class="section-divider"></div>

                    <div class="contact-item">
                        <i class="bi bi-geo-alt-fill contact-icon"></i>
                        <?= $information['address'] ?>
                    </div>
                    <div class="contact-item">
                        <i class="bi bi-telephone-fill contact-icon"></i>
                        โทรศัพท์: <?= $information['phone'] ?>
                    </div>
                    <div class="contact-item">
                        <i class="bi bi-printer-fill contact-icon"></i>
                        โทรสาร: <?= $information['fax'] ?>
                    </div>
                    <div class="contact-item">
                        <i class="bi bi-envelope-fill contact-icon"></i>
                        อีเมล: <?= $information['email'] ?: 'ยังไม่ระบุ' ?>
                    </div>

                    <div class="section-divider"></div>

                    <div class="map-frame">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3761.8244667667445!2d100.32072777521522!3d19.463133481822787!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30d7ecf4b161f33b%3A0x7e92a9161587fe36!2sChiang%20Kham%20Vocational%20College!5e0!3m2!1sen!2sth!4v1754981944007!5m2!1sen!2sth"
                            width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->endSection() ?>

<?php $this->section('scripts'); ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<script>
    AOS.init();
</script>
<?php $this->endSection() ?>