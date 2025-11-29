<?php $this->extend('template/users_layout') ?>

<?php $this->section('style'); ?>
<style>
</style>

</style>
<?php $this->endSection() ?>
<?php $this->section('content'); ?>
<div data-aos="fade-up" class="bg_content">
    <div class="container px-5">
        <div class="py-5 w-100">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h3>นโยบายไม่รับของขวัญและของกำนัลทุกชนิด</h3>
                </div>
                <div class="col-lg-12 mt-3">
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