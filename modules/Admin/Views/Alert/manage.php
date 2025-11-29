<?php $this->extend('template/admin_layout') ?>
<?php $this->section('style'); ?>
<!-- เพิ่ม cropper.css -->
<!-- <link href="https://unpkg.com/cropperjs/dist/cropper.min.css" rel="stylesheet" /> -->
<style>
    #galleryImages,
    #cropper {
        width: 100%;
        float: left;
    }

    canvas {
        max-width: 100%;
        display: inline-block;
    }

    .img-preview {
        float: left;
        margin-top: 10px;
    }

    .singleImageCanvasContainer {
        /* max-width: 300px; */
        display: inline-block;
        position: relative;
        margin: 4px;
    }

    .singleImageCanvasCloseBtn {
        position: absolute;
        top: 5px;
        right: 5px;
        z-index: 10;
    }

    #cropImageBtn {
        display: none;
    }
</style>
<?php $this->endSection(); ?>

<?php $this->section('content'); ?>
<div class="card shadow shadow-lg">
    <form action="<?= base_url('admin/Alert/saveAlert') ?>" method="POST" autocomplete="off" enctype="multipart/form-data" class="once-only">
        <input type="hidden" name="id" value="<?= @$alert['alert_id'] ?? '' ?>">
        <div class="card-body">
            <div class="row">
                <div class="col-12 my-2">
                    <h3>ประกาศ</h3>
                </div>
                <div class="col-12 my-2">
                    <nav class="py-2" aria-label="breadcrumb" style="--bs-breadcrumb-divider: '/'">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('admin/Document') ?>">ประกาศ</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?= @$alert['alert_id'] ? 'แก้ไขข้อมูล' : 'เพิ่มข้อมูล' ?></li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="row justify-content-center my-2">
                <div class="col-md-10 mb-3">
                    <label for="title" class="form-label">หัวข้อ <span class="text-danger">*</span></label>
                    <input type="text" id="title" name="title" class="form-control" value="<?= @$alert['alert_name'] ?>" required>
                </div>
                <div class="col-md-10 mb-4">
                    <label for="" class="form-label">วันที่เผยแพร่ <span class="text-danger">*</span></label>
                    <input type="text" class="form-control date-picker" id="show_date" name="show_date" value="<?= $alert['show_date'] ? $alert['show_date'] :  date('d/m/Y') ?>" required>
                </div>
                <div class="col-lg-10 mb-3">
                    <input type="file" class="form-control" id="imageCropFileInput" multiple accept=".jpg,.jpeg,.png">
                    <input type="hidden" id="profile_img_data" name="profile_img_data">
                    <div class="img-preview"></div>
                    <div id="galleryImages"></div>
                    <div id="cropper" class="mb-3">
                        <canvas id="cropperImg" width="0" height="0"></canvas>
                        <div class="text-center">
                            <button class="cropImageBtn btn btn-info" id="cropImageBtn">Crop</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-10">
                    <div class="row">
                        <?php
                        if (!empty($alert_img)) {
                            $idx = 0;
                            foreach ($alert_img as $key => $row) {
                                $idx++;
                        ?>
                                <div class="col-lg-12 mb-3 photo_upload<?= $row['alert_image_id'] ?>">
                                    <input type="hidden" value="<?= $row['alert_image_id'] ?>" name="alert_img[<?= $idx ?>][alert_image_id]">
                                    <input type="hidden" value="<?= $row['alert_id'] ?>" name="alert_img[<?= $idx ?>][alert_id]">
                                    <input type="hidden" value="<?= $row['alert_image_path'] ?>" name="alert_img[<?= $idx ?>][alert_image_path]">
                                    <a target="_blank" href="<?= base_url($row['alert_image_path']) ?>">
                                        <i class="ti ti-photo-search" style="font-size: 20px;"></i><?= 'รูปที่ ' . $idx  ?>
                                    </a>
                                    <button type="button" onclick="deleteImage('<?= $row['alert_image_id'] ?>')" class="btn btn-danger btn-xs ms-3"><i class="ti ti-trash" style="font-size: 20px;"></i></button>
                                </div>
                        <?
                            }
                        }
                        ?>
                    </div>

                </div>
            </div>

            <div class="row justify-content-center my-2">
                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-success mx-1 btn-submit">
                        <i class="ti ti-device-floppy"></i> บันทึก
                    </button>
                    <a href="<?= base_url('admin/Document') ?>" class="btn btn-warning mx-1">
                        <i class="ti ti-chevron-left"></i> กลับ
                    </a>
                </div>
            </div>
        </div>
    </form>
</div>
<?php $this->endSection(); ?>

<?php $this->section('scripts'); ?>
<!-- เพิ่ม cropper.js -->
<!-- <script src="https://unpkg.com/cropperjs/dist/cropper.min.js"></script> -->
<script>
    const deleteImage = (id) => {
        $(`.photo_upload${id}`).remove();
    }
</script>
<script>
    let c;
    const galleryImagesContainer = document.getElementById('galleryImages');
    const imageCropFileInput = document.getElementById('imageCropFileInput');
    const cropperImageInitCanvas = document.getElementById('cropperImg');
    const cropImageButton = document.getElementById('cropImageBtn');
    let cropper = null;

    imageCropFileInput.addEventListener("change", function(event) {
        const files = event.target.files;
        galleryImagesContainer.innerHTML = '';
        if (!files.length) return;

        [...files].forEach((file, index) => {
            const reader = new FileReader();
            reader.onload = function(e) {
                const image = new Image();
                image.onload = function() {
                    const canvas = document.createElement('canvas');
                    canvas.width = image.naturalWidth;
                    canvas.height = image.naturalHeight;
                    const ctx = canvas.getContext('2d');
                    ctx.drawImage(image, 0, 0);

                    const container = document.createElement('div');
                    container.className = 'singleImageCanvasContainer';

                    const closeBtn = document.createElement('button');
                    closeBtn.innerText = 'Close';
                    closeBtn.className = 'singleImageCanvasCloseBtn btn btn-sm btn-danger';
                    closeBtn.onclick = () => {
                        container.remove();
                        urlConversion();
                        if (document.querySelectorAll('.singleImageCanvas').length === 0) {
                            resetCropper(); // 🔁 reset ทั้งหมด
                        }
                    };

                    canvas.className = 'imageCanvas singleImageCanvas';
                    canvas.onclick = function() {
                        cropInit(canvas);
                    };

                    container.appendChild(closeBtn);
                    container.appendChild(canvas);
                    galleryImagesContainer.appendChild(container);
                    urlConversion();
                };
                image.src = e.target.result;
            };
            reader.readAsDataURL(file);
        });
    });

    function resetCropper() {
        if (cropper) {
            cropper.destroy();
            cropper = null;
        }
        cropperImageInitCanvas.width = 0;
        cropperImageInitCanvas.height = 0;
        cropImageButton.style.display = 'none';
        document.getElementById('profile_img_data').value = '';
        imageCropFileInput.value = ''; // reset input file
    }

    function cropInit(canvasSource) {
        if (cropper) cropper.destroy();

        const ctx = canvasSource.getContext('2d');
        const imgData = ctx.getImageData(0, 0, canvasSource.width, canvasSource.height);

        cropperImageInitCanvas.width = canvasSource.width;
        cropperImageInitCanvas.height = canvasSource.height;
        const targetCtx = cropperImageInitCanvas.getContext('2d');
        targetCtx.putImageData(imgData, 0, 0);

        cropper = new Cropper(cropperImageInitCanvas, {
            aspectRatio: 1,
            viewMode: 1,
            preview: '.img-preview'
        });

        cropImageButton.style.display = 'inline-block';
        c = canvasSource;
    }

    cropImageButton.addEventListener("click", function(event) {
        event.preventDefault();
        image_crop();
    });

    function image_crop() {
        if (!cropper) return alert('กรุณาเลือกภาพที่ต้องการ Crop');

        const croppedCanvas = cropper.getCroppedCanvas({
            width: 1400,
            height: 900
        });
        const ctx = c.getContext('2d');
        c.width = 1400;
        c.height = 900;
        ctx.drawImage(croppedCanvas, 0, 0, 1400, 900);

        cropper.destroy();
        cropper = null;
        cropperImageInitCanvas.width = 0;
        cropperImageInitCanvas.height = 0;
        cropImageButton.style.display = 'none';

        urlConversion();
    }

    function urlConversion() {
        const canvases = document.querySelectorAll('.singleImageCanvas');
        let result = '';
        canvases.forEach(canvas => {
            result += canvas.toDataURL('image/jpeg') + 'img_url';
        });
        document.getElementById('profile_img_data').value = result;
    }
</script>
<?php $this->endSection(); ?>