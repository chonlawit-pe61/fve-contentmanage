<?php $this->extend('template/users_layout') ?>

<?php $this->section('style'); ?>
<style>
</style>

</style>
<?php $this->endSection() ?>
<?php $this->section('content'); ?>
<?php function renderTableRows($course, $level = 0, $category = '')
{
    $level = $level + 1;
    foreach ($course as $key => $course) {
        if ($course['course_type_id'] == $category) {
            $pd = "px-0";
            if ($level == 1) {
                $pd = "px-3 fw-semibold";
                if (!empty($course['children'])) {
                    echo <<<HTML
                    <tr>
                        <td colspan='8' class='{$pd}'>{$course['name']}</td>
                    </tr>
                    HTML;
                    renderTableRows($course['children'], $level, $category);
                } else {
                    echo <<<HTML
                                        <tr>
                                            <td class='{$pd}'>{$course['name']}</td>
                                            <td><span id='{$course["id"]}_voc_1_value' name='course[{$course["id"]}][voc_1_value]' class='numberic d-block'></span></td>
                                            <td><span id='{$course["id"]}_voc_2_value' name='course[{$course["id"]}][voc_2_value]' class='numberic d-block'></span></td>
                                            <td><span id='{$course["id"]}_voc_3_value' name='course[{$course["id"]}][voc_3_value]' class='numberic d-block'></span></td>
                                            <td><span id='{$course["id"]}_voc_residue_value' name='course[{$course["id"]}][voc_residue_value]' class='numberic d-block'></span></td>
                                            <td><span id='{$course["id"]}_hvoc_1_value' name='course[{$course["id"]}][hvoc_1_value]' class='numberic d-block'></span></td>
                                            <td><span id='{$course["id"]}_hvoc_2_value' name='course[{$course["id"]}][hvoc_2_value]' class='numberic d-block'></span></td>
                                            <td><span id='{$course["id"]}_hvoc_residue_value' name='course[{$course["id"]}][hvoc_residue_value]' class='numberic d-block'></span></td>
                                        </tr>
                                        HTML;
                }
            }
            if ($level == 2) {
                $pd = "px-5";
                echo <<<HTML
                                    <tr>
                                        <td class='{$pd}'>{$course['name']}</td>
                                        <td><span id='{$course["id"]}_voc_1_value' name='course[{$course["id"]}][voc_1_value]' class=' numberic d-block'></span></td>
                                        <td><span id='{$course["id"]}_voc_2_value' name='course[{$course["id"]}][voc_2_value]' class=' numberic d-block'></span></td>
                                        <td><span id='{$course["id"]}_voc_3_value' name='course[{$course["id"]}][voc_3_value]' class=' numberic d-block'></span></td>
                                        <td><span id='{$course["id"]}_voc_residue_value' name='course[{$course["id"]}][voc_residue_value]' class=' numberic d-block'></span></td>
                                        <td><span id='{$course["id"]}_hvoc_1_value' name='course[{$course["id"]}][hvoc_1_value]' class=' numberic d-block'></span></td>
                                        <td><span id='{$course["id"]}_hvoc_2_value' name='course[{$course["id"]}][hvoc_2_value]' class=' numberic d-block'></span></td>
                                        <td><span id='{$course["id"]}_hvoc_residue_value' name='course[{$course["id"]}][hvoc_residue_value]' class=' numberic d-block'></span></td>
                                    </tr>
                                    HTML;

                if (!empty($course['children'])) {
                    renderTableRows($course['children'], $level, $category);
                }
            }
        }
    }
}
?>
<div data-aos="fade-up" class="bg_content">
    <div class="container px-5">
        <div class="py-5 w-100">
            <div class="row">
                <div class="col-lg-12">
                    <div class="">
                        <div class="row">
                            <div class="col-12 my-2 text-center">
                                <h3>ข้อมูลนักศึกษา</h3>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-md-3 my-2">
                                <label for="edu_year" class="form-label">ปีการศึกษา</label>
                                <select name="edu_year" id="edu_year" class="form-select" required>
                                    <option value="">-- เลือก --</option>
                                    <?php
                                    $start_year = 2023;

                                    for ($i = $start_year; $i <= date('Y-m-d'); $i++) {
                                    ?>
                                        <option value="<?= $i ?>" <?= (!empty($_GET['edu_year']) && $_GET['edu_year'] == $i) ? 'selected' : '' ?>><?= $i + 543 ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-12 my-2">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="bg-header-table  text-white align-middle text-center">
                                            <tr>
                                                <td rowspan="2">ประเภทวิชา/กลุ่มงาน/สาขาวิชา</td>
                                                <td rowspan="1" colspan="4">ระดับ ปวช.</td>
                                                <td rowspan="1" colspan="3">ระดับ ปวส.</td>
                                            </tr>
                                            <tr>
                                                <td width="10%">ปี 1</td>
                                                <td width="10%">ปี 2</td>
                                                <td width="10%">ปี 3</td>
                                                <td width="10%">ตกค้าง</td>
                                                <td width="10%">ปี 1</td>
                                                <td width="10%">ปี 2</td>
                                                <td width="10%">ตกค้าง</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($course_type as $mainkey => $category) {
                                            ?>
                                                <tr class="bg-primary-subtle-new text-dark">
                                                    <td colspan="8">
                                                        <strong><?= $mainkey + 1 . '. ' . $category['name'] ?></strong>
                                                    </td>
                                                </tr>

                                            <?php
                                                renderTableRows($course, 0, $category['id'], @$data);
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<?php $this->endSection() ?>
<?php $this->section('scripts'); ?>
<script>
    var data = JSON.parse('<?= json_encode($data) ?>');
    // console.log(data);
    $(document).ready(function() {
        for (const key in data) {
            const item = data[key];
            if (item !== null) {
                console.log(item);
                $(`#${item.course_id}_voc_1_value`).text(item.voc_1_value);
                $(`#${item.course_id}_voc_2_value`).text(item.voc_2_value);
                $(`#${item.course_id}_voc_3_value`).text(item.voc_3_value);
                $(`#${item.course_id}_voc_residue_value`).text(item.voc_residue_value);
                $(`#${item.course_id}_hvoc_1_value`).text(item.hvoc_1_value);
                $(`#${item.course_id}_hvoc_2_value`).text(item.hvoc_2_value);
                $(`#${item.course_id}_hvoc_residue_value`).text(item.hvoc_residue_value);
            }
        }

        $('#edu_year').change(function() {
            let year = $(this).val();
            // console.log(year);
            let url = '<?= base_url('About/information_student?edu_year=') ?>' + year;
            window.location = url;
        });
    });
</script>

<?php $this->endSection() ?>