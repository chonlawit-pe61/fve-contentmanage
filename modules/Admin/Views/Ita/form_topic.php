<?= $this->extend('template/admin_layout') ?>

<?= $this->section('content') ?>
<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4"><?= isset($topic) ? 'แก้ไขหัวข้อ' : 'เพิ่มหัวข้อ' ?></h5>

        <form action="<?= base_url('admin/ita/save_topic') ?>" method="post">
            <?php if (isset($topic)) : ?>
                <input type="hidden" name="id" value="<?= $topic['id'] ?>">
            <?php endif; ?>

            <div class="mb-3">
                <label class="form-label">ปีงบประมาณ (พ.ศ.)</label>
                <select name="ita_year" class="form-select" required>
                    <?php
                    $currentYear = date('Y') + 543;
                    $selectedYear = isset($topic) ? $topic['ita_year'] : ($year ?? $currentYear);

                    // Range: Current + 1 down to Current - 2
                    $years = range($currentYear + 1, $currentYear - 2);

                    if (!in_array($selectedYear, $years)) {
                        $years[] = $selectedYear;
                    }
                    rsort($years);

                    foreach ($years as $y) :
                    ?>
                        <option value="<?= $y ?>" <?= ($y == $selectedYear) ? 'selected' : '' ?>><?= $y ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">ชื่อหัวข้อ</label>
                <input type="text" name="name" class="form-control" value="<?= isset($topic) ? $topic['name'] : '' ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">ลำดับการแสดงผล</label>
                <input type="number" name="list_order" class="form-control" value="<?= isset($topic) ? $topic['list_order'] : '0' ?>">
            </div>

            <button type="submit" class="btn btn-primary">บันทึก</button>
            <a href="<?= isset($year) ? base_url('admin/ita/topics/' . $year) : base_url('admin/ita') ?>" class="btn btn-outline-secondary">ยกเลิก</a>
        </form>
    </div>
</div>
<?= $this->endSection() ?>