<?= $this->extend('template/admin_layout') ?>

<?= $this->section('content') ?>
<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4"><?= isset($subtopic) ? 'แก้ไขหัวข้อย่อย' : 'เพิ่มหัวข้อย่อย' ?></h5>
        <p class="text-muted">ภายใต้หัวข้อ: <?= $topic['name'] ?></p>

        <form action="<?= base_url('admin/ita/save_subtopic') ?>" method="post">
            <?php if (isset($subtopic)) : ?>
                <input type="hidden" name="id" value="<?= $subtopic['id'] ?>">
            <?php endif; ?>
            <input type="hidden" name="ita_topic_id" value="<?= $topic['id'] ?>">

            <div class="mb-3">
                <label class="form-label">ชื่อหัวข้อย่อย</label>
                <input type="text" name="name" class="form-control" value="<?= isset($subtopic) ? $subtopic['name'] : '' ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">รายละเอียด / คำอธิบาย</label>
                <textarea id="description" name="description" class="form-control" rows="3"><?= isset($subtopic) ? $subtopic['description'] : '' ?></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">ลำดับการแสดงผล</label>
                <input type="number" name="list_order" class="form-control" value="<?= isset($subtopic) ? $subtopic['list_order'] : '0' ?>">
            </div>

            <button type="submit" class="btn btn-primary">บันทึก</button>
            <a href="<?= base_url('admin/ita/subtopics/' . $topic['id']) ?>" class="btn btn-outline-secondary">ยกเลิก</a>
        </form>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    CKEDITOR.replace('description', {
        toolbar: [{
                name: 'clipboard',
                items: ['Undo', 'Redo', 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord']
            },
            {
                name: 'editing',
                items: ['Find', 'Replace', '-', 'SelectAll']
            },
            {
                name: 'basicstyles',
                items: ['Bold', 'Italic', 'Underline', 'Strike', '-', 'RemoveFormat']
            },
            {
                name: 'paragraph',
                items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote']
            },
            {
                name: 'insert',
                items: ['Image', 'Table', 'HorizontalRule', 'SpecialChar']
            },
            {
                name: 'styles',
                items: ['Styles', 'Format', 'Font', 'FontSize']
            },
            {
                name: 'colors',
                items: ['TextColor', 'BGColor']
            },
            {
                name: 'tools',
                items: ['Maximize', 'ShowBlocks']
            },
            {
                name: 'document',
                items: ['Source']
            }
        ]
    });
</script>
<?= $this->endSection() ?>