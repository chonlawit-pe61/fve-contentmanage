<?= $this->extend('template/admin_layout') ?>

<?= $this->section('content') ?>
<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="card-title fw-semibold">หัวข้อ ITA ปี <?= $year ?></h5>
            <div>
                <a href="<?= base_url('admin/ita') ?>" class="btn btn-outline-secondary me-2">ย้อนกลับ</a>
                <a href="<?= base_url('admin/ita/manage_topic?year=' . $year) ?>" class="btn btn-primary"><i class="ti ti-plus"></i> เพิ่มหัวข้อ</a>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th style="width: 80px;">ลำดับ</th>
                        <th>ชื่อหัวข้อ</th>
                        <th style="width: 250px;">จัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($topics)) : ?>
                        <tr>
                            <td colspan="3" class="text-center">ไม่พบข้อมูล</td>
                        </tr>
                    <?php else : ?>
                        <?php foreach ($topics as $item) : ?>
                            <tr>
                                <td class="text-center"><?= $item['list_order'] ?></td>
                                <td><?= $item['name'] ?></td>
                                <td>
                                    <a href="<?= base_url('admin/ita/subtopics/' . $item['id']) ?>" class="btn btn-info btn-sm">หัวข้อย่อย</a>
                                    <a href="<?= base_url('admin/ita/manage_topic/' . $item['id']) ?>" class="btn btn-warning btn-sm">แก้ไข</a>
                                    <a href="#" class="btn btn-danger btn-sm" onclick="deleteTopic('<?= $item['id'] ?>', '<?= $item['name'] ?>')">ลบ</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    function deleteTopic(id, name) {
        Swal.fire({
            title: 'ยืนยันการลบ?',
            text: "คุณต้องการลบหัวข้อ \"" + name + "\" ใช่หรือไม่?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'ใช่, ฉันต้องการลบ',
            cancelButtonText: 'ยกเลิก'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "<?= base_url('admin/ita/delete_topic') ?>/" + id;
            }
        })
    }
</script>
<?= $this->endSection() ?>
