<?php $this->extend('template/users_layout') ?>

<?php $this->section('style'); ?>
<style>
    #carouselExampleCaptions .carousel-inner {
        height: 700px;
    }

    #carouselExampleCaptions .carousel-item img {
        object-fit: contain;
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

    .carousel-item img {
        max-width: 100%;
        height: auto;
    }
</style>

</style>
<style>
    .link-grid-container {
        display: grid;
        /* จัดคอลัมน์อัตโนมัติ โดยแต่ละคอลัมน์กว้างอย่างน้อย 250px */
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1.25rem;
        /* ระยะห่างระหว่างการ์ด */
        padding-top: 1rem;
    }

    .link-card {
        display: flex;
        align-items: center;
        padding: 1rem;
        background-color: #f8f9fa;
        /* สีพื้นหลังอ่อนๆ */
        border-radius: 8px;
        border: 1px solid #dee2e6;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .link-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        border-color: #800000;
    }

    .link-icon {
        font-size: 1.75rem;
        /* ขนาดไอคอน */
        color: #800000;
        /* สีไอคอน */
        margin-right: 1rem;
        /* ระยะห่างจากข้อความ */
        flex-shrink: 0;
    }

    .link-text {
        font-size: 16px;
        color: #343a40;
        line-height: 1.4;
    }

    .link-card:hover .link-text {
        color: #800000;
        /* เปลี่ยนสีข้อความเมื่อชี้ */
    }

    @media (max-width: 575.98px) {
        .animated-section-2 {
            height: 100%;
            background: radial-gradient(circle at center, #870100, #4e0000);
            color: white;
        }
    }
</style>
<style>
    .page-header {
        text-align: center;
        margin-bottom: 40px;
    }

    .page-header h1 {
        font-size: 2.8rem;
        font-weight: 700;
        color: #003366;
        /* Dark Blue */
        margin-bottom: 5px;
    }

    .page-header h1::after {
        content: '';
        display: block;
        width: 80px;
        height: 4px;
        background-color: #d9232d;
        /* Red Accent */
        margin: 10px auto 0;
        border-radius: 2px;
    }

    /* --- News Grid Layout --- */
    .news-grid {
        display: grid;
        grid-template-columns: 1.2fr 2fr;
        /* Featured news is wider */
        grid-gap: 30px;
    }

    .featured-news-wrapper {
        grid-column: 1 / 2;
        /* Spans the first column */
    }

    .news-list-wrapper {
        grid-column: 1 / 3;
        /* Spans the second column */
        display: flex;
        flex-direction: column;
        gap: 25px;
        /* Spacing between list items */
    }

    /* --- Card Styles --- */
    .news-card {
        background-color: #ffffff;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.07);
        text-decoration: none;
        color: inherit;
        display: flex;
        flex-direction: column;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .news-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }

    .card-image img {
        width: 100%;
        height: 250px;
        /* กำหนดความสูงคงที่ */
        object-fit: cover;
        /* ครอบตัดให้เต็มกรอบโดยรักษาสัดส่วน */
        display: block;
    }

    .card-image {
        padding: 20px;
    }

    .card-content {
        padding: 25px;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .card-title {
        font-size: 1.4rem;
        font-weight: 600;
        margin: 0 0 10px 0;
        color: #003366;
    }

    .card-description {
        font-size: 1rem;
        font-weight: 300;
        line-height: 1.7;
        margin: 0 0 20px 0;
        flex-grow: 1;
        /* Pushes the date to the bottom */
    }

    .card-meta {
        font-size: 0.9rem;
        font-weight: 500;
        color: #777;
        display: flex;
        align-items: center;
    }

    .card-meta i {
        margin-right: 8px;
        color: #d9232d;
    }

    /* --- List Item Card Variation --- */
    .news-card.list-item {
        flex-direction: row;
        align-items: center;
    }

    .news-card.list-item .card-image {
        width: 400px;
        height: 300px;
        object-fit: cover;
    }

    .news-card.list-item .card-image img {
        width: 350px;
        height: 100%;
        object-fit: cover;
    }

    .news-card.list-item .card-title {
        font-size: 1.1rem;
        font-weight: 500;
    }



    /* --- Responsive Design --- */
    @media (max-width: 992px) {
        .news-grid {
            grid-template-columns: 1fr;
            /* Stack columns on tablets and below */
        }
    }

    @media (max-width: 576px) {
        .page-header h1 {
            font-size: 2rem;
        }

        .news-card.list-item {
            flex-direction: column;
        }

        .news-card.list-item .card-image {
            width: 100%;
            height: 180px;
        }

        .news-card.list-item .card-image img {
            width: 100%;
        }
    }

    .news-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
        /* 2 คอลัมน์เท่ากัน */
        grid-auto-flow: row;
        gap: 30px;
    }

    /* ปล่อยให้วางอัตโนมัติ ไม่บังคับอยู่คอลัมน์ 1 */
    .featured-news-wrapper {
        grid-column: auto !important;
    }

    /* ให้ลิสต์กินเต็มความกว้าง แสดงอยู่บรรทัดถัดไป */
    .news-list-wrapper {
        grid-column: 1 / -1 !important;
    }

    .card-description {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .card-description {
        display: -webkit-box !important;
        -webkit-line-clamp: 3;
        /* ปรับจำนวนบรรทัดที่ต้องการ */
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        line-height: 1.7;
        max-height: calc(1.7em * 3);
        /* เผื่อ browser เก่า */
        word-break: break-word;
        /* กันคำไทย/ยาวๆ ทะลุกรอบ */
    }

    /* แสดงคำอธิบายใน list-item และย่อเหลือ 2 บรรทัด */
    .news-card.list-item .card-description {
        display: -webkit-box !important;
        /* แทนที่ display:none เดิม */
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        line-height: 1.6;
        max-height: calc(1.6em * 2);
        margin: 6px 0 10px;
    }

    /* Desktop กว้าง: ให้ฟีเจอร์ 2 ใบอยู่แถวเดียวกันพอดี */
    @media (min-width: 1200px) {
        .news-grid {
            /* ใช้ 12 คอลัมน์ เพื่อควบคุมระยะง่าย */
            grid-template-columns: repeat(12, minmax(0, 1fr));
            gap: 30px;
        }

        /* ให้แต่ละ featured กิน 6 คอลัมน์ (2 ใบต่อแถว) */
        .featured-news-wrapper {
            grid-column: span 6 !important;
        }

        /* ให้ลิสต์ข่าวกินเต็มแถวถัดไป */
        .news-list-wrapper {
            grid-column: 1 / -1 !important;
        }
    }

    /* Tablet: ยังวาง 2 คอลัมน์ได้อยู่ (แต่กว้างเท่ากัน) */
    @media (min-width: 992px) and (max-width: 1199.98px) {
        .news-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 24px;
        }

        .featured-news-wrapper {
            grid-column: auto !important;
        }

        .news-list-wrapper {
            grid-column: 1 / -1 !important;
        }
    }

    /* Mobile/Tablet เล็ก: ซ้อนเป็นคอลัมน์เดียว */
    @media (max-width: 991.98px) {
        .news-grid {
            grid-template-columns: 1fr !important;
            gap: 20px;
        }

        .featured-news-wrapper {
            grid-column: auto !important;
        }

        .news-list-wrapper {
            grid-column: 1 / -1 !important;
        }
    }

    /* =========================
   CARD & IMAGE: ปรับให้ยืดหยุ่น
   ========================= */

    /* เวอร์ชัน featured (การ์ดใหญ่) – ให้รูปสูงพอดีและไม่บิด */
    .featured-news-wrapper .card-image {
        padding: 0;
        /* เอา padding ออกเฉพาะ featured เพื่อให้รูปเต็มขอบการ์ด */
    }

    .featured-news-wrapper .card-image img {
        width: 100%;
        height: 320px;
        /* ปรับได้ตามดีไซน์ */
        object-fit: cover;
        display: block;
        border-top-left-radius: 12px;
        border-top-right-radius: 12px;
    }

    /* เวอร์ชัน list (การ์ดแนวนอน) – ให้กรอบรูปคงอัตราส่วน 16:9 และย่อขยายได้ */
    .news-card.list-item {
        gap: 16px;
    }

    .news-card.list-item .card-image {
        flex: 0 0 320px;
        /* กว้างฐาน */
        aspect-ratio: 16 / 9;
        /* รักษาอัตราส่วน */
        overflow: hidden;
        border-radius: 10px;
        padding: 0;
        /* กันรูปไม่เล็ก */
    }

    .news-card.list-item .card-image img {
        width: 100% !important;
        height: 100%;
        object-fit: cover;
    }

    /* ลดรูป list ให้พอดีจอเล็ก */
    @media (max-width: 768px) {
        .news-card.list-item {
            flex-direction: column;
            align-items: stretch;
        }

        .news-card.list-item .card-image {
            width: 100%;
            flex-basis: auto;
            aspect-ratio: 16/9;
        }
    }

    /* =========================
   DESCRIPTION: ตัดข้อความด้วย …
   ========================= */

    /* การ์ดปกติ: 3 บรรทัด */
    .card-description {
        display: -webkit-box !important;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        line-height: 1.7;
        max-height: calc(1.7em * 3);
        word-break: break-word;
    }

    /* การ์ด list: 2 บรรทัด */
    .news-card.list-item .card-description {
        display: -webkit-box !important;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        line-height: 1.6;
        max-height: calc(1.6em * 2);
        margin: 6px 0 10px;
    }

    .carousel-item.hero-slide {
        width: 100%;
        /* อัตราส่วน 16:9 ให้ภาพดูเท่ากันทุกหน้าจอ */
        aspect-ratio: 16 / 9;

        /* จำกัดไม่ให้สูงเกินหน้าจอ และยังคง 16:9 */
        max-height: 100vh;

        /* พื้นหลังเป็นรูป */
        background-position: center center;
        background-repeat: no-repeat;
        background-size: cover;
        /* ถ้าอยากเห็นรูปเต็มไม่ถูกตัด เปลี่ยนเป็น contain */
        background-color: #000;
        /* เวลามีขอบว่างจะเห็นเป็นสีดำ */
    }

    /* Fallback ถ้าเบราว์เซอร์ไม่รองรับ aspect-ratio */
    @supports not (aspect-ratio: 1 / 1) {
        .carousel-item.hero-slide {
            position: relative;
            height: 56.25vw;
            /* 16:9 -> 9/16 = 0.5625 * 100 = 56.25vw */
            max-height: 100vh;
        }
    }

    /* ปรับความสูงเมื่อจอเล็กมากให้ยังอ่านได้ดี */
    @media (max-width: 576px) {
        .carousel-item.hero-slide {
            aspect-ratio: auto;
            height: 60vh;

            /* มือถือให้สูง ~60% ของจอ */
        }
    }

    /* ปรับบนแท็บเล็ต */
    @media (min-width: 577px) and (max-width: 991px) {
        .carousel-item.hero-slide {
            aspect-ratio: 16 / 9;
            max-height: 80vh;
        }
    }

    .carousel-item.hero-slide {
        width: 100%;
        height: 100vh;
        /* เต็มความสูงจอ */
        max-height: 100vh;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        /* หรือ contain */
        background-color: #000;
    }

    /* ใช้กับ div.carousel-item ที่คุณเปลี่ยนเป็น background-image ไว้แล้ว */
    .carousel-item.hero-slide {
        width: 100%;
        aspect-ratio: 16 / 9;
        /* อัตราส่วน 16:9 */
        max-height: 100svh;
        /* สูงไม่เกินความสูงจอแบบ safe */
        background-position: center center;
        background-repeat: no-repeat;
        background-size: cover;
        /* ถ้าอยากเห็นรูปเต็มไม่โดนครอป -> ใช้ contain */
        background-color: #000;
        /* เวลามีช่องว่างจะเป็นสีดำ */
    }

    /* มือถือ: ลดความสูงเพื่อเลี่ยงแถบ address bar */
    @media (max-width: 576px) {
        .carousel-item.hero-slide {
            aspect-ratio: auto;
            height: 65svh;
            /* 60–70svh แล้วแต่ดีไซน์ */
            max-height: 20vh;
        }
    }

    /* แท็บเล็ต */
    @media (min-width: 577px) and (max-width: 991px) {
        .carousel-item.hero-slide {
            aspect-ratio: 16 / 9;
            max-height: 85svh;
        }
    }

    /* Fallback ถ้าเบราเซอร์ยังไม่รู้จัก svh/dvh */
    @supports not (height: 1svh) {
        .carousel-item.hero-slide {
            max-height: 100vh;
        }

        @media (max-width: 576px) {
            .carousel-item.hero-slide {
                height: 65vh;
            }
        }
    }
</style>
<?php $this->endSection() ?>
<?php $this->section('content'); ?>
<style>
    .hero-slide {
        position: relative;
        overflow: hidden;
    }

    .hero-slide .bg-video {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        /* ทำให้วิดีโอเต็มพื้นที่สไลด์ */
        z-index: 0;
    }

    .hero-slide .overlay-content {
        position: relative;
        z-index: 1;
        color: #fff;
        /* ให้ข้อความอ่านง่ายบนวิดีโอ */
        text-align: center;
    }

    .carousel-item video {
        width: 100%;
        height: auto;
        display: block;
        object-fit: cover;
    }
</style>
<div data-aos="fade-up" class="bg_content">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-bs-wrap="true">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item hero-slide active ">
                <video class="d-block w-100" autoplay muted loop playsinline>
                    <source src="<?= base_url('public/img/video.mp4') ?>" type="video/mp4">
                    เบราว์เซอร์ของคุณไม่รองรับการเล่นวิดีโอ
                </video>
            </div>
            <?php
            if (!empty($slideList)) {
                foreach ($slideList as $key => $row) {
            ?>

                    <div class="carousel-item hero-slide"
                        style="background-image: url('<?= base_url($row['image_path']) ?>');">
                    </div>
            <?php
                }
            }
            ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="container py-10 px-4 py-sm-0">
        <div class="row w-100">
            <!-- <div class="col-lg-3 mb-3" data-aos="fade-left">
                <a href="#">
                    <div class="custom-card shadow">
                        <div class="icon-wrapper">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </div>
                        <div class="custom-circle">
                            <p class="custom-circle-number mb-0">01</p>
                        </div>
                        <h1 class="custom-title">ใบรายชื่อนักเรียน</h1>
                        <p class="custom-description">
                            รายชื่อนักศึกษา ปีการศึกษา <?= date('Y') + 543 ?> <br> [ข้อมูลล่าสุด <?php echo $date_thai->dateFormat(date('Y-m-d'), 'thaidot') ?>]
                        </p>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 mb-3" data-aos="fade-up">
                <a href="">
                    <div class="custom-card shadow">
                        <div class="custom-circle">
                            <p class="custom-circle-number mb-0">02</p>
                        </div>
                        <div class="icon-wrapper">
                            <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                        </div>
                        <h1 class="custom-title">ปฏิทิน</h1>
                        <p class="custom-description">
                            ปฏิทินการศึกษา ปีการศึกษา <br> [ข้อมูลล่าสุด <?php echo $date_thai->dateFormat(date('Y-m-d'), 'thaidot') ?>]
                        </p>

                    </div>
                </a>

            </div>
            <div class="col-lg-3 mb-3" data-aos="fade-right">
                <a href="">
                    <div class="custom-card shadow">
                        <div class="custom-circle">
                            <p class="custom-circle-number mb-0">03</p>
                        </div>
                        <div class="icon-wrapper">
                            <i class="fa fa-table" aria-hidden="true"></i>
                        </div>
                        <h1 class="custom-title">ตารางเรียน</h1>
                        <p class="custom-description">
                            ตารางเรียน ปีการศึกษา <?= date('Y') + 543 ?> <br> [ข้อมูลล่าสุด <?php echo $date_thai->dateFormat(date('Y-m-d'), 'thaidot') ?>]
                        </p>

                    </div>
                </a>

            </div>
            <div class="col-lg-3 mb-3" data-aos="fade-right">
                <a href="">
                    <div class="custom-card shadow">
                        <div class="custom-circle">
                            <p class="custom-circle-number mb-0">04</p>
                        </div>
                        <div class="icon-wrapper">
                            <i class="fa fa-clipboard" aria-hidden="true"></i>
                        </div>

                        <h1 class="custom-title">งานพัสดุ</h1>

                        <p class="custom-description">
                            แบบฟอร์มงานพัสดุ ปีงบประมาณ <?= date('Y') + 543 ?> <br> [ข้อมูลล่าสุด <?php echo $date_thai->dateFormat(date('Y-m-d'), 'thaidot') ?>]
                        </p>
                    </div>
                </a>
            </div> -->
            <div class="col-lg-12" data-aos="fade-right">
                <div class=" row">
                    <?php
                    if (!empty($Link)) {
                        foreach ($Link as $row) {
                    ?>
                            <div class="col-lg-3 mb-3">
                                <a class="link-card bg-white shadow" href="<?= $row['box_url'] ?>" target="_blank">
                                    <div class="link-icon"><i class="fa <?= $row['box_icon'] ?>"></i></div>
                                    <span class="link-text"><?= $row['box_name'] ?></span>
                                </a>
                            </div>
                    <?php
                        }
                    }
                    ?>

                </div>
            </div>



        </div>
    </div>

    <?php
    if (!empty($news)) {
    ?>
        <div class="container py-6 px-5 flex-lg-column">
            <div class="text-center">
                <h1>
                    ข่าว ประกาศจากวิทยาลัยฯ
                </h1>
            </div>
            <div class="row">
                <?php
                foreach ($news as $row) {
                ?>
                    <div class="col-lg-3" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
                        <div class="unique-card-wrapper shadow">
                            <img class="unique-card-image" alt="Card Image" src="<?php echo base_url($row['image_path']) ?>">
                            <div class="unique-card-body p-0 pt-2">
                                <h2 class="unique-card-title fw-light " style="font-size: 16px;"><?php echo $row['title'] ?></h2>
                                <!-- <p class="unique-card-text"> -->
                                <?php // echo $row['description'] 
                                ?>
                                <!-- </p> -->
                                <div class="unique-card-footer justify-content-center ">
                                    <a href="<?php echo base_url('News/detail/' . $row['id']) ?>" class="unique-card-button text-center">ดูเพิ่มเติม</a>
                                </div>
                            </div>
                        </div>

                    </div>
                <?php
                }
                ?>
                <div class="col-lg-12 text-center py-5">
                    <button onclick="goNew()" class="btn btn-warning p-2">ประกาศทั้งหมด</ฟ>
                </div>
            </div>
        </div>
    <?php
    }
    ?>

    <div class="animated-section">
        <div class="animated-wrapper">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
        <div class="animated-banner">
            <div class="animated-content">
                <h2>เปิดประตูสู่ความโปร่งใส : Open to Transparency <br><b>ITA : Integrity and Transparency Assessment</b></h2>
                <br>
                <div class="text-center">
                    <a target="_blank" href="<?= $Link_ITA['box_url'] ?>" class="btn btn-indigo">รายละเอียดเพิ่มเติม คลิก!</a>
                </div>
            </div>
        </div>
    </div>
    <?php
    if (!empty($congratulate)) {
    ?>
        <div class="container py-6 px-5 flex-lg-column" style="flex-wrap:nowrap;">
            <div class="text-center">
                <h1>
                    แสดงความยินดี คณะครูและบุคลากรฯ
                </h1>
            </div>

            <div class="gallery">
                <div class="row">
                    <?php
                    foreach ($congratulate as $row) {
                    ?>
                        <div class="col-lg-6 text-center my-image mb-3" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000" data-src="<?php echo base_url($row['image_path']) ?>">
                            <img class="imgzoom-thumbnail" src="<?php echo base_url($row['image_path']) ?>" alt="" style="width:100%">
                        </div>
                    <?php
                    }
                    ?>

                </div>

            </div>
        </div>
    <?php
    }
    ?>
    <div class="container">
        <header class="page-header mx-auto mt-5">
            <h1>ข่าวประชาสัมพันธ์ทั่วไป</h1>
        </header>
        <div class="news-grid">
            <?php
            $idx = 0;
            if (!empty($news_original)) {
                foreach ($news_original as $key => $row) {
                    $idx++;
                    if ($idx <= 2) {
            ?>
                        <div class="featured-news-wrapper">
                            <a href="<?= base_url('News/detail/' . $row['id']) ?>" class="news-card">
                                <div class="card-image">
                                    <!-- ใช้รูปภาพจริงจากตัวแปร PHP ของคุณ -->
                                    <img src="<?php echo base_url($row['image_path']) ?>" alt="">
                                </div>
                                <div class="card-content">
                                    <h2 class="card-title"><?php echo $row['title'] ?></h2>
                                    <p class="card-description">
                                        <?php echo $row['description'] ?>
                                    </p>
                                    <div class="card-meta">
                                        <i class="fa fa-calendar-alt" aria-hidden="true"></i>
                                        <span><?php echo $date_thai->dateFormat($row['create_at'], 'thainottime') ?></span>
                                    </div>
                                </div>
                            </a>
                        </div>
            <?php
                    }
                }
            }
            ?>
            <div class="news-list-wrapper">
                <?php

                if (!empty($news_original)) {
                    foreach ($news_original as $key => $row) {
                        if ($key >= 2 && $key <= 3) {
                ?>
                            <!-- News Item 1 -->
                            <a href="<?= base_url('News/detail/' . $row['id']) ?>" class="news-card list-item">
                                <div class="card-image">
                                    <img src="<?php echo base_url($row['image_path']) ?>" alt="">
                                </div>
                                <div class="card-content">
                                    <h3 class="card-title"><?php echo $row['title'] ?></h3>
                                    <p class="card-description">
                                        <?php echo $row['description'] ?>
                                    </p>
                                    <div class="card-meta">
                                        <i class="fa fa-calendar-alt" aria-hidden="true"></i>
                                        <span><?php echo $date_thai->dateFormat($row['create_at'], 'thainottime') ?></span>
                                    </div>
                                </div>
                            </a>

                <?php
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <div class="animated-section-2 mt-6">
        <div class="container d-flex justify-content-center h-100 ">
            <div class="row w-100 justify-content-center">
                <div class="col-lg-3 mb-3 mb-lg-auto my-auto text-center">
                    <img src="<?php echo base_url('public/img/logo_cktc.png') ?>" style="max-width: 150px;" alt="" class="img-fluid">
                    <div class="font-30 Count">
                        <?= $personel_count['voc_count_all'] ?> คน
                    </div>
                    <div class="fw-light">
                        ผู้เรียนทั้งหมด (ข้อมูล ณ <?php echo $date_thai->dateFormat(date('Y-m-d'), 'thaidot') ?>)
                    </div>
                </div>
                <div class="col-lg-3 mb-3 mb-lg-auto my-auto text-center">
                    <img src="<?php echo base_url('public/img/logo_cktc.png') ?>" style="max-width: 150px;" alt="" class="img-fluid">
                    <div class="font-30 Count">
                        <?= $personel_count['voc_count'] ?> คน
                    </div>
                    <div class="fw-light">
                        ระดับ ปวช. (ข้อมูล ณ <?php echo $date_thai->dateFormat(date('Y-m-d'), 'thaidot') ?>)
                    </div>
                </div>
                <div class="col-lg-3 mb-3 mb-lg-auto my-auto text-center">
                    <img src="<?php echo base_url('public/img/logo_cktc.png') ?>" style="max-width: 150px;" alt="" class="img-fluid">
                    <div class="font-30 Count">
                        <?= $personel_count['hvoc_count'] ?> คน
                    </div>
                    <div class="fw-light">
                        ระดับ ปวส. (ข้อมูล ณ <?php echo $date_thai->dateFormat(date('Y-m-d'), 'thaidot') ?>)
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->endSection() ?>
<?php $this->section('scripts'); ?>
<script>
    const goNew = () => {
        window.location.href = "<?= base_url('news') ?>";
    }
    $(document).ready(function() {
        $('.gallery').magnificPopup({
            delegate: '.my-image', // เลือก element ที่คลิก
            type: 'image',
            gallery: {
                enabled: true // เปิด gallery mode (เลื่อนซ้ายขวาได้)
            },
            callbacks: {
                elementParse: function(item) {
                    // ดึง data-src จาก element ที่คลิก
                    item.src = item.el.data('src');
                }
            }
        });
    });


    function isInViewport(el) {
        const rect = el.getBoundingClientRect();
        return (
            rect.top >= 0 &&
            rect.bottom <= (window.innerHeight || document.documentElement.clientHeight)
        );
    }

    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    const counterStatus = new WeakMap();

    function animateCount($el) {
        if (counterStatus.get($el[0])) return;
        counterStatus.set($el[0], true);

        const target = parseInt($el.text().replace(/[^0-9]/g, ''), 10);
        jQuery({
            Counter: 0
        }).animate({
            Counter: target
        }, {
            duration: 1000,
            easing: 'swing',
            step: function() {
                $el.text(numberWithCommas(Math.ceil(this.Counter)) + ' คน');
            },
            complete: function() {
                setTimeout(() => {
                    counterStatus.set($el[0], false); // ให้เล่นซ้ำได้
                }, 1500);
            }
        });
    }

    $(window).on('scroll resize', function() {
        $('.Count').each(function() {
            if (isInViewport(this)) {
                animateCount($(this));
            }
        });
    });

    $(document).ready(function() {
        $(window).trigger('scroll');
    });
</script>

<?php $this->endSection() ?>