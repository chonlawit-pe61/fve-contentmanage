<?php $this->extend('template/users_layout') ?>

<?php $this->section('style'); ?>
<style>
    #carouselExampleCaptions .carousel-inner {
        height: 800px;
    }

    #carouselExampleCaptions .carousel-item {
        height: 100%;
        background: transparent;
    }

    #carouselExampleCaptions .carousel-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: top center;
    }

    /* 👉 สำหรับหน้าจอเล็ก (มือถือ) */
    @media (max-width: 768px) {
        #carouselExampleCaptions .carousel-inner {
            height: 220px;
        }
    }

    /* 👉 สำหรับแท็บเล็ต */
    @media (min-width: 769px) and (max-width: 1024px) {
        #carouselExampleCaptions .carousel-inner {
            height: 350px;
        }
    }

    /* --- Quick Links & Service Cards (v2) --- */
    .custom-card {
        background: #fff;
        border-radius: 20px;
        padding: 40px 30px;
        position: relative;
        overflow: hidden;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        border: 1px solid rgba(0, 0, 0, 0.02);
    }

    .custom-card:hover {
        transform: translateY(-15px);
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
    }

    /* Bottom Border Animation */
    .custom-card::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        width: 0;
        height: 4px;
        background: linear-gradient(90deg, var(--vc-primary), var(--vc-gold));
        transition: all 0.4s ease;
        transform: translateX(-50%);
    }

    .custom-card:hover::after {
        width: 100%;
    }

    /* Icon (Gradient Text) */
    .icon-wrapper {
        color: #800000;
        width: auto;
        height: auto;
        background: transparent;
        margin-bottom: 25px;
        transition: all 0.3s;
    }

    .custom-card:hover .icon-wrapper {
        transform: scale(1.1);
    }

    .icon-wrapper .fa {
        font-size: 4rem;
        background: -webkit-linear-gradient(45deg, var(--vc-primary), var(--vc-gold));
        -webkit-background-clip: text;
        transition: all 0.3s;
        display: inline-block;
    }

    /* Text */
    .custom-title {
        font-size: 1.3rem;
        font-weight: 800;
        color: #2c3e50;
        margin-bottom: 15px;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .custom-description {
        font-size: 0.9rem;
        color: #7f8c8d;
        line-height: 1.6;
        margin-bottom: 0;
        font-weight: 400;
    }

    /* Link Cards (v2) */
    .link-card {
        background: #fff;
        border-radius: 15px;
        padding: 25px;
        display: flex;
        align-items: center;
        text-decoration: none;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
        transition: all 0.3s;
        border: 1px solid rgba(0, 0, 0, 0.02);
        height: 100%;
    }

    .link-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        border-color: var(--vc-gold);
    }

    .link-icon {
        font-size: 1.8rem;
        background: -webkit-linear-gradient(45deg, var(--vc-primary), var(--vc-gold));
        -webkit-background-clip: text;
        margin-right: 20px;
        width: 50px;
        text-align: center;
    }

    .link-text {
        font-size: 1.1rem;
        font-weight: 700;
        color: #34495e;
    }

    .link-card:hover .link-text {
        color: var(--vc-primary);
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

    /* --- News Section --- */
    .page-header-custom {
        position: relative;
        margin-bottom: 3rem;
        text-align: center;
    }

    .page-header-custom h1 {
        font-size: 2.5rem;
        font-weight: 700;
        color: var(--vc-primary);
        display: inline-block;
        position: relative;
        padding-bottom: 15px;
        text-transform: uppercase;
    }

    .page-header-custom h1::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 100%;
        height: 4px;
        background: var(--vc-gold);
        border-radius: 2px;
    }

    .news-card-wrapper {
        background: #fff;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
        border: 1px solid rgba(0, 0, 0, 0.02);
    }

    .news-card-wrapper:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.12);
    }

    .news-image-container {
        position: relative;
        height: 220px;
        overflow: hidden;
    }

    .news-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .news-card-wrapper:hover .news-image {
        transform: scale(1.1);
    }

    .news-date-badge {
        position: absolute;
        top: 15px;
        right: 15px;
        background: var(--vc-gold);
        color: #000;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 700;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        z-index: 2;
    }

    .news-content {
        padding: 25px;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    /* --- Horizontal News Card (v2 Magazine Style) --- */
    .news-card-horizontal {
        background: #fff;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        display: flex;
        align-items: stretch;
        height: 100%;
        border: 1px solid rgba(0, 0, 0, 0.03);
        position: relative;
    }

    .news-card-horizontal:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.12);
        border-color: var(--vc-gold);
    }

    .news-horizontal-image {
        width: 40%;
        position: relative;
        overflow: hidden;
    }

    .news-horizontal-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s ease;
    }

    .news-card-horizontal:hover .news-horizontal-image img {
        transform: scale(1.15);
    }

    .news-horizontal-content {
        width: 60%;
        padding: 25px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        position: relative;
    }

    .news-date-badge-v2 {
        display: inline-block;
        background: linear-gradient(135deg, var(--vc-primary), var(--vc-primary-dark));
        color: #fff;
        padding: 5px 15px;
        border-radius: 50px;
        font-size: 0.8rem;
        font-weight: 700;
        margin-bottom: 15px;
        box-shadow: 0 4px 10px rgba(128, 0, 0, 0.2);
        align-self: flex-start;
    }

    .news-date-badge-v2 i {
        color: var(--vc-gold);
        margin-right: 5px;
    }

    .news-horizontal-title {
        font-size: 1.25rem;
        font-weight: 800;
        color: #1a1a1a;
        margin-bottom: 12px;
        line-height: 1.4;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        transition: color 0.3s;
    }

    .news-card-horizontal:hover .news-horizontal-title {
        color: var(--vc-primary);
    }

    .news-horizontal-desc {
        font-size: 0.95rem;
        color: #666;
        margin-bottom: 20px;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        line-height: 1.6;
    }

    .news-read-more-btn {
        background: linear-gradient(45deg, var(--vc-gold), var(--vc-gold-hover));
        color: #000;
        padding: 8px 20px;
        border-radius: 30px;
        font-weight: 700;
        font-size: 0.85rem;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        align-self: flex-start;
        transition: all 0.3s;
        box-shadow: 0 4px 15px rgba(255, 215, 0, 0.3);
    }

    .news-read-more-btn i {
        margin-left: 5px;
        transition: transform 0.3s;
    }

    .news-read-more-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(255, 215, 0, 0.5);
        color: #000;
    }

    .news-read-more-btn:hover i {
        transform: translateX(3px);
    }

    .news-title {
        font-size: 1.2rem;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 15px;
        line-height: 1.5;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .news-btn {
        margin-top: auto;
        align-self: flex-start;
        color: var(--vc-primary);
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        transition: all 0.3s;
        font-size: 0.95rem;
    }

    .news-btn i {
        margin-left: 8px;
        transition: transform 0.3s;
    }

    .news-btn:hover {
        color: var(--vc-gold-hover);
    }

    .news-btn:hover i {
        transform: translateX(5px);
    }

    .btn-view-all {
        background: linear-gradient(45deg, var(--vc-primary), var(--vc-primary-light));
        color: #fff;
        padding: 12px 40px;
        border-radius: 50px;
        font-weight: 600;
        border: none;
        transition: all 0.3s;
        box-shadow: 0 5px 15px rgba(128, 0, 0, 0.3);
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .btn-view-all:hover {
        background: linear-gradient(45deg, var(--vc-gold), var(--vc-gold-hover));
        color: #000;
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(255, 215, 0, 0.4);
    }

    /* --- Congratulate/Gallery Section --- */
    .gallery-card {
        background: #fff;
        border-radius: 15px;
        padding: 15px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        transition: all 0.4s ease;
        border: 1px solid rgba(0, 0, 0, 0.02);
        position: relative;
        overflow: hidden;
    }

    .gallery-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        border-color: var(--vc-gold);
    }

    .gallery-image-wrapper {
        border-radius: 10px;
        overflow: hidden;
        position: relative;
    }

    .gallery-image-wrapper img {
        width: 100%;
        height: auto;
        display: block;
        transition: transform 0.5s ease;
    }

    .gallery-card:hover .gallery-image-wrapper img {
        transform: scale(1.05);
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
        max-height: 1000px;

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

    /* --- Homepage Stats Section (Refined v3: Bold Metric) --- */
    .stats-section-home {
        background: transparent;
        padding: 20px 0 80px;
        position: relative;
        margin-top: 2rem;
    }

    /* Remove the overlay */
    .stats-section-home::before {
        display: none;
    }

    .home-stat-card {
        background: #fff;
        border-radius: 20px;
        padding: 50px 30px 40px;
        /* Increased top padding for floating icon */
        text-align: center;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.08);
        border: 1px solid rgba(0, 0, 0, 0.03);
        height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        position: relative;
        overflow: visible;
        /* Allow icon to float out */
        margin-top: 30px;
        /* Space for the floating icon */
    }




    .home-stat-icon {
        width: 90px;
        height: 90px;
        background: #fff;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        position: absolute;
        top: -45px;
        /* Float half out */
        left: 50%;
        transform: translateX(-50%);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        border: 4px solid #fff;
        /* White ring */
        transition: all 0.4s ease;
        z-index: 2;
    }

    .home-stat-card:hover .home-stat-icon {
        transform: translateX(-50%) scale(1.1);
        box-shadow: 0 15px 35px rgba(128, 0, 0, 0.2);
        border-color: var(--vc-gold);
    }

    .home-stat-icon i {
        font-size: 2.5rem;
        background: -webkit-linear-gradient(45deg, var(--vc-primary), #a01a1a);
        -webkit-background-clip: text;
        transition: all 0.3s;
    }

    .home-stat-card:hover .home-stat-icon i {
        background: -webkit-linear-gradient(45deg, var(--vc-gold), #ffc107);
        -webkit-background-clip: text;
    }

    .home-stat-number {
        font-size: 4.5rem;
        /* Huge Number */
        font-weight: 800;
        color: var(--vc-primary);
        line-height: 1;
        margin-top: 15px;
        margin-bottom: 5px;
        font-family: 'Sarabun', sans-serif;
        letter-spacing: -2px;
    }



    .home-stat-label {
        font-size: 1.3rem;
        font-weight: 700;
        color: #444;
        margin-bottom: 5px;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .home-stat-sub {
        font-size: 0.9rem;
        color: #999;
        font-weight: 400;
    }
</style>
<style>
    /* --- ITA Banner Redesign (Aurora Transparency) --- */
    .ita-banner-section {
        position: relative;
        width: 100%;
        padding: 60px 0;
        /* Reduced padding */
        overflow: hidden;
        background: linear-gradient(-45deg, #800000, #500000, #b8860b, #3a0000);
        background-size: 400% 400%;
        animation: auroraGradient 15s ease infinite;
        border-radius: 15px;
        /* Slightly reduced radius */
        margin: 3rem 0;
        /* Reduced margin */
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
    }

    @keyframes auroraGradient {
        0% {
            background-position: 0% 50%;
        }

        50% {
            background-position: 100% 50%;
        }

        100% {
            background-position: 0% 50%;
        }
    }

    /* Glassmorphism Card */
    .ita-glass-card {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border-radius: 15px;
        padding: 40px;
        /* Reduced padding */
        border: 1px solid rgba(255, 255, 255, 0.2);
        box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.3);
        max-width: 800px;
        /* Constrained width */
        margin: 0 auto;
        text-align: center;
        position: relative;
        z-index: 2;
    }

    .ita-title {
        color: #fff;
        font-size: 1.8rem;
        /* Slightly smaller font */
        font-weight: 700;
        margin-bottom: 0.8rem;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        line-height: 1.4;
    }

    .ita-subtitle {
        color: var(--vc-gold);
        font-size: 1.3rem;
        /* Slightly smaller subtitle */
        font-weight: 600;
        display: block;
        margin-top: 8px;
        text-transform: uppercase;
        letter-spacing: 2px;
    }

    /* Shining Button */
    .btn-ita-shine {
        position: relative;
        padding: 15px 40px;
        background: #fff;
        color: var(--vc-primary);
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        border-radius: 50px;
        text-decoration: none;
        overflow: hidden;
        transition: all 0.3s ease;
        display: inline-block;
        margin-top: 20px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }

    .btn-ita-shine:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
        color: var(--vc-primary);
    }

    .btn-ita-shine::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.8), transparent);
        transition: 0.5s;
    }

    .btn-ita-shine:hover::before {
        left: 100%;
    }

    /* Floating Particles (Subtle) */
    .ita-particles span {
        position: absolute;
        display: block;
        width: 20px;
        height: 20px;
        background: rgba(255, 255, 255, 0.2);
        animation: floatUp 25s linear infinite;
        bottom: -150px;
        border-radius: 50%;
    }

    .ita-particles span:nth-child(1) {
        left: 25%;
        width: 80px;
        height: 80px;
        animation-delay: 0s;
    }

    .ita-particles span:nth-child(2) {
        left: 10%;
        width: 20px;
        height: 20px;
        animation-delay: 2s;
        animation-duration: 12s;
    }

    .ita-particles span:nth-child(3) {
        left: 70%;
        width: 20px;
        height: 20px;
        animation-delay: 4s;
    }

    .ita-particles span:nth-child(4) {
        left: 40%;
        width: 60px;
        height: 60px;
        animation-delay: 0s;
        animation-duration: 18s;
    }

    .ita-particles span:nth-child(5) {
        left: 65%;
        width: 20px;
        height: 20px;
        animation-delay: 0s;
    }

    .ita-particles span:nth-child(6) {
        left: 75%;
        width: 110px;
        height: 110px;
        animation-delay: 3s;
    }

    @keyframes floatUp {
        0% {
            transform: translateY(0) rotate(0deg);
            opacity: 1;
            border-radius: 0;
        }

        100% {
            transform: translateY(-1000px) rotate(720deg);
            opacity: 0;
            border-radius: 50%;
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
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">

            <?php
            if (!empty($slideList)) {
                foreach ($slideList as $key => $row) {
            ?>

                    <div class="carousel-item hero-slide <?= $key == 0 ? 'active' : '' ?>">
                        <img src="<?= base_url($row['image_path']) ?>" class="d-block w-100" alt="Slide Image">
                    </div>
            <?php
                }
            }
            ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="container py-5" style="">
        <div class="row g-4 justify-content-center">
            <!-- Service Card 01 -->
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <a target="_blank" href="https://drive.google.com/drive/folders/1cns9nmI5wSM3FZymjaSuZX2cXmTUblaB" class="text-decoration-none">
                    <div class="custom-card">
                        <div class="icon-wrapper">
                            <i class="fa fa-user"></i>
                        </div>
                        <div>
                            <h1 class="custom-title">ใบรายชื่อนักเรียน</h1>
                            <p class="custom-description">
                                ตรวจสอบรายชื่อนักศึกษา <br> ปีการศึกษา <?= date('Y') + 543 ?>
                            </p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Service Card 02 -->
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <a href="#" class="text-decoration-none">
                    <div class="custom-card">
                        <div class="icon-wrapper">
                            <i class="fa fa-calendar-check-o"></i>
                        </div>
                        <div>
                            <h1 class="custom-title">ปฏิทินการศึกษา</h1>
                            <p class="custom-description">
                                ติดตามกำหนดการ <br> และกิจกรรมสำคัญ
                            </p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Service Card 03 -->
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <a href="#" class="text-decoration-none">
                    <div class="custom-card">
                        <div class="icon-wrapper">
                            <i class="fa fa-table"></i>
                        </div>
                        <div>
                            <h1 class="custom-title">ตารางเรียน</h1>
                            <p class="custom-description">
                                ดูตารางเรียนประจำปี <br> การศึกษา <?= date('Y') + 543 ?>
                            </p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Service Card 04 -->
            <!-- <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
                <a href="#" class="text-decoration-none">
                    <div class="custom-card">
                        <div class="icon-wrapper">
                            <i class="fa fa-clipboard"></i>
                        </div>
                        <div>
                            <h1 class="custom-title">งานพัสดุ</h1>
                            <p class="custom-description">
                                ดาวน์โหลดแบบฟอร์ม <br> และเอกสารต่างๆ
                            </p>
                        </div>
                    </div>
                </a>
            </div> -->

            <!-- Dynamic Links -->
            <div class="col-12 mt-4" data-aos="fade-up" data-aos-delay="500">
                <div class="row g-3">
                    <?php if (!empty($Link)) : foreach ($Link as $row) : ?>
                            <div class="col-lg-3 col-md-6">
                                <a class="link-card" href="<?= $row['box_url'] ?>" target="_blank">
                                    <div class="link-icon"><i class="fa <?= $row['box_icon'] ?>"></i></div>
                                    <span class="link-text"><?= $row['box_name'] ?></span>
                                </a>
                            </div>
                    <?php endforeach;
                    endif; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="container px-4 mb-5 justify-content-center">
        <div class="page-header-custom" data-aos="fade-up">
            <h1>จำนวนนักศึกษา ปีการศึกษา <?= $data_year['edu_year'] + 543 ?></h1>
        </div>
        <div class="stats-section-home w-100" data-aos="fade-up">
            <div class="row justify-content-center g-4">
                <!-- Item 1 -->
                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                    <div class="home-stat-card">
                        <div class="home-stat-icon">
                            <i class="fa fa-users"></i>
                        </div>
                        <div class="home-stat-number Count"><?= $personel_count['voc_count_all'] ?></div>
                        <div class="stat-divider"></div>
                        <div class="home-stat-label">ผู้เรียนทั้งหมด</div>
                        <div class="home-stat-sub">ข้อมูล ณ
                            <?php echo $date_thai->dateFormat(date('Y-m-d'), 'thaidot') ?></div>
                    </div>
                </div>
                <!-- Item 2 -->
                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                    <div class="home-stat-card">
                        <div class="home-stat-icon">
                            <i class="fa fa-graduation-cap"></i>
                        </div>
                        <div class="home-stat-number Count"><?= $personel_count['voc_count'] + $personel_count['voc_residue_count'] ?></div>
                        <div class="stat-divider"></div>
                        <div class="home-stat-label">ระดับ ปวช.</div>
                        <div class="home-stat-sub">ข้อมูล ณ
                            <?php echo $date_thai->dateFormat(date('Y-m-d'), 'thaidot') ?></div>
                    </div>
                </div>
                <!-- Item 3 -->
                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                    <div class="home-stat-card">
                        <div class="home-stat-icon">
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <div class="home-stat-number Count"><?= $personel_count['hvoc_count'] + $personel_count['hvoc_residue_count'] ?></div>
                        <div class="stat-divider"></div>
                        <div class="home-stat-label">ระดับ ปวส.</div>
                        <div class="home-stat-sub">ข้อมูล ณ
                            <?php echo $date_thai->dateFormat(date('Y-m-d'), 'thaidot') ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    /* การ์ดข่าว: เพิ่มเงาที่นุ่มนวลและมนขึ้น */
    .news-card-wrapper {
        background: #fff;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
        border: 1px solid #eee;
        display: flex;
        flex-direction: column;
    }

    .news-card-wrapper:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.12);
    }

    /* ปรับปรุงรูปภาพ: แก้ปัญหาภาพยืด/บีบ */
    .news-image-container {
        position: relative;
        width: 100%;
        padding-top: 60%;
        /* ทำเป็น Ratio 5:3 หรือปรับตามชอบ */
        overflow: hidden;
    }

    .news-image {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        /* สำคัญ: ทำให้ภาพไม่เบี้ยว */
        object-position: center;
    }

    /* ปรับปรุง Badge วันที่ */
    .news-date-badge {
        position: absolute;
        top: 12px;
        width: fit-content;
        left: 12px;
        background: rgba(255, 255, 255, 0.95);
        padding: 6px 12px;
        border-radius: 8px;
        font-size: 0.85rem;
        font-weight: bold;
        color: #333;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    /* ส่วนเนื้อหา */
    .news-content {
        padding: 20px;
    }

    .news-title {
        font-size: 1.1rem;
        line-height: 1.6;
        color: #2d3436;
        margin-bottom: 0;
        /* จำกัดบรรทัดไม่ให้ยาวเกินไป (Line Clamp) */
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    /* ปุ่มอ่านเพิ่มเติม */
    .news-btn {
        color: #007bff;
        transition: color 0.2s;
    }

    .news-btn:hover {
        color: #0056b3;
    }
</style>
<?php if (!empty($news)) { ?>
    <div class="container">
        <div class="d-flex justify-content-center w-100">
            <div class="page-header-custom text-center" data-aos="fade-up">
                <h1>ข่าวประกาศจากวิทยาลัยฯ</h1>
            </div>
        </div>
        <div class="row g-4 justify-content-start">

            <?php foreach ($news as $key => $row) { ?>
                <div class="col-12 col-sm-6 col-lg-4 col-xl-3" data-aos="fade-up" data-aos-delay="<?= 100 * ($key + 1) ?>">
                    <div class="news-card-wrapper h-100">
                        <div class="news-image-container">
                            <img class="news-image" alt="<?= $row['title'] ?>" src="<?= base_url($row['image_path']) ?>">
                            <div class="news-date-badge">
                                <i class="far fa-calendar-alt me-1"></i>
                                <?= $date_thai->dateFormat($row['create_at'], 'thainottime') ?>
                            </div>
                        </div>
                        <div class="news-content">
                            <h2 class="news-title"><?= $row['title'] ?></h2>
                            <div class="mt-3 pt-3 border-top d-flex justify-content-end">
                                <a href="<?= base_url('News/detail/' . $row['id']) ?>" class="news-btn text-decoration-none fw-bold">
                                    อ่านเพิ่มเติม <i class="fas fa-chevron-right ms-1" style="font-size: 0.8rem;"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
<?php } ?>



<div class="container px-4">
    <div class="ita-banner-section" data-aos="fade-up">
        <div class="ita-particles">
            <span></span><span></span><span></span><span></span><span></span><span></span>
        </div>
        <div class="ita-glass-card">
            <h2 class="ita-title">
                เปิดประตูสู่ความโปร่งใส : Open to Transparency
                <span class="ita-subtitle">ITA : Integrity and Transparency Assessment</span>
            </h2>
            <a target="_blank" href="<?= @$Link_ITA['box_url'] ?>" class="btn-ita-shine">
                รายละเอียดเพิ่มเติม คลิก!
            </a>
        </div>
    </div>
</div>
<?php if (!empty($congratulate)) { ?>
    <div class="container py-5 px-4 justify-content-center">
        <div class="page-header-custom" data-aos="fade-up">
            <h1>แสดงความยินดี คณะครูและบุคลากรฯ</h1>
        </div>
        <div class="row g-4 justify-content-center gallery">
            <?php foreach ($congratulate as $row) { ?>
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="gallery-card my-image" data-src="<?= base_url($row['image_path']) ?>">
                        <div class="gallery-image-wrapper">
                            <img class="imgzoom-thumbnail" src="<?= base_url($row['image_path']) ?>" alt="Congratulate Image">
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
<?php } ?>
<?php
if (!empty($news_original)) {
?>
    <div class="container pb-5 justify-content-center ">
        <div class="page-header-custom" data-aos="fade-up">
            <h1>ข่าวประชาสัมพันธ์ทั่วไป</h1>
        </div>
        <div class="row g-5">
            <?php
            if (!empty($news_original)) {
                foreach ($news_original as $key => $row) {
                    if ($key < 6) {
            ?>
                        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="<?= 100 * ($key + 1) ?>">
                            <a href="<?php echo base_url('News/detail/' . $row['id']) ?>" class="text-decoration-none">
                                <div class="news-card-horizontal">
                                    <div class="news-horizontal-image ">
                                        <img src="<?= base_url($row['image_path']) ?>" alt="<?php echo $row['title'] ?>">
                                    </div>
                                    <div class="news-horizontal-content">
                                        <div class="news-date-badge-v2 text-dark">
                                            <i class="fa fa-calendar-check-o"></i>
                                            <?php echo $date_thai->dateFormat($row['create_at'], 'thainottime') ?>
                                        </div>
                                        <h3 class="news-horizontal-title"><?php echo $row['title'] ?></h3>
                                        <p class="news-horizontal-desc">
                                            <?php echo strip_tags($row['description']) ?>
                                        </p>
                                        <span class="news-read-more-btn">
                                            อ่านต่อ <i class="fa fa-arrow-right"></i>
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </div>
            <?php
                    }
                }
            }
            ?>
        </div>
    </div>
<?php
}
?>
<style>
    /* Container Background */
    .reward-section-v2 {
        padding: 100px 0;
        background-color: #fcfcfc;
    }

    /* Trophy Style Card */
    .reward-item-card {
        background: #fff;
        border-radius: 20px;
        padding: 15px;
        height: 100%;
        transition: all 0.3s ease-in-out;
        border: 1px solid #eee;
        text-align: center;
        /* ปรับเป็นกึ่งกลางให้ดูเหมือนรางวัล */
        position: relative;
    }

    .reward-item-card:hover {
        transform: translateY(-15px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
        border-color: #d4af37;
        /* ขอบสีทองเมื่อ Hover */
    }

    /* Image Hexagon or Rounded */
    .reward-img-holder {
        width: 100%;
        height: 250px;
        border-radius: 15px;
        overflow: hidden;
        margin-bottom: 20px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .reward-img-holder img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .reward-item-card:hover .reward-img-holder img {
        transform: scale(1.08);
    }

    /* Date Floating */
    .reward-date-tag {
        position: absolute;
        top: 25px;
        right: 25px;
        background: rgba(255, 215, 0, 0.9);
        /* สีทอง */
        color: #000;
        padding: 4px 12px;
        border-radius: 8px;
        font-size: 12px;
        font-weight: bold;
        backdrop-filter: blur(5px);
    }

    .reward-title-v2 {
        font-size: 1.15rem;
        font-weight: 700;
        color: #333;
        margin-bottom: 15px;
        height: 3em;
        /* ล็อคความสูงหัวข้อ */
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
    }

    .reward-desc-v2 {
        font-size: 0.9rem;
        color: #777;
        margin-bottom: 20px;
        line-height: 1.6;
    }

    .reward-link-v2 {
        display: inline-block;
        padding: 10px 25px;
        background: #f8f9fa;
        color: #333;
        border-radius: 50px;
        font-weight: 600;
        font-size: 0.85rem;
        transition: all 0.3s;
        border: 1px solid #ddd;
    }

    .reward-item-card:hover .reward-link-v2 {
        background: #333;
        color: #fff;
        border-color: #333;
        text-decoration: none;
    }
</style>

<?php if (!empty($reward)): ?>
    <section class="reward-section-v2">
        <div class="container justify-content-center">
            <div class="page-header-custom text-center mb-5" data-aos="fade-up">
                <h1 class="display-5 fw-bold">ผลงานและความสำเร็จ</h1>
            </div>

            <div class="row g-4">
                <?php foreach ($reward as $key => $row): if ($key < 6): ?>
                        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="<?= 100 * ($key + 1) ?>">
                            <div class="reward-item-card">
                                <div class="reward-date-tag">
                                    <i class="fa fa-calendar-check-o"></i>
                                    <?= $date_thai->dateFormat($row['create_at'], 'thainottime') ?>
                                </div>

                                <div class="reward-img-holder">
                                    <img src="<?= base_url($row['image_path']) ?>" alt="<?= $row['title'] ?>">
                                </div>

                                <div class="reward-info">
                                    <h3 class="reward-title-v2"><?= $row['title'] ?></h3>
                                    <p class="reward-desc-v2">
                                        <?= mb_strimwidth(strip_tags($row['description']), 0, 100, "...") ?>
                                    </p>
                                    <a href="<?= base_url('Reward/detail/' . $row['id']) ?>" class="reward-link-v2">
                                        ดูรายละเอียดรางวัล <i class="fa fa-trophy ms-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                <?php endif;
                endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<style>
    /* ปรับแต่งความโค้งและเงาของ Modal */
    #announcementModal .modal-content {
        border: none;
        border-radius: 15px;
        overflow: hidden;
        /* ป้องกันรูปภาพล้นขอบโค้ง */
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    }

    /* ปรับแต่ง Header */
    #announcementModal .modal-header {
        background-color: #fff;
        z-index: 10;
    }

    /* ปรับแต่ง Carousel */
    #announcementModal .carousel-item img {
        max-height: 70vh;
        /* จำกัดความสูงไม่ให้ยาวเกินหน้าจอ */
        object-fit: contain;
        /* ให้รูปภาพแสดงครบถ้วน */
        background-color: #f8f9fa;
    }

    /* ตกแต่งปุ่มปิด */
    #announcementModal .btn-close {
        background-color: #eee;
        border-radius: 50%;
        padding: 0.5rem;
        transition: 0.3s;
    }

    #announcementModal .btn-close:hover {
        background-color: #ddd;
    }

    /* ปรับแต่ง Footer ให้ดูสะอาดตา */
    #announcementModal .modal-footer {
        background-color: #fff;
        padding-bottom: 15px;
    }
</style>
<style>
    /* บังคับให้ Modal Dialog อยู่ตรงกลางแนวตั้งเสมอ */
    #announcementModal .modal-dialog {
        display: flex;
        align-items: flex-start;
        min-height: calc(100% - 3.5rem);
        /* สำหรับ Bootstrap 5 */
    }

    /* จัดการรูปภาพไม่ให้ดันหน้าจอจนเพี้ยน */
    #announcementModal .carousel-item img {
        width: 100%;
        height: auto;
        max-height: 80vh;
        /* ไม่ให้สูงเกิน 80% ของหน้าจอ */
        object-fit: contain;
    }

    /* ซ่อน scrollbar ของตัว modal เองถ้าไม่จำเป็น */
    .modal-open {
        overflow: hidden;
    }
</style>

<!-- Announcement Modal -->
<?php if (!empty($alert)): ?>
    <div class="modal fade" id="announcementModal" tabindex="-1" aria-labelledby="announcementModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title my-1 py-1" id="announcementModalLabel">ประกาศจากวิทยาลัย</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0">
                    <div id="alertCarousel" class="carousel slide" data-bs-ride="carousel">
                        <?php if (count($alert) > 1): ?>
                            <div class="carousel-indicators">
                                <?php foreach ($alert as $key => $item): ?>
                                    <button type="button" data-bs-target="#alertCarousel" data-bs-slide-to="<?= $key ?>" class="<?= $key === 0 ? 'active' : '' ?>" aria-current="<?= $key === 0 ? 'true' : 'false' ?>" aria-label="Slide <?= $key + 1 ?>"></button>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                        <div class="carousel-inner">
                            <?php foreach ($alert as $key => $item): ?>
                                <div class="carousel-item <?= $key === 0 ? 'active' : '' ?>">
                                    <?php if (!empty($item['alert_image_path'])): ?>
                                        <img src="<?= base_url($item['alert_image_path']) ?>" class="d-block w-100" alt="<?= esc($item['alert_name']) ?>" style="border-radius: 0 0 5px 5px;">
                                    <?php else: ?>
                                        <div class="p-5 text-center">
                                            <h3><?= esc($item['alert_name']) ?></h3>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <?php if (count($alert) > 1): ?>
                            <button class="carousel-control-prev" type="button" data-bs-target="#alertCarousel" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#alertCarousel" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="modal-footer justify-content-between border-0 pt-2">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="dontShowToday">
                        <label class="form-check-label text-muted" for="dontShowToday" style="font-size: 0.9rem;">
                            ไม่แสดงอีกในวันนี้
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php $this->endSection() ?>
<?php $this->section('scripts'); ?>
<script>
    const goNew = () => {
        window.location.href = "<?= base_url('news') ?>";
    }

    $(document).ready(function() {
        // --- Announcement Modal Logic ---
        <?php if (!empty($alert)): ?>
            var myModal = new bootstrap.Modal(document.getElementById('announcementModal'), {
                keyboard: false
            });

            // Check Input Checkbox
            var dontShowCheckbox = document.getElementById('dontShowToday');

            // Function to set cookie
            function setCookie(name, value, days) {
                var expires = "";
                if (days) {
                    var date = new Date();
                    date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                    expires = "; expires=" + date.toUTCString();
                }
                document.cookie = name + "=" + (value || "") + expires + "; path=/";
            }

            // Function to get cookie
            function getCookie(name) {
                var nameEQ = name + "=";
                var ca = document.cookie.split(';');
                for (var i = 0; i < ca.length; i++) {
                    var c = ca[i];
                    while (c.charAt(0) == ' ') c = c.substring(1, c.length);
                    if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
                }
                return null;
            }

            // Check if we should show the modal
            var today = new Date().toISOString().slice(0, 10); // YYYY-MM-DD
            var lastShownDate = getCookie('hideAnnouncement');

            if (lastShownDate !== today) {
                myModal.show();
            }

            // Handle Modal Close
            var modalElement = document.getElementById('announcementModal');
            modalElement.addEventListener('hide.bs.modal', function(event) {
                if (dontShowCheckbox.checked) {
                    setCookie('hideAnnouncement', today, 1); // Expire in 1 day
                }
            });
        <?php endif; ?>
        // --------------------------------

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