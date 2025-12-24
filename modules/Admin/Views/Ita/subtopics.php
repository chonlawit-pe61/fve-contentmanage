<?= $this->extend('template/admin_layout') ?>

<?= $this->section('content') ?>
<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h5 class="card-title fw-semibold">หัวข้อย่อย</h5>
                <p class="mb-0 text-muted">ภายใต้หัวข้อ: <?= $topic['name'] ?> (ปี <?= $topic['ita_year'] ?>)</p>
            </div>
            <div>
                <a href="<?= base_url('admin/ita/topics/' . $topic['ita_year']) ?>" class="btn btn-outline-secondary me-2">ย้อนกลับ</a>
                <a href="<?= base_url('admin/ita/manage_topic/' . $topic['id']) ?>" class="btn btn-outline-warning me-2">แก้ไขหัวข้อหลัก</a>

                <a href="<?= base_url('admin/ita/manage_subtopic?topic_id=' . $topic['id']) ?>" class="btn btn-primary"><i class="ti ti-plus"></i> เพิ่มหัวข้อย่อย</a>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th style="width: 80px;">ลำดับ</th>
                        <th>ชื่อหัวข้อย่อย</th>
                        <th>รายละเอียด</th>
                        <th style="width: 250px;">จัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($subtopics)) : ?>
                        <tr>
                            <td colspan="4" class="text-center">ไม่พบข้อมูล</td>
                        </tr>
                    <?php else : ?>
                        <?php foreach ($subtopics as $item) : ?>
                            <tr>
                                <td class="text-center"><?= $item['list_order'] ?></td>
                                <td><?= $item['name'] ?></td>
                                <td><?= mb_strimwidth(strip_tags($item['description']), 0, 50, '...') ?></td>
                                <td>
                                    <a href="<?= base_url('admin/ita/links/' . $item['id']) ?>" class="btn btn-info btn-sm">จัดการลิงค์</a>
                                    <a href="<?= base_url('admin/ita/manage_subtopic/' . $item['id']) ?>" class="btn btn-warning btn-sm">แก้ไข</a>
                                    <a href="#" class="btn btn-danger btn-sm" onclick="deleteSubtopic('<?= $item['id'] ?>', '<?= $item['name'] ?>')">ลบ</a>
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
    function deleteSubtopic(id, name) {
        Swal.fire({
            title: 'ยืนยันการลบ?',
            text: "คุณต้องการลบหัวข้อย่อย \"" + name + "\" ใช่หรือไม่?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'ใช่, ฉันต้องการลบ',
            cancelButtonText: 'ยกเลิก'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "<?= base_url('admin/ita/delete_subtopic') ?>/" + id;
            }
        })
    }
</script>
<?= $this->endSection() ?>
