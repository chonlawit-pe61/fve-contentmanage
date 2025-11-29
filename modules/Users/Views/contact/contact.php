<?php $this->extend('template/users_layout') ?>

<?php $this->section('style'); ?>
<style>
    /* --- Modern Wave Theme --- */
    body {
        background-color: #f8f9fa;
    }

    /* Wave Header */
    .wave-header {
        position: relative;
        background: linear-gradient(135deg, var(--vc-primary-dark) 0%, var(--vc-primary) 100%);
        color: #fff;
        padding: 4rem 0 8rem; /* Extra padding bottom for overlap */
        text-align: center;
        overflow: hidden;
    }

    .wave-header::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 60px;
        background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1440 320'%3E%3Cpath fill='%23f8f9fa' fill-opacity='1' d='M0,224L48,213.3C96,203,192,181,288,181.3C384,181,480,203,576,224C672,245,768,267,864,261.3C960,256,1056,224,1152,197.3C1248,171,1344,149,1392,138.7L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z'%3E%3C/path%3E%3C/svg%3E");
        background-size: cover;
        background-repeat: no-repeat;
    }

    .header-content {
        position: relative;
        z-index: 2;
        max-width: 800px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .contact-title {
        font-size: 3rem;
        font-weight: 800;
        margin-bottom: 1rem;
        text-shadow: 0 4px 10px rgba(0,0,0,0.2);
    }

    .contact-subtitle {
        font-size: 1.15rem;
        opacity: 0.9;
        font-weight: 300;
    }

    /* Floating Cards Container */
    .cards-container {
        max-width: 1200px;
        margin: -60px auto 4rem; /* Negative margin for overlap */
        padding: 0 20px;
        position: relative;
        z-index: 3;
    }

    .cards-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
    }

    .contact-card {
        background: #fff;
        padding: 2rem 1.5rem;
        border-radius: 15px;
        text-align: center;
        box-shadow: 0 15px 35px rgba(0,0,0,0.08);
        transition: all 0.3s ease;
        border-bottom: 4px solid transparent;
    }

    .contact-card:hover {
        transform: translateY(-10px);
        border-bottom-color: var(--vc-gold);
        box-shadow: 0 20px 40px rgba(0,0,0,0.12);
    }

    .card-icon {
        width: 70px;
        height: 70px;
        background: rgba(212, 175, 55, 0.1);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
        color: var(--vc-primary);
        font-size: 2rem;
        transition: all 0.3s;
    }

    .contact-card:hover .card-icon {
        background: var(--vc-primary);
        color: #fff;
        transform: rotateY(180deg);
    }

    .card-title {
        font-size: 1.1rem;
        font-weight: 700;
        color: #2d3436;
        margin-bottom: 0.8rem;
    }

    .card-text {
        font-size: 0.95rem;
        color: #636e72;
        line-height: 1.5;
        word-break: break-word; /* Prevent overflow */
    }

    /* Map Section */
    .map-section {
        max-width: 1200px;
        margin: 0 auto 4rem;
        padding: 0 20px;
    }

    .map-wrapper {
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        border: 1px solid #eee;
    }

    .map-frame {
        width: 100%;
        height: 450px;
        border: 0;
        display: block;
    }

    @media (max-width: 992px) {
        .cards-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 576px) {
        .cards-grid {
            grid-template-columns: 1fr;
        }
        .contact-title {
            font-size: 2.2rem;
        }
        .cards-container {
            margin-top: -40px;
        }
    }
</style>
<?php $this->endSection() ?>

<?php $this->section('content'); ?>

<!-- Wave Header -->
<div class="wave-header">
    <div class="header-content" data-aos="fade-down">
        <h1 class="contact-title text-white">ติดต่อเรา</h1>
        <p class="contact-subtitle">วิทยาลัยการอาชีพฝาง พร้อมให้บริการและให้ข้อมูล ติดต่อเราได้ง่ายๆ ผ่านช่องทางที่คุณสะดวก</p>
    </div>
</div>

<!-- Floating Cards -->
<div class="cards-container">
    <div class="cards-grid">
        
        <!-- Address -->
        <div class="contact-card" data-aos="fade-up" data-aos-delay="0">
            <div class="card-icon">
                <i class="bi bi-geo-alt-fill"></i>
            </div>
            <h3 class="card-title">ที่อยู่</h3>
            <p class="card-text"><?= $information['address'] ?></p>
        </div>

        <!-- Phone -->
        <div class="contact-card" data-aos="fade-up" data-aos-delay="100">
            <div class="card-icon">
                <i class="bi bi-telephone-fill"></i>
            </div>
            <h3 class="card-title">เบอร์โทรศัพท์</h3>
            <p class="card-text"><?= $information['phone'] ?></p>
        </div>

        <!-- Fax -->
        <div class="contact-card" data-aos="fade-up" data-aos-delay="200">
            <div class="card-icon">
                <i class="bi bi-printer-fill"></i>
            </div>
            <h3 class="card-title">โทรสาร</h3>
            <p class="card-text"><?= $information['fax'] ?></p>
        </div>

        <!-- Email -->
        <div class="contact-card" data-aos="fade-up" data-aos-delay="300">
            <div class="card-icon">
                <i class="bi bi-envelope-fill"></i>
            </div>
            <h3 class="card-title">อีเมล</h3>
            <p class="card-text"><?= $information['email'] ?: 'ยังไม่ระบุ' ?></p>
        </div>

    </div>
</div>

<!-- Map Section -->
<div class="map-section" data-aos="fade-up">
    <div class="map-wrapper">
        <iframe class="map-frame" 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3761.8244667667445!2d100.32072777521522!3d19.463133481822787!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30d7ecf4b161f33b%3A0x7e92a9161587fe36!2sChiang%20Kham%20Vocational%20College!5e0!3m2!1sen!2sth!4v1754981944007!5m2!1sen!2sth"
            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>
</div>

<?php $this->endSection() ?>

<?php $this->section('scripts'); ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<script>
    AOS.init({
        duration: 800,
        once: true,
        offset: 50
    });
</script>
<?php $this->endSection() ?>