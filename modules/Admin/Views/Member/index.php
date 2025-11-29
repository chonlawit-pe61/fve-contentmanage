<?php $this->extend('template/admin_layout') ?>

<?php $this->section('content'); ?>
<div class="card shadow shadow-lg">
    <div class="card-body">
        <div class="row">
            <div class="col-12 my-2">
                <h3>บุคลากร</h3>
            </div>
            <div class="col-12 my-2">
                <a href="<?= base_url('admin/member/manage') ?>" class="btn btn-sm mb-1 px-4 fs-4  bg-primary-subtle text-primary float-start">
                    <i class="ti ti-plus"></i> เพิ่มบุคลากรใหม่
                </a>
            </div>
            <div class="col-12 my-2">
                <div class="table-responsive">
                    <table id="table" class="table align-middle text-nowrap mb-0">
                        <thead class="bg-primary-subtle text-primary">
                            <tr class="text-muted fw-semibold">
                                <!-- <th scope="col">#</th> -->
                                <th scope="col"></th>
                                <th scope="col">โทรศัพท์</th>
                                <th scope="col" width="10%"></th>
                            </tr>
                        </thead>
                        <tbody class="border-top">
                            <!-- <tr>
                                <td class="ps-0">
                                    <div class="d-flex align-items-center">
                                        <div class="me-2 pe-1">
                                            <img src="../assets/images/products/product-1.jpg" class="rounded-2" width="48" height="48" alt="modernize-img">
                                        </div>
                                        <div>
                                            <h6 class="fw-semibold mb-1">Minecraf App</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="mb-0 fs-3 text-dark">73.2%</p>
                                </td>
                                <td>
                                    <span class="badge fw-semibold py-1 w-85 bg-success-subtle text-success">Low</span>
                                </td>
                                <td>
                                    <p class="fs-3 text-dark mb-0">$3.5k</p>
                                </td>
                                <td>

                                </td>
                            </tr> -->
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
        $('#table').DataTable({
            processing: true,
            serverSide: true,
            language: dtLanguage,
            ajax: {
                url: '<?= base_url('admin/member/ajax-table-members') ?>',
                method: "POST"
            },
            columnDefs: [{
                targets: -1,
                orderable: false
            }],
            columns: [
                // {
                //     data: '',
                //     className: 'text-center'
                // },
                {
                    data: 'image_path',
                    className: 'ps-5'
                },
                {
                    data: 'phone',
                    className: 'ps-0 text-center'
                },
                {
                    data: 'action',
                    className: 'text-center'
                }
            ]

        });
    });

    function deleteMember(id) {
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
                    url: "<?= base_url('admin/member/delete-member') ?>",
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