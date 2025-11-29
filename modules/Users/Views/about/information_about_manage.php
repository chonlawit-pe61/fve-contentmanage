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
        <div class="py-5 w-100">
            <div class="row">
                <div class="col-lg-12 text-center ">
                    <div class="text-center">
                        <h1>คณะผู้บริหาร วิทยาลัยเทคนิคเชียงคำ</h1>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="row justify-content-center mt-3">
                        <?php
                        if (!empty($personal)) {
                            foreach ($personal as $key => $row) {
                                if (!empty($row['image_path'] && file_exists(ROOTPATH . $row['image_path']))) {
                                    $img_personal = base_url($row['image_path']);
                                } else {
                                    $img_personal = base_url('public/img/blank-member.jpg');
                                }
                        ?>
                                <div class="text-center col-lg-<?php echo $key == 0 ? '12' : '4' ?> mb-5">
                                    <img class="img-fluid" style="width: 250px;" src="<?php echo $img_personal ?>" alt="">
                                    <div class="mt-3">
                                        <h4>
                                            <?php echo $row['org_name'] ?>
                                        </h4>
                                        <h5>
                                            <?php echo $row['prename'] . ' ' .  $row['first_name'] . ' ' . $row['last_name'] ?>
                                        </h5>
                                    </div>
                                </div>
                        <?php
                            }
                        }
                        ?>
                    </div>
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