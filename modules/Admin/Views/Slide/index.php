<?php $this->extend('template/admin_layout') ?>

<?php $this->section('content'); ?>
<div class="card shadow shadow-lg">
    <div class="card-body">
        <div class="row">
            <div class="col-12 my-2">
                <h3>ภาพสไลด์</h3>
            </div>
            <div class="col-12 my-2">
                <a href="<?= base_url('admin/slide/manage') ?>" class="btn btn-sm mb-1 px-4 fs-4  bg-primary-subtle text-primary float-start">
                    <i class="ti ti-plus"></i> เพิ่มรูปภาพ
                </a>
            </div>

            <div class="col-12 my-2">
                <div class="table-responsive">
                    <table id="table" class="table align-middle text-nowrap mb-0">
                        <thead class="bg-primary-subtle text-primary text-center">
                            <tr class="text-muted fw-semibold">
                                <th scope="col" width="5%">#</th>
                                <th scope="col" width="85%">ภาพสไลด์</th>
                                <th scope="col" width="10%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $key => $slide) { ?>
                                <tr>
                                    <td class="text-center"><?= $key + 1 ?></td>
                                    <td class="text-center">
                                        <?php if (!empty($slide['image_path'])) { ?>
                                            <img id="personel_image_display" src="<?= base_url($slide['image_path']) ?>" alt="" class="img-fluid my-2" style="max-width: 700px;">
                                        <?php } else { ?>
                                            <img id="personel_image_display" src="<?= base_url('public/img/annouce.avif') ?>" alt="" class="img-fluid my-2" style="max-width: 700px;">
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <a href="<?= base_url('admin/slide/manage/' . $slide['id']) ?>" class="btn btn-warning btn-sm"><i class="ti ti-pencil"></i></a>
                                        <button type="button" class="btn btn-danger btn-sm" onclick="deleteSlide('<?= $slide['id'] ?>')"><i class="ti ti-trash"></i></button>
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
    function deleteSlide(id) {
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
                    url: "<?= base_url('admin/slide/delete-slide') ?>",
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