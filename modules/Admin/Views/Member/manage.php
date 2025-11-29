<?php $this->extend('template/admin_layout') ?>

<?php $this->section('content'); ?>
<?php function renderOrganizeOption($organizations, $dash = '', $level = 0, $selected = 0)
{
    $level = $level + 1;
    $dash = '---' . $dash;
    $check = "";
    foreach ($organizations as $key => $org) {
        if ($selected == $org['id']) {
            $check = "selected";
        } else {
            $check = "";
        }
        echo "<option value='{$org['id']}' {$check}>{$dash}> {$org['name']}</option>";
        if (!empty($org['children'])) {
            renderOrganizeOption($org['children'], $dash, $level, $selected);
        }
    }
}
?>
<div class="card shadow shadow-lg">
    <form action="<?= base_url('admin/member/save-member') ?>" method="POST" autocomplete="off" enctype="multipart/form-data" class="once-only">
        <!-- Hidden -->
        <input type="hidden" name="id" value="<?= (@$member['id']) ? $member['id'] : '' ?>">
        <div class="card-body">
            <div class="row">
                <div class="col-12 my-2">
                    <h3>บุคลากร</h3>
                </div>
                <div class="col-12 my-2">
                    <nav class="py-2" aria-label="breadcrumb" style="--bs-breadcrumb-divider: '/'">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('admin/member') ?>">บุคลากร</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                <?= (@$member['id']) ? 'แก้ไขข้อมูล' : 'เพิ่มข้อมูล' ?>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row py-4">
                <div class="col-md-12 text-center">
                    <h2 class="text-primary">ข้อมูลทั่วไป</h2>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-10 text-center">
                    <div>
                        <?php if (!empty($member['image_path'])) { ?>
                            <img id="personel_image_display" src="<?= base_url($member['image_path']) ?>" alt="" class="img-fluid border border-4 my-2" style="max-width: 175px;">
                        <?php } else { ?>
                            <img id="personel_image_display" src="<?= base_url('public/img/blank-member.jpg') ?>" alt="" class="img-fluid border border-4 my-2" style="max-width: 175px;">
                        <?php } ?>
                    </div>

                    <input type="hidden" id="image_personel" name="base64_image">

                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#cropperModal">
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
            </div>
            <div class="row justify-content-center my-2">
                <div class="col-md-2 my-2">
                    <label for="prename_id" class="form-label">คำนำหน้า <span class="text-danger">*</span></label>
                    <select name="prename_id" id="prename_id" class="form-select">
                        <option value="">-- เลือก --</option>
                        <?php foreach ($prename as $pre) { ?>
                            <option value="<?= $pre['id'] ?>" <?= (@$member['prename_id'] == $pre['id']) ? 'selected' : '' ?>><?= $pre['name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-4 my-2">
                    <label for="first_name" class="form-label">ชื่อจริง <span class="text-danger">*</span></label>
                    <input type="text" name="first_name" id="first_name" class="form-control" value="<?= (@$member['first_name']) ? $member['first_name'] : ''  ?>" required>
                </div>
                <div class="col-md-4 my-2">
                    <label for="last_name" class="form-label">นามสกุล <span class="text-danger">*</span></label>
                    <input type="text" name="last_name" id="last_name" class="form-control" value="<?= (@$member['last_name']) ? $member['last_name'] : ''  ?>" required>
                </div>
                <div class="col-md-5 my-2">
                    <label for="position" class="form-label">ตำแหน่ง <span class="text-danger">*</span></label>
                    <input type="text" name="position" id="position" class="form-control" value="<?= (@$member['position']) ? $member['position'] : ''  ?>">
                </div>
                <div class="col-md-5 my-2">
                    <label for="graduation_id" class="form-label">ระดับการศึกษา <span class="text-danger">*</span></label>
                    <select name="graduation_id" id="graduation_id" class="form-select" required>
                        <option value="">-- เลือก --</option>
                        <?php foreach ($graduation as $el) { ?>
                            <option value="<?= $el['id'] ?>" <?= (!empty($member['graduation_id']) && $member['graduation_id'] == $el['id']) ? 'selected' : '' ?>><?= $el['name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-5 my-2">
                    <label for="phone" class="form-label">เบอร์มือถือ</label>
                    <input type="text" name="phone" id="phone" class="form-control phone-input" value="<?= (@$member['phone']) ? $member['phone'] : ''  ?>">
                </div>
                <div class="col-md-5 my-2">
                    <label for="email" class="form-label">อีเมล์</label>
                    <input type="email" name="email" id="email" class="form-control" value="<?= (@$member['email']) ? $member['email'] : ''  ?>">
                </div>
                <div class="col-md-10 my-2">
                    <label for="responsibility" class="form-label">หน้าที่รับผิดชอบ</label>
                    <textarea name="responsibility" id="responsibility" class="form-control"><?= (@$member['responsibility']) ? $member['responsibility'] : '' ?></textarea>
                </div>
            </div>

            <hr>
            <div class="row py-4">
                <div class="col-md-12 text-center">
                    <h2 class="text-primary">ข้อมูลหน่วยงาน</h2>
                    <button type="button" id="addDepartment" class="btn btn-secondary my-3"><i class="fa fa-plus"></i> เพิ่มหน่วยงาน</button>
                </div>
            </div>

            <div id="department-wrapper">
                <div class="row justify-content-center mb-3">
                    <div class="col-4"><strong>หน่วยงาน</strong></div>
                    <div class="col-4"><strong>ตำแหน่งบริหาร</strong></div>
                    <div class="col-2 text-center"><strong>เครื่องมือ</strong></div>
                </div>
                <?php if (!empty($member_org)) { ?>
                    <?php foreach ($member_org as $key => $row) { ?>
                        <div class="department-group row justify-content-center mb-2">

                            <div class="col-md-4">
                                <select name="org_id[]" class="form-select" required>
                                    <option value="">-- เลือกหน่วยงาน --</option>
                                    <?php renderOrganizeOption($organizations, '', 0, @$row['org_id']) ?>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <select name="org_level_id[]" class="form-select">
                                    <option value="">-- เลือก --</option>
                                    <?php foreach ($org_levels as $level) { ?>
                                        <option value="<?= $level['id'] ?>" <?= $row['org_level_id'] == $level['id'] ? 'selected' : '' ?>><?= $level['name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-2 text-center">
                                <button type="button" class="btn btn-danger remove-dept">
                                    <i class="fa fa-trash"></i> ลบ</button>
                            </div>
                        </div>
                    <?php } ?>
                <?php } else { ?>
                    <div class="department-group row justify-content-center mb-2">

                        <div class="col-md-4">
                            <select name="org_id[]" class="form-select" required>
                                <option value="">-- เลือกหน่วยงาน --</option>
                                <?php renderOrganizeOption($organizations, '', 0, @$member['org_id']) ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select name="org_level_id[]" class="form-select">
                                <option value="">-- เลือก --</option>
                                <?php foreach ($org_levels as $level) { ?>
                                    <option value="<?= $level['id'] ?>"><?= $level['name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-2 text-center">
                            <button type="button" class="btn btn-danger remove-dept">
                                <i class="fa fa-trash"></i> ลบ</button>
                        </div>
                    </div>
                <?php } ?>
            </div>

            <hr class="my-5">

            <div class="row py-4">
                <div class="col-md-12 text-center">
                    <h2 class="text-primary">ข้อมูลแผนก</h2>
                    <button type="button" id="addCourse" class="btn btn-secondary my-3"><i class="fa fa-plus"></i> เพิ่มสาขาวิชา</button>
                </div>
            </div>
            <div id="course-wrapper">
                <div class="row justify-content-center mb-3">
                    <div class="col-4"><strong>สาขาวิชา</strong></div>
                    <div class="col-4"><strong>ตำแหน่งสาขาวิชา</strong></div>
                    <div class="col-2 text-center"><strong>เครื่องมือ</strong></div>
                </div>
                <?php if (!empty($member_course)) { ?>
                    <?php foreach ($member_course as $key => $row) { ?>
                        <div class="course-group row justify-content-center mb-2">
                            <div class="col-md-4">
                                <select name="course_id[]" class="form-select">
                                    <option value="">-- เลือกสาขาวิชา --</option>
                                    <?php
                                    if (!empty($course)) {
                                        foreach ($course as $course_row) {
                                    ?>
                                            <option <?php echo $row['course_id'] == $course_row['id'] ? 'selected' : ''  ?> value="<?= $course_row['id'] ?>"><?= $course_row['name'] ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <select name="course_level_id[]" class="form-select">
                                    <option value="">-- ตำแหน่งสาขาวิชา --</option>
                                    <?php
                                    if (!empty($courseLevel)) {
                                        foreach ($courseLevel as $row_level) {
                                    ?>
                                            <option <?php echo $row['course_level_id'] == $row_level['id'] ? 'selected' : ''  ?> value="<?= $row_level['id'] ?>"><?= $row_level['name'] ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-2 text-center">
                                <button type="button" class="btn btn-danger remove-dept_course">
                                    <i class="fa fa-trash"></i> ลบ</button>
                            </div>
                        </div>
                    <?php } ?>
                <?php } else { ?>
                    <div class="course-group row justify-content-center mb-2">
                        <div class="col-md-4">
                            <select name="course_id[]" class="form-select">
                                <option value="">-- เลือกหน่วยงาน --</option>
                                <?php
                                if (!empty($course)) {
                                    foreach ($course as $row) {
                                ?>
                                        <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select name="course_level_id[]" class="form-select">
                                <option value="">-- ตำแหน่งสาขาวิชา --</option>
                                <?php
                                if (!empty($courseLevel)) {
                                    foreach ($courseLevel as $row_level) {
                                ?>
                                        <option value="<?= $row_level['id'] ?>"><?= $row_level['name'] ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-2 text-center">
                            <button type="button" class="btn btn-danger remove-dept_course">
                                <i class="fa fa-trash"></i> ลบ</button>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>


        <div class="row justify-content-center my-5">
            <div class="col-12 text-center">
                <button type="submit" class="btn btn-success mx-1 btn-submit">
                    <i class="ti ti-device-floppy"></i> บันทึก
                </button>
                <a href="<?= base_url('admin/member') ?>" class="btn btn-warning mx-1">
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
                    aspectRatio: 3 / 4, // อัตราส่วน 1:1
                    viewMode: 1, // ห้ามครอบเกินพื้นที่
                    autoCropArea: 1, // ครอบพื้นที่ทั้งหมด
                    cropBoxResizable: false, // ไม่อนุญาตให้ปรับขนาด crop box
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
                width: 720,
                height: 1080, // กำหนดขนาดภาพครอบ 350x350px
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

    CKEDITOR.replace('responsibility');

    $(document).ready(function() {
        $('#org_id').select2();
        $('#graduation_id').select2();

        $('#addDepartment').click(function() {
            let clone = $('.department-group:first').clone();
            clone.find('select, input').val('');
            $('#department-wrapper').append(clone);
        });

        $('#addCourse').click(function() {
            let clone = $('.course-group:first').clone();
            clone.find('select, input').val('');
            $('#course-wrapper').append(clone);
        });



        $(document).on('click', '.remove-dept', function() {
            if ($('.department-group').length > 1) {
                $(this).closest('.department-group').remove();
            }
        });
        $(document).on('click', '.remove-dept_course', function() {
            if ($('.course-group').length > 1) {
                $(this).closest('.course-group').remove();
            }
        });
    });
</script>
<?php $this->endSection(); ?>