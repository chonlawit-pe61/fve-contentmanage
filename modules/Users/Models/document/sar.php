<?php $this->extend('template/users_layout') ?>

<?php $this->section('style'); ?>
<style>
    .sar-banner {
        text-align: center;
        color: white;
        background: radial-gradient(circle, #aa0000 0%, #880000 100%);
        padding: 40px 20px;
    }


    .sar-banner .title {
        font-size: 1.8rem;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .sar-banner .subtitle {
        font-size: 1.5rem;
        font-weight: bold;
    }

    @media (max-width: 600px) {
        .sar-banner .title {
            font-size: 1.3rem;
        }

        .sar-banner .subtitle {
            font-size: 1.1rem;
        }
    }
</style>
</head>

<?php $this->endSection() ?>
<?php $this->section('content'); ?>
<div data-aos="fade-up" class="bg_content">
    <div class="container">
        <div class="py-5 px-5 w-100">
            <div class="text-center">
                <h1><?php echo $publicDocument['title'] ?></h1>
            </div>
            <div class="row w-100">
                <div class="col-lg-12">
                    <div class="sar-banner rounded-3">
                        <div class="logo">
                            <img class="img-fluid" style="height: 140px;" src="<?php echo base_url('public/img/logo_cktc.png') ?>" alt="">
                        </div>
                        <div class="title"><?php echo $publicDocument['title'] ?></div>
                        <div class="subtitle">วิทยาลัยเทคนิคเชียงคํา</div>
                    </div>
                </div>
                <div class="col-lg-12 mt-3">
                    <?php
                    if (!empty($documentFile)) {
                        foreach ($documentFile as $row) {
                    ?>
                            <a href="<?php echo base_url($row['file_path']) ?>" download class="btn btn-outline-info p-3 w-100 mb-3 fs-5">
                                <?php echo $row['title'] ?>
                            </a>
                    <?php
                        }
                    }
                    ?>
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