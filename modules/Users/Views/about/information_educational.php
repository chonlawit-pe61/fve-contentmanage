<?php $this->extend('template/users_layout') ?>

<?php $this->section('style'); ?>
<style>
    /* --- History Section Refinement --- */
    .history-image-wrapper {
        position: relative;
        padding: 15px;
        border: 1px solid rgba(255, 215, 0, 0.3);
        border-radius: 15px;
        display: inline-block;
        background: #fff;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.05);
        max-width: 350px;
        margin-bottom: 20px;
        transition: transform 0.3s ease;
    }

    .history-image-wrapper:hover {
        transform: translateY(-5px);
    }

    .history-image-wrapper img {
        border-radius: 10px;
        width: 100%;
        height: auto;
        display: block;
    }

    .history-content {
        font-size: 1.15rem;
        line-height: 1.9;
        color: #444;
        text-align: left;
    }

    .history-content p {
        margin-bottom: 1.5rem;
        text-indent: 2rem;
    }

    /* --- Royal Timeline Theme --- */
    .timeline {
        display: flex;
        flex-direction: column;
        margin: 40px auto;
        position: relative;
    }

    /* Timeline Line */
    .timeline::before {
        content: '';
        position: absolute;
        top: 0;
        left: 50%;
        width: 4px;
        height: 100%;
        background: rgba(128, 0, 0, 0.1); /* Subtle Red Trace */
        transform: translateX(-50%);
        border-radius: 2px;
    }

    .timeline__event {
        margin-bottom: 40px;
        position: relative;
        display: flex;
        margin: 30px 0;
        border-radius: 15px;
        align-self: center;
        width: 100%;
        max-width: 1000px;
    }

    .timeline__event:nth-child(2n + 1) {
        flex-direction: row-reverse;
    }

    /* Content Card */
    .timeline__event__content {
        padding: 30px;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.08);
        background: #fff;
        width: 45%;
        border-radius: 15px;
        border-top: 4px solid var(--vc-gold); /* Gold Top Border */
        position: relative;
        transition: all 0.3s ease;
    }

    .timeline__event__content:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 45px rgba(0, 0, 0, 0.12);
    }

    .timeline__event__title {
        font-size: 1.4rem;
        line-height: 1.4;
        text-transform: uppercase;
        font-weight: 700;
        color: var(--vc-primary); /* Red Title */
        letter-spacing: 1px;
        margin-bottom: 15px;
        border-bottom: 2px solid rgba(255, 215, 0, 0.3);
        padding-bottom: 10px;
        display: inline-block;
    }

    .timeline__event__description p {
        color: #666;
        font-size: 1.05rem;
        line-height: 1.7;
        margin: 0;
    }

    /* Date/Label Badge */
    .timeline__event__date {
        color: #fff;
        font-size: 1.2rem;
        font-weight: 600;
        background: var(--vc-primary); /* Red Background */
        display: flex;
        align-items: center;
        justify-content: center;
        white-space: nowrap;
        padding: 10px 25px;
        border-radius: 50px;
        position: absolute;
        top: -20px;
        left: 30px;
        box-shadow: 0 5px 15px rgba(128, 0, 0, 0.3);
        z-index: 2;
    }

    .timeline__event:nth-child(2n + 1) .timeline__event__date {
        left: auto;
        right: 30px;
    }

    /* Icon Circle */
    .timeline__event__icon {
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--vc-gold);
        background: #fff;
        border: 4px solid var(--vc-primary);
        border-radius: 50%;
        width: 60px;
        height: 60px;
        position: absolute;
        left: 50%;
        top: 30px;
        transform: translateX(-50%);
        box-shadow: 0 0 0 8px rgba(255, 255, 255, 0.8), 0 10px 20px rgba(0,0,0,0.1);
        z-index: 3;
    }

    .timeline__event__icon i {
        font-size: 28px;
    }

    /* Connecting Lines (Animated) */
    .timeline__event__icon::before,
    .timeline__event__icon::after,
    .timeline__event:nth-child(2n + 1) .timeline__event__icon::before,
    .timeline__event:nth-child(2n + 1) .timeline__event__icon::after {
        display: none; /* Removed old lines for cleaner look */
    }

    /* Responsive */
    @media (max-width: 768px) {
        .timeline::before {
            left: 30px;
        }

        .timeline__event {
            flex-direction: column;
            align-items: flex-start;
            margin-bottom: 50px;
            padding-left: 60px;
            width: 100%;
        }

        .timeline__event:nth-child(2n + 1) {
            flex-direction: column;
            align-items: flex-start;
        }

        .timeline__event__content {
            width: 100%;
            border-radius: 15px;
        }

        .timeline__event__icon {
            left: 30px;
            top: 0;
            width: 50px;
            height: 50px;
        }

        .timeline__event__icon i {
            font-size: 22px;
        }

        .timeline__event__date {
            position: relative;
            top: auto;
            left: auto;
            right: auto;
            margin-bottom: 15px;
            display: inline-flex;
        }
    }

    .font-16 {
        font-size: 16px;
    }
</style>

</style>
<?php $this->endSection() ?>
<?php $this->section('content'); ?>
<div data-aos="fade-up" class="bg_content">
    <div class="container px-5">
        <div class="py-5">
            <div class="row align-items-start">
                <div class="col-lg-12 text-center mb-4 mb-lg-0" data-aos="fade-right">
                    <div class="history-image-wrapper">
                        <img src="<?php echo base_url('public/img/logofve.png') ?>" alt="College Logo">
                    </div>
                </div>
                <div class="col-lg-12" data-aos="fade-left">
                    <div class="border-bottom border-3 mb-4" style="border-color: var(--vc-gold) !important; display: inline-block;">
                        <h1 style="color: var(--vc-primary); font-weight: 700;">ประวัติความเป็นมา</h1>
                    </div>
                    <div class="history-content">
                        <?php echo $information['history'] ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <section>
        <div class="py-5">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <h1>วีดิทัศน์แนะนำวิทยาลัยฯ</h1>
                    </div>
                </div>
                <div class="col-lg-12 text-center">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/n6Bm-P7x0XI?si=2KRfUhjAs5OXQoL5" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container d-flex justify-content-center">
            <div class="py-5">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <h1>วิสัยทัศน์และพันธกิจ</h1>
                        </div>
                    </div>
                    <div class="container">
                        <div class="timeline w-100">
                            <div class="timeline__event" data-aos="fade-up">
                                <div class="timeline__event__icon">
                                    <i class="fa fa-lightbulb-o"></i>
                                </div>
                                <div class="timeline__event__date">ปรัชญา</div>
                                <div class="timeline__event__content">
                                    <div class="timeline__event__title">ปรัชญา</div>
                                    <div class="timeline__event__description">
                                        <p><?php echo $information['philosophy'] ?></p>
                                    </div>
                                </div>
                            </div>

                            <div class="timeline__event" data-aos="fade-up">
                                <div class="timeline__event__icon">
                                    <i class="fa fa-fingerprint"></i>
                                </div>
                                <div class="timeline__event__date">อัตลักษณ์</div>
                                <div class="timeline__event__content">
                                    <div class="timeline__event__title">อัตลักษณ์</div>
                                    <div class="timeline__event__description">
                                        <p><?php echo $information['identity'] ?></p>
                                    </div>
                                </div>
                            </div>

                            <div class="timeline__event" data-aos="fade-up">
                                <div class="timeline__event__icon">
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="timeline__event__date">เอกลักษณ์</div>
                                <div class="timeline__event__content">
                                    <div class="timeline__event__title">เอกลักษณ์</div>
                                    <div class="timeline__event__description">
                                        <p><?php echo $information['unique'] ?></p>
                                    </div>
                                </div>
                            </div>

                            <div class="timeline__event" data-aos="fade-up">
                                <div class="timeline__event__icon">
                                    <i class="fa fa-eye"></i>
                                </div>
                                <div class="timeline__event__date">วิสัยทัศน์</div>
                                <div class="timeline__event__content">
                                    <div class="timeline__event__title">วิสัยทัศน์</div>
                                    <div class="timeline__event__description">
                                        <p><?php echo $information['vision'] ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="timeline__event" data-aos="fade-up">
                                <div class="timeline__event__icon">
                                    <i class="fa fa-rocket"></i>
                                </div>
                                <div class="timeline__event__date">พันธกิจ</div>
                                <div class="timeline__event__content">
                                    <div class="timeline__event__title">พันธกิจ</div>
                                    <div class="timeline__event__description">
                                        <p>
                                            <?php echo $information['mission'] ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="py-5 w-100">
                <div class="row ">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <h1>สถานที่ตั้ง</h1>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3752.4448199388485!2d99.16360617611326!3d19.863430481510086!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30d0cd264441a7db%3A0x2f035cac3d650328!2z4Lin4Li04LiX4Lii4Liy4Lil4Lix4LiB4Liy4Lij4Lit4Liy4LiK4Li14Lie4Lid4Liy4LiH!5e0!3m2!1sen!2sth!4v1746429237699!5m2!1sen!2sth" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <div class="col-lg-6">
                        <div class="text-center">
                            <h1>วิทยาลัการอาชีพฝาง</h1>

                        </div>
                        <div class="fw-light">
                            <?php echo $information['address'] . ' ' . $information['phone'] ?>

                        </div>
                    </div>


                </div>
            </div>
        </div>
    </section>
</div>
<?php $this->endSection() ?>
<?php $this->section('scripts'); ?>
<script>

</script>

<?php $this->endSection() ?>