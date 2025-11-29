<?php $this->extend('template/admin_layout') ?>

<?php $this->section('content'); ?>
<div class="card shadow shadow-lg">
    <div class="card-body">
        <div class="row">
            <div class="col-12 my-2">
                <h3>ข่าวสาร</h3>
            </div>
            <div class="col-12 my-2">
                <a href="<?= base_url('admin/news/manage') ?>" class="btn btn-sm mb-1 px-4 fs-4  bg-primary-subtle text-primary float-start">
                    <i class="ti ti-plus"></i> เพิ่มข่าวสารใหม่
                </a>
            </div>
            <div class="col-12 my-2">
                <div class="table-responsive">
                    <table id="table" class="table align-middle text-nowrap mb-0">
                        <thead class="bg-primary-subtle text-primary text-center">
                            <tr class="text-muted fw-semibold">
                                <th scope="col" width="5%">#</th>
                                <th scope="col" width="65%">หัวข้อ</th>
                                <th scope="col" width="10%">ประเภท</th>
                                <th scope="col" width="10%">วันที่เผยแพร่</th>
                                <th scope="col" width="10%"></th>
                            </tr>
                        </thead>
                        <tbody></tbody>
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
                url: '<?= base_url('admin/news/ajax-table-news') ?>',
                method: "POST"
            },
            columnDefs: [{
                targets: -1,
                orderable: false
            }],
            columns: [{
                    data: '',
                    className: 'text-center'
                },
                {
                    data: 'image_path',
                    className: 'ps-5'
                },
                {
                    data: 'category_name',
                    className: 'ps-0 text-center'
                },
                {
                    data: 'create_at',
                    className: 'ps-0 text-center'
                },
                {
                    data: 'action',
                    className: 'text-center'
                }
            ]

        });
    });

    function deleteNews(id) {
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
                    url: "<?= base_url('admin/news/delete-news') ?>",
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