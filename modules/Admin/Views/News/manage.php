<?php $this->extend('template/admin_layout') ?>

<?php $this->section('content'); ?>
<div class="card shadow shadow-lg">
    <form action="<?= base_url('admin/news/save-news') ?>" method="POST" autocomplete="off" enctype="multipart/form-data" class="once-only">
        <!-- Hidden -->
        <input type="hidden" name="id" value="<?= (@$news['id']) ? $news['id'] : '' ?>">
        <div class="card-body">
            <div class="row">
                <div class="col-12 my-2">
                    <h3>ข่าวสาร</h3>
                </div>
                <div class="col-12 my-2">
                    <nav class="py-2" aria-label="breadcrumb" style="--bs-breadcrumb-divider: '/'">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('admin/news') ?>">ข่าวสาร</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                <?= (@$news['id']) ? 'แก้ไขข้อมูล' : 'เพิ่มข้อมูล' ?>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-10 text-center">
                    <div>
                        <?php if (!empty($news['image_path'])) { ?>
                            <img id="personel_image_display" src="<?= base_url($news['image_path']) ?>" alt="" class="img-fluid border border-4 my-2" style="max-width: 175px;">
                        <?php } else { ?>
                            <img id="personel_image_display" src="<?= base_url('public/img/news.webp') ?>" alt="" class="img-fluid border border-4 my-2" style="max-width: 175px;">
                        <?php } ?>
                    </div>

                    <input type="hidden" id="image_personel" name="base64_image">

                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#cropperModal">
                        อัพโหลดรูปภาพหน้าปก
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
            </div>

            <div class="row justify-content-center my-2">
                <div class="col-md-2 my-2">
                    <label for="category_id" class="form-label">ประเภทข่าวสาร <span class="text-danger">*</span></label>
                    <select name="category_id" id="category_id" class="form-select" required>
                        <option value="">-- เลือก --</option>
                        <?php foreach ($category as $key => $cate) { ?>
                            <option value="<?= $cate['id'] ?>" <?= (@$news['category_id'] == $cate['id']) ? 'selected' : '' ?>><?= $cate['name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-8 my-2">
                    <label for="title" class="form-label">หัวข้อข่าวสาร <span class="text-danger">*</span></label>
                    <input type="text" id="title" name="title" class="form-control" value="<?= @$news['title'] ?>" required>
                </div>
                <div class="col-md-10 my-2">
                    <label for="description" class="form-label">เนื้อหา</label>
                    <textarea name="description" id="description" class="form-control"><?= @$news['description'] ?></textarea>
                </div>

                <div class="col-md-10 my-2">
                    <label for="document_path" class="form-label">ไฟล์แนบ <span class="text-danger">*</span></label>
                    <?php if (empty($news['document_path'])) { ?>
                        <input type="file" name="file" id="file" class="form-control" accept="application/pdf">
                        <span class="text-danger" style="font-size: 12px;">สามารถอัพโหลดเอกสารนามสกุล .pdf เท่านั้น</span>
                    <?php } else {  ?>
                        <br>
                        <a href="<?= base_url($news['document_path']) ?>" target="_blank" class="mx-2">
                            <i class="ti ti-file"></i>
                            <?php
                            $file_name = str_replace('public/uploads/news/', '', $news['document_path']);
                            echo $file_name
                            ?>
                        </a>
                        <button type="button" class="btn btn-danger btn-sm mx-md-5" onclick="deleteFile('<?= $news['id'] ?>')">
                            <i class="ti ti-trash"></i> ลบไฟล์
                        </button>
                    <?php } ?>
                </div>

                <div class="col-md-3">
                    <label for="" class="form-label">วันที่เผยแพร่ <span class="text-danger">*</span></label>
                    <input type="text" class="form-control date-picker" id="create_at" name="create_at" value="<?= (!empty($news)) ?  date('d/m/Y', strtotime($news['create_at'])) : date('d/m/Y') ?>" required>
                </div>
                <div class="col-md-10 my-2">
                    <div class="form-check py-2">
                        <input type="checkbox" class="form-check-input border border-2 border-primary" id="is_showing" name="is_showing" value="1" <?= (@$news['is_showing'] == 1) ? 'checked' : '' ?>>
                        <label class="form-check-label" for="is_showing">แสดงข่าวสารนี้ในหน้าแรก</label>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center my-2">
                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-success mx-1 btn-submit">
                        <i class="ti ti-device-floppy"></i> บันทึก
                    </button>
                    <a href="<?= base_url('admin/news') ?>" class="btn btn-warning mx-1">
                        <i class="ti ti-chevron-left"></i> กลับ
                    </a>
                </div>
            </div>
        </div>
    </form>
</div>
<?php $this->endSection(); ?>

<?php $this->section('scripts'); ?>
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
                    aspectRatio: NaN, // อัตราส่วน 1:1
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
                // width: 350,
                // height: 350, // กำหนดขนาดภาพครอบ 350x350px
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

    CKEDITOR.replace('description');

    function deleteFile(id) {
        Swal.fire({
            title: "ยืนยันการลบข้อมูล ?",
            text: "หากลบแล้วจะไม่สามารถกู้ข้อมูลกลับได้ หรือหากต้องการกู้ข้อมูลให้ติดต่อเจ้าหน้าที่ดูแล",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "ลบข้อมูล",
            cancelButtonText: "ยกเลิก"

        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    method: "POST",
                    url: "<?= base_url('admin/news/delete-file') ?>",
                    data: {
                        id: id
                    },
                });

                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "ลบข้อมูลสำเร็จ",
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    window.location.reload();
                });
            }
        });
    }
</script>
<?php $this->endSection(); ?>