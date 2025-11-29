<?php $this->extend('template/users_layout') ?>

<?php $this->section('style'); ?>
<style>
    #carouselExampleCaptions .carousel-inner {
        height: 700px;
    }

    #carouselExampleCaptions .carousel-item img {
        object-fit: cover;
        height: 100%;
        width: 100%;
    }

    /* 👉 สำหรับหน้าจอเล็ก (มือถือ) */
    @media (max-width: 768px) {
        #carouselExampleCaptions .carousel-inner {
            height: auto;
            /* ปรับให้เล็กลง */
        }
    }

    /* 👉 สำหรับแท็บเล็ต */
    @media (min-width: 769px) and (max-width: 1024px) {
        #carouselExampleCaptions .carousel-inner {
            height: auto;
        }
    }

    .custom-card {
        /* width: 16rem; */
        background-color: white;
        box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.09);
        padding: 2.25rem;
        position: relative;
        overflow: hidden;
    }

    .custom-circle {
        width: 6rem;
        height: 6rem;
        background-color: #870100;
        /* violet-500 */
        border-radius: 9999px;
        position: absolute;
        right: -1.25rem;
        top: -1.75rem;
    }

    .custom-circle-number {
        position: absolute;
        bottom: 1.5rem;
        left: 1.75rem;
        color: white;
        font-size: 1.5rem;
    }

    .custom-icon {
        .fa {
            font-size: 80px;
            color: #8b5cf6;
        }
    }

    .custom-title {
        font-weight: bold;
        font-size: 1.25rem;
    }

    .custom-description {
        font-size: 0.875rem;
        color: #71717a;
        line-height: 1.5rem;
    }

    .unique-card-wrapper {
        /* width: 20rem; */
        padding: 1rem;
        background-color: white;
        border-radius: 0.5rem;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transform: scale(1);
        transition: transform 0.3s ease-in-out;
    }

    .unique-card-wrapper:hover {
        transform: scale(1.05);
    }

    .unique-card-image {
        width: 100%;
        height: 10rem;
        object-fit: cover;
        border-top-left-radius: 0.5rem;
        border-top-right-radius: 0.5rem;
    }

    .unique-card-body {
        padding: 1rem;
    }

    .unique-card-title {
        font-size: 1.25rem;
        font-weight: 600;
    }

    .unique-card-text {
        color: #4B5563;
        /* Tailwind gray-600 */
        margin-top: 0.5rem;
    }

    .unique-card-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 1rem;
    }

    .unique-card-button {
        background-color: #3B82F6;
        /* blue-500 */
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 9999px;
        border: none;
        cursor: pointer;
        outline: none;
        transition: background-color 0.3s ease;
    }

    .unique-card-button:hover {
        background-color: #2563EB;
        /* blue-600 */
    }

    .unique-card-button:focus {
        box-shadow: 0 0 0 3px rgba(147, 197, 253, 0.5);
        /* ring effect */
    }

    .py-10 {
        padding-top: 50px !important;
        padding-bottom: 50px !important;
    }

    .modal-body {
        max-height: 70vh;
        /* ปรับตามต้องการ */
        overflow-y: auto;
    }

    .imgzoom-modal-content {
        max-width: 100%;
        height: auto;
        display: block;
        margin: auto;
    }

    .carousel-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .icon-wrapper {
        width: 5rem;
        height: 5rem;
        border: 2px solid #6b1e0f;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .icon-wrapper .fa {
        font-size: 40px;
        color: #6b1e0f;
        /* background-color: #6b1e0f; */
        border-radius: 50%;
        padding: 15px 15px;
    }

    .box-content-1 {
        height: 500px;
    }

    /* ───── SECTION ───── */
    .animated-section {
        background: radial-gradient(circle at center, #870100, #4e0000);
        height: 300px;
        position: relative;
        isolation: isolate;
    }

    .animated-wrapper {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        overflow: hidden;
        z-index: 0;
    }

    .animated-wrapper span {
        position: absolute;
        top: -120px;
        height: 50px;
        width: 50px;
        z-index: -1;
        animation: animated-float 10s linear infinite;
        border-radius: 50%;
    }

    /* ใช้โทนฟ้าอ่อน ชมพูอ่อน เหลืองอ่อน ให้สบายตา */
    .animated-wrapper span:nth-child(1) {
        left: 5%;
        animation-delay: 0.6s;
        border: 4px solid #ffdeea;
    }

    .animated-wrapper span:nth-child(2) {
        left: 15%;
        animation-delay: 3s;
        width: 60px;
        height: 60px;
        background: #ffe3f2;
    }

    .animated-wrapper span:nth-child(3) {
        left: 25%;
        animation-delay: 2s;
        border: 4px solid #ffeaa7;
    }

    .animated-wrapper span:nth-child(4) {
        left: 35%;
        animation-delay: 5s;
        width: 80px;
        height: 80px;
        background: #f6f3b8;
    }

    .animated-wrapper span:nth-child(5) {
        left: 45%;
        animation-delay: 1s;
        border: 4px solid #dfe7fd;
    }

    .animated-wrapper span:nth-child(6) {
        left: 55%;
        animation-delay: 7s;
        border: 4px solid #cceeff;
    }

    .animated-wrapper span:nth-child(7) {
        left: 65%;
        animation-delay: 6s;
        width: 100px;
        height: 100px;
        background: #fcefe3;
    }

    .animated-wrapper span:nth-child(8) {
        left: 75%;
        animation-delay: 8s;
        border: 4px solid #ffefd5;
    }

    .animated-wrapper span:nth-child(9) {
        left: 85%;
        animation-delay: 6s;
        width: 90px;
        height: 90px;
        background: #d0f0fd;
    }

    .animated-wrapper span:nth-child(10) {
        left: 95%;
        animation-delay: 4s;
        border: 4px solid #ffe4e1;
    }

    .animated-banner {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
        position: relative;
        z-index: 1;
        text-align: center;
        padding: 0 1rem;
    }

    .animated-content h2 {
        color: #ffffff;
        font-size: 26px;
        line-height: 1.4;
        font-weight: 400;
    }

    .animated-content h2 b {
        font-size: 20px;
        font-weight: 600;
        color: #ffcccb;
    }

    .text-center .btn.btn-indigo {
        background-color: #ffffff;
        color: #870100;
        padding: 0.6rem 1.2rem;
        border-radius: 30px;
        font-weight: bold;
        text-decoration: none;
        transition: background-color 0.3s ease;
    }

    .text-center .btn.btn-indigo:hover {
        background-color: #ffd9d9;
        color: #5a0000;
    }

    @keyframes animated-float {
        0% {
            transform: translateY(0);
            opacity: 1;
        }

        80% {
            opacity: 0.5;
        }

        100% {
            transform: translateY(800px) rotate(360deg);
            opacity: 0;
        }
    }

    .animated-section-2 {
        height: 300px;
        background: radial-gradient(circle at center, #870100, #4e0000);
        color: white;
    }

    .font-30 {
        font-size: 30px;
    }

    .color-text-header-new {
        color: #870100;
    }
</style>

</style>
<?php $this->endSection() ?>
<?php $this->section('content'); ?>
<div data-aos="fade-up" class="bg_content">
    <div class="container py-6 px-5 flex-lg-column">
        <div class="text-center">
            <h1>
                นโยบายเว็บไซต์ (Website Policy)
            </h1>
        </div>

        <div class="gallery">
            <div class="row">
                <div class="col-lg-12">
                    <?= @$content['content_description'] ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->endSection() ?>
<?php $this->section('scripts'); ?>
<script>

</script>

<?php $this->endSection() ?>