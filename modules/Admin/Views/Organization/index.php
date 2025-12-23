<?php $this->extend('template/admin_layout') ?>

<?php $this->section('content'); ?>
<?php function renderTableRows($organizations, $dash = '', $level = 0)
{
    $limit = 3;
    $level = $level + 1;
    $dash = '---' . $dash;
    foreach ($organizations as $key => $org) {
        if ($level < $limit) {
            $tools = "<button type='button' class='btn btn-sm btn-primary mx-1' onclick='openAddModal({$org['id']})'>
                    <i class='ti ti-plus'></i> เพิ่มหน่วยงานย่อย
                </button>";
            $tools .= "<button type='button' class='btn btn-sm btn-warning mx-1' onclick='openEditModal({$org['id']}, {$org['parent_id']}, `{$org['name']}`)'>
                <i class='ti ti-pencil'></i> แก้ไข
            </button>";
            $tools .= "<button type='button' class='btn btn-sm btn-danger mx-1' onclick='deleteOrganization({$org['id']})'>
                <i class='ti ti-trash'></i> ลบ
            </button>";
        } else {
            $tools = "<button type='button' class='btn btn-sm btn-warning mx-1' onclick='openEditModal({$org['id']}, {$org['parent_id']}, `{$org['name']}`)'>
                <i class='ti ti-pencil'></i> แก้ไข
            </button>";
            $tools .= "<button type='button' class='btn btn-sm btn-danger mx-1' onclick='deleteOrganization({$org['id']})'>
                <i class='ti ti-trash'></i> ลบ
            </button>";
        }

        echo "<tr>
                <td>{$dash}> {$org['name']}</td>
                <td>{$tools}</td>
            </tr>";
        if (!empty($org['children'])) {
            renderTableRows($org['children'], $dash, $level);
        }
    }
}
?>

<div class="card shadow shadow-lg">
    <div class="card-body">
        <div class="row">
            <div class="col-12 my-2">
                <h3>โครงสร้างองค์กร</h3>
            </div>
            <div class="col-12 my-2">
                <button type="button" class="btn btn-sm mb-1 px-4 fs-4  bg-primary-subtle text-primary float-start" onclick="openAddModal('0')">
                    <i class="ti ti-plus"></i> เพิ่มหน่วยงาน
                </button>
            </div>
            <div class="col-12 my-2">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="bg-primary-subtle text-primary">
                            <tr class="text-muted fw-semibold">
                                <th>ชื่อหน่วนงาน</th>
                                <th width="30%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php renderTableRows($organizations); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Modal -->
<div class="modal fade" id="add-organize-modal" tabindex="-1" aria-labelledby="exampleModalLabel1">
    <form action="<?= base_url('admin/organization/save-organize') ?>" method="POST">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center">
                    <h4 class="modal-title" id="exampleModalLabel1">
                        เพิ่มหน่วยงาน
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <input type="hidden" id="add-parent-id" name="parent_id" value="">
                            <label for="name" class="form-label">ชื่อหน่วยงาน <span class="text-danger">*</span></label>
                            <input type="text" id="name" name="name" class="form-control" required>
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
<div class="modal fade" id="edit-organize-modal" tabindex="-1" aria-labelledby="exampleModalLabel1">
    <form action="<?= base_url('admin/organization/save-organize') ?>" method="POST">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center">
                    <h4 class="modal-title" id="exampleModalLabel1">แก้ไขหน่วยงาน</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <input type="hidden" id="edit-id" name="id" value="">
                            <input type="hidden" id="edit-parent-id" name="parent_id" value="">
                            <label for="name" class="form-label">ชื่อหน่วยงาน <span class="text-danger">*</span></label>
                            <input type="text" id="edit-name" name="name" class="form-control" value="" required>
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
    const deleteOrganization = (id) => {

        $.ajax({
            type: "POST",
            url: "<?= base_url('admin/organization/delete-organization') ?>",
            data: {
                id: id
            },
            success: function(response) {
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

    function openAddModal(parent_id) {
        $("#add-parent-id").val(parent_id)
        $('#add-organize-modal').modal('show');
    }

    function openEditModal(id, parent_id, name) {
        $("#edit-id").val(id)
        $("#edit-parent-id").val(parent_id)
        $("#edit-name").val(name)

        $('#edit-organize-modal').modal('show');
    }
</script>
<?php $this->endSection(); ?>