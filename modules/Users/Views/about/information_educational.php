<?php $this->extend('template/users_layout') ?>

<?php $this->section('style'); ?>
<style>
    .philosophy-section {
        font-family: 'Sarabun', sans-serif;
        padding: 2rem;
        /* background-color: #f8f9fa; */
        color: #333;
    }

    .philosophy-section h1 {
        font-size: 1.75rem;
        color: #870100;
        margin-top: 2rem;
    }

    .philosophy-section blockquote {
        background: #fff3f3;
        border-left: 5px solid #870100;
        margin: 1rem 0;
        padding: 1rem 1.5rem;
        font-style: italic;
    }

    .philosophy-section blockquote p {
        margin: 0;
        font-size: 1.1rem;
    }

    .philosophy-section ul {
        padding-left: 1.2rem;
    }

    .philosophy-section li {
        margin-bottom: 1rem;
        line-height: 1.6;
    }

    .timeline {
        display: flex;
        flex-direction: column;
        margin: 20px auto;
        position: relative;
    }

    .timeline__event {
        margin-bottom: 20px;
        position: relative;
        display: flex;
        margin: 20px 0;
        border-radius: 6px;
        align-self: center;
        width: 50vw;
    }

    .timeline__event:nth-child(2n + 1) {
        flex-direction: row-reverse;
    }

    .timeline__event:nth-child(2n + 1) .timeline__event__date {
        border-radius: 0 6px 6px 0;
    }

    .timeline__event:nth-child(2n + 1) .timeline__event__content {
        border-radius: 6px 0 0 6px;
    }

    .timeline__event:nth-child(2n + 1) .timeline__event__icon::before {
        content: "";
        width: 2px;
        height: 100%;
        background: #f6a4ec;
        position: absolute;
        top: 0%;
        left: 50%;
        z-index: -1;
        transform: translateX(-50%);
        animation: fillTop 2s forwards 4s ease-in-out;
    }

    .timeline__event:nth-child(2n + 1) .timeline__event__icon::after {
        content: "";
        width: 100%;
        height: 2px;
        background: #f6a4ec;
        position: absolute;
        top: 50%;
        right: 0;
        z-index: -1;
        transform: translateY(-50%);
        animation: fillLeft 2s forwards 4s ease-in-out;
    }

    .timeline__event__title {
        font-size: 1.2rem;
        line-height: 1.4;
        text-transform: uppercase;
        font-weight: 600;
        color: #9251ac;
        letter-spacing: 1.5px;
    }

    .timeline__event__content {
        padding: 20px;
        box-shadow: 0 30px 60px -12px rgba(50, 50, 93, 0.25),
            0 18px 36px -18px rgba(0, 0, 0, 0.3),
            0 -12px 36px -8px rgba(0, 0, 0, 0.025);
        background: #fff;
        width: calc(40vw - 84px);
        border-radius: 0 6px 6px 0;
    }

    .timeline__event__date {
        color: #f6a4ec;
        font-size: 1.5rem;
        font-weight: 600;
        background: #9251ac;
        display: flex;
        align-items: center;
        justify-content: center;
        white-space: nowrap;
        padding: 0 20px;
        border-radius: 6px 0 0 6px;
    }

    .timeline__event__icon {
        display: flex;
        align-items: center;
        justify-content: center;
        color: #9251ac;
        padding: 40px;
        align-self: center;
        margin: 0 20px;
        background: #f6a4ec;
        border-radius: 100%;
        width: 40px;
        height: 40px;
        position: relative;
        box-shadow: 0 30px 60px -12px rgba(50, 50, 93, 0.25),
            0 18px 36px -18px rgba(0, 0, 0, 0.3),
            0 -12px 36px -8px rgba(0, 0, 0, 0.025);
    }

    .timeline__event__icon i {
        font-size: 32px;
    }

    .timeline__event__icon::before {
        content: "";
        width: 2px;
        height: 100%;
        background: #f6a4ec;
        position: absolute;
        top: 0%;
        z-index: -1;
        left: 50%;
        transform: translateX(-50%);
        animation: fillTop 2s forwards 4s ease-in-out;
    }

    .timeline__event__icon::after {
        content: "";
        width: 100%;
        height: 2px;
        background: #f6a4ec;
        position: absolute;
        left: 0%;
        z-index: -1;
        top: 50%;
        transform: translateY(-50%);
        animation: fillLeftOdd 2s forwards 4s ease-in-out;
    }

    .timeline__event__description {
        flex-basis: 60%;
    }

    .timeline__event--type2::after {
        background: #555ac0;
    }

    .timeline__event--type2 .timeline__event__date {
        color: #87bbfe;
        background: #555ac0;
    }

    .timeline__event--type2:nth-child(2n + 1) .timeline__event__icon::before,
    .timeline__event--type2:nth-child(2n + 1) .timeline__event__icon::after {
        background: #87bbfe;
    }

    .timeline__event--type2 .timeline__event__icon {
        background: #87bbfe;
        color: #555ac0;
    }

    .timeline__event--type2 .timeline__event__icon::before,
    .timeline__event--type2 .timeline__event__icon::after {
        background: #87bbfe;
    }

    .timeline__event--type2 .timeline__event__title {
        color: #555ac0;
    }

    .timeline__event--type3::after {
        background: #24b47e;
    }

    .timeline__event--type3 .timeline__event__date {
        color: #aff1b6;
        background: #24b47e;
    }

    .timeline__event--type3:nth-child(2n + 1) .timeline__event__icon::before,
    .timeline__event--type3:nth-child(2n + 1) .timeline__event__icon::after {
        background: #aff1b6;
    }

    .timeline__event--type3 .timeline__event__icon {
        background: #aff1b6;
        color: #24b47e;
    }

    .timeline__event--type3 .timeline__event__icon::before,
    .timeline__event--type3 .timeline__event__icon::after {
        background: #aff1b6;
    }

    .timeline__event--type3 .timeline__event__title {
        color: #24b47e;
    }

    .timeline__event:last-child .timeline__event__icon::before {
        content: none;
    }

    @media (max-width: 786px) {
        .timeline__event {
            flex-direction: column;
            align-self: center;
        }

        .timeline__event__content {
            width: 100%;
        }

        .timeline__event__icon {
            border-radius: 6px 6px 0 0;
            width: 100%;
            margin: 0;
            box-shadow: none;
        }

        .timeline__event__icon::before,
        .timeline__event__icon::after {
            display: none;
        }

        .timeline__event__date {
            border-radius: 0;
            padding: 20px;
        }

        .timeline__event:nth-child(2n + 1) {
            flex-direction: column;
            align-self: center;
        }

        .timeline__event:nth-child(2n + 1) .timeline__event__date {
            border-radius: 0;
            padding: 20px;
        }

        .timeline__event:nth-child(2n + 1) .timeline__event__icon {
            border-radius: 6px 6px 0 0;
            margin: 0;
        }
    }

    @keyframes fillLeft {
        100% {
            right: 100%;
        }
    }

    @keyframes fillTop {
        100% {
            top: 100%;
        }
    }

    @keyframes fillLeftOdd {
        100% {
            left: 100%;
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
            <div class="row">
                <div class="col-lg-6 text-center">
                    <img class="img-fluid" src="<?php echo base_url('public/img/logofve.png') ?>" alt="">
                </div>
                <div class="col-lg-6">
                    <div class="border-bottom border-3">
                        <h1>ประวัติความเป็นมา</h1>
                    </div>
                    <div class="mt-2  font-16  fw-light">
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
                        <div class="timeline">
                            <div class="timeline__event timeline__event--type1">
                                <div class="timeline__event__icon">
                                    <i class="lni-cake"></i>
                                </div>
                                <div class="timeline__event__date">ปรัชญา</div>
                                <div class="timeline__event__content">
                                    <div class="timeline__event__title">ปรัชญา</div>
                                    <div class="timeline__event__description">
                                        <p><?php echo $information['philosophy'] ?></p>
                                    </div>
                                </div>
                            </div>

                            <div class="timeline__event timeline__event--type2">
                                <div class="timeline__event__icon">
                                    <i class="lni-burger"></i>
                                </div>
                                <div class="timeline__event__date">อัตลักษณ์</div>
                                <div class="timeline__event__content">
                                    <div class="timeline__event__title">อัตลักษณ์</div>
                                    <div class="timeline__event__description">
                                        <p><?php echo $information['identity'] ?></p>
                                    </div>
                                </div>
                            </div>

                            <div class="timeline__event timeline__event--type3">
                                <div class="timeline__event__icon">
                                    <i class="lni-slim"></i>
                                </div>
                                <div class="timeline__event__date">เอกลักษณ์</div>
                                <div class="timeline__event__content">
                                    <div class="timeline__event__title">เอกลักษณ์</div>
                                    <div class="timeline__event__description">
                                        <p><?php echo $information['unique'] ?></p>
                                    </div>
                                </div>
                            </div>

                            <div class="timeline__event timeline__event--type1">
                                <div class="timeline__event__icon">
                                    <i class="lni-cake"></i>
                                </div>
                                <div class="timeline__event__date">วิสัยทัศน์</div>
                                <div class="timeline__event__content">
                                    <div class="timeline__event__title">วิสัยทัศน์</div>
                                    <div class="timeline__event__description">
                                        <p><?php echo $information['vision'] ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="timeline__event timeline__event--type3">
                                <div class="timeline__event__icon">
                                    <i class="lni-slim"></i>
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