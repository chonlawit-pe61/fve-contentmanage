<?php $this->extend('template/admin_layout') ?>

<?php $this->section('content'); ?>
<div class="card shadow shadow-lg">
    <div class="card-body">
        <form action="<?= base_url('admin/information/save-information') ?>" method="post">
            <div class="row">
                <div class="col-12 my-3 border-3 border-primary border-start">
                    <h5>ข้อมูลทั่วไป</h5>
                </div>

                <input type="hidden" name="id" id="id" value="<?= @$data['id'] ?>">

                <div class="col-md-12 my-1">
                    <div class="text-center mb-3">
                        <?php if (!empty($data['image_path'])) { ?>
                            <img id="personel_image_display" src="<?= base_url($data['image_path']) ?>" alt="" class="img-fluid  my-2" style="max-width: 200px;">
                        <?php } else { ?>
                            <img id="personel_image_display" src="<?= base_url('public/img/annouce.avif') ?>" alt="" class="img-fluid  my-2" style="max-width: 200px;">
                        <?php } ?>
                    </div>
                    <input type="hidden" id="image_personel" name="base64_image">

                    <div class="text-center mb-3">
                        <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#cropperModal">
                            อัพโหลดรูปภาพ
                        </button>
                    </div>

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
                <div class="col-md-6 my-1">
                    <label for="name" class="form-label">ชื่อวิทยาลัย <span class="text-danger">*</span></label>
                    <input type="text" id="name" name="name" class="form-control" value="<?= @$data['name'] ?>" required>
                </div>
                <div class="col-md-6 my-1">
                    <label for="name_eng" class="form-label">ชื่อวิทยาลัย (ภาษาอังกฤษ) <span class="text-danger">*</span></label>
                    <input type="text" id="name_eng" name="name_eng" class="form-control" value="<?= @$data['name_eng'] ?>" required>
                </div>
                <div class="col-md-12 my-1">
                    <label for="history" class="form-label">ประวัติวิทยาลัย <span class="text-danger">*</span></label>
                    <textarea name="history" id="history" class="form-control"><?= @$data['history'] ?></textarea>
                </div>

                <div class="col-12 my-3 border-3 border-primary border-start">
                    <h5>ปรัชญา อัตลักษณ์ เอกลักษณ์ ของวิทยาลัย</h5>
                </div>

                <div class="col-md-12 my-1">
                    <label for="philosophy" class="form-label">ปรัชญา <span class="text-danger">*</span></label>
                    <input type="text" id="philosophy" name="philosophy" class="form-control" value="<?= @$data['philosophy'] ?>" required>
                </div>
                <div class="col-md-12 my-1">
                    <label for="identity" class="form-label">อัตลักษณ์ <span class="text-danger">*</span></label>
                    <input type="text" id="identity" name="identity" class="form-control" value="<?= @$data['identity'] ?>" required>
                </div>
                <div class="col-md-12 my-1">
                    <label for="unique" class="form-label">เอกลักษณ์ <span class="text-danger">*</span></label>
                    <input type="text" id="unique" name="unique" class="form-control" value="<?= @$data['unique'] ?>" required>
                </div>

                <div class="col-12 my-3 border-3 border-primary border-start">
                    <h5>เป้าประสงค์ วิสัยทัศน์ พันธกิจ ของวิทยาลัย</h5>
                </div>
                <div class="col-md-12 my-1">
                    <label for="goal" class="form-label">เป้าประสงค์ <span class="text-danger">*</span></label>
                    <!-- <input type="text" id="goal" name="goal" class="form-control" value="<?= @$data['goal'] ?>" required> -->
                    <textarea name="goal" id="goal" class="form-control"><?= @$data['goal'] ?></textarea>
                </div>
                <div class="col-md-12 my-1">
                    <label for="vision" class="form-label">วิสัยทัศน์ <span class="text-danger">*</span></label>
                    <!-- <input type="text" id="vision" name="vision" class="form-control" value="<?= @$data['vision'] ?>" required> -->
                    <textarea name="vision" id="vision" class="form-control"><?= @$data['vision'] ?></textarea>
                </div>
                <div class="col-md-12 my-1">
                    <label for="mission" class="form-label">พันธกิจ <span class="text-danger">*</span></label>
                    <!-- <input type="text" id="mission" name="mission" class="form-control" value="<?= @$data['mission'] ?>" required> -->
                    <textarea name="mission" id="mission" class="form-control"><?= @$data['mission'] ?></textarea>
                </div>

                <div class="col-12 my-3 border-3 border-primary border-start">
                    <h5>ข้อมูลการติดต่อ</h5>
                </div>
                <div class="col-md-12 my-1">
                    <label for="address" class="form-label">ที่อยู่ <span class="text-danger">*</span></label>
                    <textarea name="address" id="address" class="form-control"><?= @$data['address'] ?></textarea>
                </div>
                <div class="col-md-4 my-1">
                    <label for="phone" class="form-label">โทร <span class="text-danger">*</span></label>
                    <input type="text" id="phone" name="phone" class="form-control" value="<?= @$data['phone'] ?>" required>
                </div>
                <div class="col-md-4 my-1">
                    <label for="fax" class="form-label">โทรสาร</label>
                    <input type="text" id="fax" name="fax" class="form-control" value="<?= @$data['fax'] ?>">
                </div>
                <div class="col-md-4 my-1">
                    <label for="email" class="form-label">อีเมล</label>
                    <input type="text" id="email" name="email" class="form-control" value="<?= @$data['email'] ?>">
                </div>
                <div class="col-md-4 my-1">
                    <label for="facebook" class="form-label">facebook</label>
                    <input type="text" id="facebook" name="facebook" class="form-control" value="<?= @$data['facebook'] ?>">
                </div>
                <div class="col-md-4 my-1">
                    <label for="youtube" class="form-label">youtube</label>
                    <input type="text" id="youtube" name="youtube" class="form-control" value="<?= @$data['youtube'] ?>">
                </div>

                <div class="col-12 my-1 text-center">
                    <button type="submit" class="btn btn-success mx-1 btn-submit">
                        <i class="ti ti-device-floppy"></i> บันทึก
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php $this->endSection(); ?>

<?php $this->section('scripts'); ?>
<script>
    CKEDITOR.replace('history');
    CKEDITOR.replace('goal');
    CKEDITOR.replace('vision');
    CKEDITOR.replace('mission');
</script>
<script>
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
                    aspectRatio: 0, // อัตราส่วน 1:1
                    viewMode: 1, // ห้ามครอบเกินพื้นที่
                    autoCropArea: 1, // ครอบพื้นที่ทั้งหมด
                    cropBoxResizable: true, // ไม่อนุญาตให้ปรับขนาด crop box
                    cropBoxMovable: true, // สามารถเลื่อน crop box ได้
                    preview: "#preview", // แสดงผลพรีวิวใน div
                });
            };
            reader.readAsDataURL(file);
        }
    });

    // เมื่อกดปุ่ม Crop
    cropButton.addEventListener("click", () => {
        if (cropper) {
            const canvas = cropper.getCroppedCanvas({
                width: 1080,
                height: 720, // กำหนดขนาดภาพครอบ 350x350px
            });
            const croppedImageURL = canvas.toDataURL("image/png");
            // console.log(croppedImageURL);
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