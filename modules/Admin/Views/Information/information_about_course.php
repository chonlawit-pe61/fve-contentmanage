<?php $this->extend('template/admin_layout') ?>

<?php $this->section('content'); ?>
<div class="card shadow shadow-lg">
    <div class="card-body">
        <div class="row">
            <div class="col-12 my-3 border-3 border-primary border-start">
                <h5>ข้อมูลหลักสูตร</h5>
            </div>
            <div class="col-lg-12">
                <a href="<?= base_url('admin/information/information_about_course_form') ?>" class="btn btn-sm mb-1 px-4 fs-4  bg-primary-subtle text-primary float-start">
                    <i class="ti ti-plus"></i> เพิ่มเอกสาร
                </a>
            </div>

            <div class="col-lg-12">
                <table class="table">
                    <thead>
                        <tr>
                            <td>
                                ลำดับ
                            </td>
                            <td>
                                ปี
                            </td>
                            <td>
                                ชื่อไฟล์
                            </td>
                            <td>
                                ไฟล์
                            </td>
                            <td>
                                จัดการ
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $idx = 0;
                        if (!empty($InformationCourse)) {
                            foreach ($InformationCourse as $row) {
                                $idx++;
                        ?>
                                <tr>
                                    <td>
                                        <?= $idx ?>
                                    </td>
                                    <td>
                                        <?= $row['data_year'] + 543 ?>
                                    </td>
                                    <td>
                                        <?= $row['information_course_file_name'] ?>
                                    </td>
                                    <td>
                                        <a href="<?= base_url(@$row['information_course_file']) ?>" target="_blank">ดูไฟล์</a>
                                    </td>
                                    <td>
                                        <a href="<?= base_url('admin/information/information_about_course_form/?information_course_id=' . @$row['information_course_id']) ?>" class="btn btn-primary">แก้ไข</a>
                                        <button class="btn btn-danger" onclick="deleteInformationAboutCourse('<?= @$row['information_course_id'] ?>')">ลบ</button>
                                    </td>
                                </tr>
                        <?php
                            }
                        }

                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php $this->endSection(); ?>

<?php $this->section('scripts'); ?>
<!-- ajaxinformation_about_personel -->

<script>
    function deleteInformationAboutCourse(information_course_id) {
        Swal.fire({
            title: "ยืนยันการลบข้อมูล ?",
            text: "หากลบแล้วจะไม่สามารถกู้ข้อมูลกลับได้",
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
                    url: "<?= base_url('admin/information/ajaxDeleteInformationAboutCourse') ?>",
                    data: {
                        information_course_id: information_course_id
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