<?php $this->extend('template/admin_layout') ?>
<?php $this->section('style'); ?>
<style>

</style>
<?php $this->endSection(); ?>
<?php $this->section('content'); ?>



<div class="card shadow shadow-lg">
    <div class="card-body">
        <form action="<?php echo base_url('admin/course/manage_course_content') ?>" method="post">
            <input type="hidden" name="course_id" id="" value="<?php echo $id ?>">
            <div class="row">
                <div class="col-12 my-2">
                    <h3>คอนเทนต์หลักสูตร </h3>
                </div>
                <div class="col-lg-12 text-center">
                    <h5 class="text-start">
                        รูปหน้าปก
                    </h5>
                    <div>
                        <?php if (!empty($course['course_img'])) { ?>
                            <img id="personel_image_display" src="<?= base_url($course['course_img']) ?>" alt="" class="img-fluid">
                        <?php } else { ?>
                            <img id="personel_image_display" src="<?= base_url('public/img/banner1.jpg') ?>" alt="" class="img-fluid my-2">
                        <?php } ?>
                    </div>

                    <input type="hidden" id="image_personel" name="base64_image">

                    <button type="button" class="btn btn-primary text-center my-3" data-bs-toggle="modal" data-bs-target="#cropperModal">
                        อัพโหลดรูปภาพ
                    </button>
                    <div class="modal fade" id="cropperModal" tabindex="-1" aria-labelledby="cropperModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="cropperModalLabel">อัพโหลดรูปภาพ</h5>
                                    <button
                                        type="button"
                                        class="btn-close"
                                        data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Input อัปโหลดรูป -->
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <input
                                                type="file"
                                                id="uploadImage"
                                                class="form-control mb-3"
                                                accept="image/*" />
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="cropper-container cropper-bg">
                                                <img
                                                    id="cropImage"
                                                    alt="Image to crop"
                                                    style="max-width: 100%; display: none" />
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="preview-container" id="preview"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button
                                        type="button"
                                        class="btn btn-secondary"
                                        data-bs-dismiss="modal">
                                        ยกเลิก
                                    </button>
                                    <button type="button" id="cropButton" class="btn btn-primary">
                                        บันทึก
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 my-2">
                    <h5>
                        หลักสูตร ปวช.
                    </h5>
                    <div>
                        <textarea name="Vocational" id="Vocational" class="form-control"><?= @$course['Vocational'] ?></textarea>
                    </div>
                </div>

                <div class="col-12 my-2">
                    <h5>
                        หลักสูตร ปวส.
                    </h5>
                    <div>
                        <textarea name="HighVocational" id="HighVocational" class="form-control"><?= @$course['HighVocational'] ?></textarea>
                    </div>
                </div>
                <div class="col-lg-12 text-center my-3">
                    <button type="submit" class="btn btn-success">บันทึก</button>
                    <a href="<?php echo base_url('admin/course') ?>" class="btn btn-dark">ย้อนกลับ</a>
                </div>
            </div>

        </form>
    </div>
</div>

<?php $this->endSection(); ?>

<?php $this->section('scripts'); ?>
<script>
    CKEDITOR.replace('Vocational', {
        toolbar: [{
                name: 'clipboard',
                items: ['Undo', 'Redo', 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord']
            },
            {
                name: 'editing',
                items: ['Find', 'Replace', '-', 'SelectAll']
            },
            {
                name: 'basicstyles',
                items: ['Bold', 'Italic', 'Underline', 'Strike', '-', 'RemoveFormat']
            },
            {
                name: 'paragraph',
                items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote']
            },
            {
                name: 'insert',
                items: ['Image', 'Table', 'HorizontalRule', 'SpecialChar']
            },
            {
                name: 'styles',
                items: ['Styles', 'Format', 'Font', 'FontSize']
            },
            {
                name: 'colors',
                items: ['TextColor', 'BGColor']
            },
            {
                name: 'tools',
                items: ['Maximize', 'ShowBlocks']
            },
            {
                name: 'document',
                items: ['Source']
            }
        ]
    });
    CKEDITOR.replace('HighVocational');
    const uploadImage = document.getElementById("uploadImage");
    const cropImage = document.getElementById("cropImage");
    const cropButton = document.getElementById("cropButton");
    const preview = document.getElementById("preview");
    let cropper;

    uploadImage.addEventListener("change", (event) => {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = (e) => {
                cropImage.src = e.target.result; // แสดงภาพที่อัปโหลด
                cropImage.style.display = "block"; // แสดงภาพ
                if (cropper) {
                    cropper.destroy(); // รีเซ็ต Cropper ถ้ามีอยู่ก่อนแล้ว
                }
                cropper = new Cropper(cropImage, {
                    // ❌ ลบ aspectRatio และ viewMode
                    autoCropArea: 1,
                    responsive: true,
                    preview: "#preview"
                });
            };
            reader.readAsDataURL(file);
        }
    });

    // เมื่อกดปุ่ม Crop
    cropButton.addEventListener("click", () => {
        if (cropper) {
            const canvas = cropper.getCroppedCanvas(); // ✅ ไม่มี width/height fix
            const croppedImageURL = canvas.toDataURL("image/png");

            $('#image_personel').val(croppedImageURL);
            $('#personel_image_display').attr('src', croppedImageURL);

            const modal = bootstrap.Modal.getInstance(
                document.getElementById("cropperModal")
            );
            modal.hide();
        }
    });
</script>
<?php $this->endSection(); ?>