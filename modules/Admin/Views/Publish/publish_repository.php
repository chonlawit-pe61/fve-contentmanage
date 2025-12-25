<?php $this->extend('template/admin_layout') ?>

<?php $this->section('content'); ?>
<div class="card shadow shadow-lg">
    <div class="card-body">
        <div class="row">
            <div class="col-12 my-2">
                <h3>
                    เอกสารบทความงานวิจัย
                </h3>
            </div>
            <div class="col-12 my-2">
                <a href="<?= base_url('admin/publish/publish_repository_form') ?>" class="btn btn-sm mb-1 px-4 fs-4  bg-primary-subtle text-primary float-start">
                    <i class="ti ti-plus"></i> เพิ่มเอกสาร
                </a>
            </div>

            <div class="col-12 my-2">
                <div class="table-responsive">
                    <table id="table" class="table align-middle text-nowrap mb-0">
                        <thead class="bg-primary-subtle text-primary">
                            <tr class="text-muted fw-semibold">
                                <!-- <th scope="col">#</th> -->
                                <th scope="col" style="width: 5%;">ลำดับ</th>
                                <th scope="col">หัวข้อ</th>
                                <th scope="col">ไฟล์แนบ</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody class="border-top">
                            <?php foreach ($publish_repository as $key => $value) { ?>
                                <tr>
                                    <td class="text-center"><?= $key + 1 ?></td>
                                    <td><?= $value['title'] ?></td>
                                    <td>
                                        <a href="<?= base_url(@$value['file_path']) ?>" target="_blank">ดูไฟล์</a>
                                    </td>
                                    <td>
                                        <a href="<?= base_url('admin/publish/publish_repository_form?publish_repository_id=' . $value['id']) ?>" class="btn  mb-1 bg-primary text-white ">
                                            แก้ไข
                                        </a>
                                        <button onclick="deletePublishRepository(<?= $value['id'] ?>)" class="btn  mb-1 bg-danger text-white ">
                                            ลบ
                                        </button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->endSection(); ?>

<?php $this->section('scripts'); ?>
<script>
    $(document).ready(function() {
        $('#table').DataTable({});
    });

    function deletePublishRepository(id) {
        // console.log(id);
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
                    url: "<?= base_url('admin/publish/ajaxDeletePublishRepository') ?>",
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