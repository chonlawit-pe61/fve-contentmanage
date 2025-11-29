<?php $this->extend('template/admin_layout') ?>

<?php $this->section('content'); ?>
<?php function renderTableRows($course, $dash = '', $level = 0, $category = '')
{
    $limit = 2;
    $level = $level + 1;
    $dash = '---' . $dash;
    foreach ($course as $key => $course) {
        if ($level < $limit) {
            $tools = "<button type='button' class='btn btn-sm btn-primary mx-1' onclick='openAddModal({$course['id']}, {$course['course_type_id']})'>
                    <i class='ti ti-plus'></i> เพิ่มแผนก/สาขาวิชา
                </button>";
            $tools .= "<button type='button' class='btn btn-sm btn-warning mx-1' onclick='openEditModal({$course['id']}, {$course['parent_id']}, `{$course['name']}`, `{$course['course_type_id']}`)'>
                <i class='ti ti-pencil'></i> แก้ไข
            </button>";
            $tools .= "<button type='button' class='btn btn-sm btn-danger mx-1' onclick='deleteCourse({$course['id']}, {$course['parent_id']}, `{$course['name']}`, `{$course['course_type_id']}`)'>
                <i class='ti ti-trash'></i> ลบ
            </button>";
        } else {
            $tools = "<button type='button' class='btn btn-sm btn-warning mx-1' onclick='openEditModal({$course['id']}, {$course['parent_id']}, `{$course['name']}`, `{$course['course_type_id']}`)'>
                <i class='ti ti-pencil'></i> แก้ไข
            </button>";
            $tools .= "<a href=" . base_url('admin/course/content/' . $course['id']) . " type='button' class='btn btn-sm btn-success mx-1''>
                <i class='ti ti-pencil'></i> เพิ่มเนื้อหาสาขาวิชา
            </a>";
            $tools .= "<button type='button' class='btn btn-sm btn-danger mx-1' onclick='deleteCourse({$course['id']}, {$course['parent_id']}, `{$course['name']}`, `{$course['course_type_id']}`)'>
                <i class='ti ti-trash'></i> ลบ
            </button>";
        }

        if ($course['course_type_id'] == $category) {
            echo "<tr>
                <td>{$dash}> {$course['name']}</td>
                <td>{$tools}</td>
            </tr>";
            if (!empty($course['children'])) {
                renderTableRows($course['children'], $dash, $level, $category);
            }
        }
    }
}
?>

<div class="card shadow shadow-lg">
    <div class="card-body">
        <div class="row">
            <div class="col-12 my-2">
                <h3>หลักสูตรการเรียนการสอน</h3>
            </div>
            <div class="col-12 my-2">
                <!-- <button type="button" class="btn btn-sm mb-1 px-4 fs-4  bg-primary-subtle text-primary float-start" onclick="openAddModal('0')">
                    <i class="ti ti-plus"></i> เพิ่มกลุ่มงาน
                </button> -->
            </div>
            <div class="col-12 my-2">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="bg-primary">
                            <tr class="text-semibold text-light">
                                <th>กลุ่มงาน/สาขาวิชา</th>
                                <th width="30%">
                                    <button type="button" class="btn btn-sm mb-1 px-4 fs-4  btn-success float-end" onclick="openAddTypeModal()">
                                        <i class="ti ti-plus"></i> เพิ่มประเภทวิชา
                                    </button>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($course_type as $category) {
                            ?>
                                <tr class="bg-primary-subtle text-primary">
                                    <td colspan="2" style="vertical-align: middle;">
                                        <strong><?= $category['name'] ?></strong>
                                        <button type="button" class="mt-1 mx-1 btn btn-danger btn-sm  float-end" onclick="deleteCourseType('<?= $category['id'] ?>')">
                                            <i class="ti ti-trash"></i> ลบ
                                        </button>
                                        <button type="button" class="mt-1 mx-1 btn btn-warning btn-sm  float-end" onclick="openUpdateTypeModal('<?= $category['id'] ?>', '<?= $category['name'] ?>')">
                                            <i class="ti ti-pencil"></i> แก้ไข
                                        </button>


                                        <button type="button" class="btn btn-sm mb-1 px-4 fs-4  bg-primary-subtle text-primary float-end" onclick="openAddModal('0', <?= $category['id'] ?>)">
                                            <i class="ti ti-plus"></i> เพิ่มกลุ่มงาน
                                        </button>

                                    </td>
                                </tr>
                            <?php
                                renderTableRows($course, '', 0, $category['id']);
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Modal -->
<div class="modal fade" id="add-course-modal" tabindex="-1" aria-labelledby="exampleModalLabel1">
    <form action="<?= base_url('admin/course/save-course') ?>" method="POST">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center">
                    <h4 class="modal-title" id="exampleModalLabel1">
                        เพิ่มกลุ่มงาน/สาขาวิชา
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 my-1">
                            <input type="hidden" id="add-parent-id" name="parent_id" value="">
                            <label for="name" class="form-label">ชื่อกลุ่มงาน/สาขาวิชา <span class="text-danger">*</span></label>
                            <input type="text" id="name" name="name" class="form-control" required>
                        </div>

                        <div class="col-md-md12 my-1">
                            <label for="add-course-type-id" class="form-label">ประเภท</label>
                            <select name="course_type_id" id="add-course-type-id" class="form-select">
                                <option value="0">-- เลือก --</option>
                                <?php foreach ($course_type as $key => $type) { ?>
                                    <option value="<?= $type['id'] ?>"><?= $type['name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-danger-subtle text-danger " data-bs-dismiss="modal">
                        ยกเลิก
                    </button>
                    <button type="submit" class="btn btn-success">
                        บันทึกข้อมูล
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- Edit -->
<div class="modal fade" id="edit-course-modal" tabindex="-1" aria-labelledby="exampleModalLabel1">
    <form action="<?= base_url('admin/course/save-course') ?>" method="POST">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center">
                    <h4 class="modal-title" id="exampleModalLabel1">แก้ไขกลุ่มงาน/สาขาวิชา</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 my-1">
                            <input type="hidden" id="edit-id" name="id" value="">
                            <input type="hidden" id="edit-parent-id" name="parent_id" value="">
                            <label for="name" class="form-label">ชื่อหน่วยงาน <span class="text-danger">*</span></label>
                            <input type="text" id="edit-name" name="name" class="form-control" value="" required>
                        </div>

                        <div class="col-md-md12 my-1">
                            <label for="edit-course-type-id" class="form-label">ประเภท</label>
                            <select name="course_type_id" id="edit-course-type-id" class="form-select">
                                <option value="0">-- เลือก --</option>
                                <?php foreach ($course_type as $key => $type) { ?>
                                    <option value="<?= $type['id'] ?>"><?= $type['name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-danger-subtle text-danger " data-bs-dismiss="modal">
                        ยกเลิก
                    </button>
                    <button type="submit" class="btn btn-success">
                        บันทึกข้อมูล
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>

<div class="modal fade" id="edit-course-type-modal" tabindex="-1" aria-labelledby="exampleModalLabel1">
    <form action="<?= base_url('admin/course/manageCourseType') ?>" method="POST">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center">
                    <h4 class="modal-title" id="exampleModalLabel1">เพิ่มกลุ่มงาน/สาขาวิชา</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 my-1">
                            <input type="hidden" id="edit-id-type" name="id" value="">
                            <label for="name" class="form-label">ชื่อหน่วยงาน <span class="text-danger">*</span></label>
                            <input type="text" id="edit-name-type" name="name" class="form-control" value="" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-danger-subtle text-danger " data-bs-dismiss="modal">
                        ยกเลิก
                    </button>
                    <button type="submit" class="btn btn-success">
                        บันทึกข้อมูล
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>

<div class="modal fade" id="update-course-type-modal" tabindex="-1" aria-labelledby="exampleModalLabel1">
    <form action="<?= base_url('admin/course/manageCourseType') ?>" method="POST">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center">
                    <h4 class="modal-title" id="exampleModalLabel1">แก้ไขกลุ่มงาน/สาขาวิชา</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 my-1">
                            <input type="hidden" id="update-id-type" name="id" value="">
                            <label for="name" class="form-label">ชื่อหน่วยงาน <span class="text-danger">*</span></label>
                            <input type="text" id="update-name-type" name="name" class="form-control" value="" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-danger-subtle text-danger " data-bs-dismiss="modal">
                        ยกเลิก
                    </button>
                    <button type="submit" class="btn btn-success">
                        บันทึกข้อมูล
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
<?php $this->endSection(); ?>

<?php $this->section('scripts'); ?>
<script>
    function openAddModal(parent_id, course_type) {
        $("#add-parent-id").val(parent_id);
        $('#add-course-type-id').val(course_type);
        $('#add-course-modal').modal('show');
    }

    function openAddTypeModal() {
        $('#edit-course-type-modal').modal('show');
    }

    function openUpdateTypeModal(id, name) {

        $("#update-id-type").val(id);
        $('#update-name-type').val(name);
        $('#update-course-type-modal').modal('show');
    }


    function openEditModal(id, parent_id, name, course_type) {
        $("#edit-id").val(id)
        $("#edit-parent-id").val(parent_id)
        $("#edit-course-type-id").val(course_type)
        $("#edit-name").val(name)

        $('#edit-course-modal').modal('show');
    }


    function deleteCourseType(id) {
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
                    url: "<?= base_url('admin/course/deleteCourseType') ?>",
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

    function deleteCourse(id, parent_id, name, course_type) {
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
                    url: "<?= base_url('admin/course/deleteCourse') ?>",
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