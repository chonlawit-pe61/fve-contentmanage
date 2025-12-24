<?= $this->extend('template/admin_layout') ?>

<?= $this->section('content') ?>
<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h5 class="card-title fw-semibold">จัดการลิงค์เชื่อมต่อ</h5>
                <p class="mb-0 text-muted">สำหรับหัวข้อย่อย: <?= $subtopic['name'] ?></p>
            </div>
            <a href="<?= base_url('admin/ita/subtopics/' . $subtopic['ita_topic_id']) ?>" class="btn btn-outline-secondary">ย้อนกลับ</a>
        </div>

        <!-- Add Link Form -->
        <div class="card bg-light mb-4">
            <div class="card-body">
                <h6 class="card-title" id="form-title">เพิ่มลิงค์ใหม่</h6>
                <form action="<?= base_url('admin/ita/save_link') ?>" method="post" class="row g-3 align-items-end" id="linkForm">
                    <input type="hidden" name="ita_subtopic_id" value="<?= $subtopic['id'] ?>">
                    <input type="hidden" name="id" id="link_id">

                    <div class="col-md-5">
                        <label class="form-label">คำอธิบายลิงค์ (ข้อความที่แสดง)</label>
                        <input type="text" name="description" id="description" class="form-control" placeholder="เช่น ดาวน์โหลดไฟล์ PDF" required>
                    </div>
                    <div class="col-md-5">
                        <label class="form-label">URL (ลิงค์ปลายทาง)</label>
                        <input type="text" name="url" id="url" class="form-control" placeholder="http://..." required>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-success w-100 mb-2" id="btn-submit">เพิ่ม</button>
                        <button type="button" class="btn btn-secondary w-100 d-none" id="btn-cancel" onclick="resetForm()">ยกเลิก</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Links List -->
        <h6 class="fw-semibold">รายการลิงค์ที่มีอยู่</h6>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>คำอธิบาย</th>
                        <th>URL</th>
                        <th style="width: 150px;">จัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($links)) : ?>
                        <tr>
                            <td colspan="3" class="text-center">ไม่มีลิงค์เชื่อมต่อ</td>
                        </tr>
                    <?php else : ?>
                        <?php foreach ($links as $link) : ?>
                            <tr>
                                <td><?= $link['description'] ?></td>
                                <td><a href="<?= $link['url'] ?>" target="_blank"><?= $link['url'] ?></a></td>
                                <td>
                                    <button class="btn btn-warning btn-sm" onclick="editLink('<?= $link['id'] ?>', '<?= esc($link['description']) ?>', '<?= esc($link['url']) ?>')">แก้ไข</button>
                                    <a href="#" class="btn btn-danger btn-sm" onclick="deleteLink('<?= $link['id'] ?>')">ลบ</a>
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
    function deleteLink(id) {
        Swal.fire({
            title: 'ยืนยันการลบ?',
            text: "คุณต้องการลบลิงค์นี้ใช่หรือไม่?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'ใช่, ฉันต้องการลบ',
            cancelButtonText: 'ยกเลิก'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "<?= base_url('admin/ita/delete_link') ?>/" + id;
            }
        })
    }

    function editLink(id, description, url) {
        $('#link_id').val(id);
        $('#description').val(description);
        $('#url').val(url);

        $('#form-title').text('แก้ไขลิงค์');
        $('#btn-submit').text('บันทึก').removeClass('btn-success').addClass('btn-warning');

        $('#btn-cancel').removeClass('d-none');

        $('html, body').animate({
            scrollTop: 0
        }, 'slow');
    }

    function resetForm() {
        $('#linkForm')[0].reset();
        $('#link_id').val('');

        $('#form-title').text('เพิ่มลิงค์ใหม่');
        $('#btn-submit').text('เพิ่ม').addClass('btn-success').removeClass('btn-warning');

        $('#btn-cancel').addClass('d-none');
    }
</script>
<?= $this->endSection() ?>