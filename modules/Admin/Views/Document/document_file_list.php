<?php $this->extend('template/admin_layout') ?>

<?php $this->section('content'); ?>
<div class="card shadow shadow-lg">
    <div class="card-body">
        <div class="row">
            <div class="col-12 my-2">
                <h3>หมวดเอกสาร
                </h3>
            </div>
            <div class="col-12 my-2">
                <nav class="py-2" aria-label="breadcrumb" style="--bs-breadcrumb-divider: '/'">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/Document') ?>">หมวดเอกสาร
                            </a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            <?= (@$document['id']) ? 'แก้ไขข้อมูล' : 'เพิ่มข้อมูล' ?>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row justify-content-center my-2">
            <div class="col-lg-3 ms-auto">
                <div class="text-end mb-3">
                    <a href="<?php echo base_url('admin/Document/manageFile/' . $id) ?>" class="btn btn-success">เพิ่มเอกสาร</a>
                </div>
                <?php
                $currentYear = date('Y');
                $startYear = $currentYear - 10;
                $endYear = $currentYear;
                $selectedYear = isset($_GET['year']) && $_GET['year'] >= $startYear && $_GET['year'] <= $endYear
                    ? $_GET['year']
                    : $currentYear;
                ?>
                <form action="<?php echo base_url('admin/Document/listFile/' . $id) ?>" method="get">
                    <select name="year" class="form-select" aria-label="Default select example" onchange="this.form.submit()">
                        <?php for ($year = $startYear; $year <= $endYear; $year++): ?>
                            <option value="<?= $year ?>" <?= $year == $selectedYear ? 'selected' : '' ?>>
                                <?= $year + 543 ?>
                            </option>
                        <?php endfor; ?>
                    </select>
                </form>
            </div>
            <div class="col-lg-12">
                <table class="table">
                    <tr>
                        <td class="text-center" style="width: 10%;">
                            ลำดับ
                        </td>
                        <td class="text-center">
                            รายละเอียดเอกสาร
                        </td>
                        <td class="text-center">
                            ปีการศึกษา
                        </td>
                        <td class="text-center">
                            เอกสาร
                        </td>
                        <td class="text-center" style="width: 20%;">
                            เครื่องมือ
                        </td>
                    </tr>
                    <tbody>
                        <?php
                        if (!empty($document_file)) {
                            $index = 0;
                            foreach ($document_file as $row) {
                                $index++;
                        ?>

                                <tr>
                                    <td>
                                        <?= $index ?>
                                    </td>
                                    <td>
                                        <?= $row['title'] ?>
                                    </td>
                                    <td class="text-center">
                                        <?= $row['edu_year'] + 543 ?>
                                    </td>
                                    <td class="text-center">
                                        <a download class="btn btn-info" href="<?php echo base_url($row['file_path']) ?>">
                                            <i class="ti ti-folder-minus"></i>
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <a href="<?php echo base_url('admin/Document/manageFile/' . $row['public_document_id'] . '/' . $row['id']) ?>" class="btn btn-warning"> แก้ไข</a>
                                        <button type="button" onclick="deleteFile('<?php echo $row['id'] ?>')" class="btn btn-danger">ลบ</button>
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
</div>
<?php $this->endSection(); ?>

<?php $this->section('scripts'); ?>

<script>
    const deleteFile = (id) => {
        Swal.fire({
            title: "ยืนยันการลบเอกสาร?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "ยืนยัน",
            cancelButtonText: 'ยกเลิก'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "post",
                    url: "<?php echo base_url('admin/Document/deleteDocumentFile') ?>",
                    data: {
                        "id": id
                    },
                    success: function(response) {
                        Swal.fire({
                            title: "Deleted!",
                            text: "Your file has been deleted.",
                            icon: "success"
                        }).then(() => {
                            window.location.reload();
                        })

                    }
                });
            }
        });


    }
</script>
<?php $this->endSection(); ?>