<?php $this->extend('template/admin_layout') ?>

<?php $this->section('content'); ?>
<div class="container-fluid">
    <div class="row">

        <div class="col-md-6">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-6">
                    <a href="<?= base_url('admin/member') ?>">
                        <div class="item">
                            <div class="card border-0 zoom-in bg-secondary-subtle shadow-sm">
                                <div class="card-body">
                                    <div class="text-center">
                                        <img src="<?= base_url('public/img/emp_icon.png') ?>" width="50" height="50" class="mb-3" alt="modernize-img">
                                        <p class="fw-semibold fs-3 text-secondary mb-1">บุคลากรทั้งหมด</p>
                                        <h5 class="fw-semibold text-secondary mb-0"><?= number_format($members['value'], 0) ?></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-4 col-md-4 col-6">
                    <a href="<?= base_url('admin/news') ?>">
                        <div class="item">
                            <div class="card border-0 zoom-in bg-primary-subtle shadow-sm">
                                <div class="card-body">
                                    <div class="text-center">
                                        <img src="<?= base_url('public/img/news_icon.png') ?>" width="50" height="50" class="mb-3" alt="modernize-img">
                                        <p class="fw-semibold fs-3 text-primary mb-1">ข่าวสารทั้งหมด</p>
                                        <h5 class="fw-semibold text-primary mb-0"><?= number_format($news['value'], 0) ?></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-4 col-md-4 col-6">
                    <a href="<?= base_url('admin/reward') ?>">
                        <div class="item">
                            <div class="card border-0 zoom-in bg-warning-subtle shadow-sm">
                                <div class="card-body">
                                    <div class="text-center">
                                        <img src="<?= base_url('public/img/trophy_icon.png') ?>" width="50" height="50" class="mb-3" alt="modernize-img">
                                        <p class="fw-semibold fs-3 text-warning mb-1">รางวัลทั้งหมด</p>
                                        <h5 class="fw-semibold text-warning mb-0"><?= number_format($rewards['value'], 0) ?></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-4 col-md-4 col-6">
                    <a href="<?= base_url('admin/course') ?>">
                        <div class="item">
                            <div class="card border-0 zoom-in bg-light-subtle shadow-sm">
                                <div class="card-body">
                                    <div class="text-center">
                                        <img src="<?= base_url('public/img/course_icon.png') ?>" width="50" height="50" class="mb-3" alt="modernize-img">
                                        <p class="fw-semibold fs-3 text-dark mb-1">หลักสูตรทั้งหมด</p>
                                        <h5 class="fw-semibold text-dark mb-0"><?= number_format($course['value'], 0) ?></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-4 col-md-4 col-6">
                    <div class="item">
                        <div class="card border-0 zoom-in bg-danger-subtle shadow-sm">
                            <div class="card-body">
                                <div class="text-center">
                                    <img src="<?= base_url('public/img/mouse_cursor_icon.png') ?>" width="50" height="50" class="mb-3" alt="modernize-img">
                                    <p class="fw-semibold fs-3 text-danger mb-1">ผู้เข้าชมทั้งหมด</p>
                                    <h5 class="fw-semibold text-danger mb-0"><?= number_format($views_count['value'], 0) ?></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="row">
                <div class="col-12">
                    <div>
                        <a href="<?= base_url('admin/student/student-states-forms') ?>?edu_year=<?= date('Y') ?>" class="btn btn-primary btn-sm float-end">
                            <i class="ti ti-users"></i> กรอกข้อมูล นศ.
                        </a>
                    </div>
                </div>
            </div>
            <figure class="highcharts-figure">
                <div id="container"></div>
            </figure>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body">
                    <div class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                        <div class="mb-3 mb-sm-0">
                            <h4 class="card-title fw-semibold">Top 5</h4>
                            <p class="card-subtitle">บทความ/ข่าวสารที่ได้รับความสนใจ</p>
                        </div>
                        <!-- <div>
                            <select class="form-select">
                                <option value="1">March 2024</option>
                                <option value="2">April 2024</option>
                                <option value="3">May 2024</option>
                                <option value="4">June 2024</option>
                            </select>
                        </div> -->
                    </div>
                    <div class="table-responsive">
                        <table class="table align-middle text-nowrap mb-0">
                            <thead>
                                <tr class="text-muted fw-semibold">
                                    <th scope="col" class="ps-0">หัวข้อ</th>
                                    <th scope="col">วันที่เผยแพร่</th>
                                    <th scope="col">ประเภท</th>
                                    <th scope="col">จำนวนครั้งเช้าชม</th>
                                </tr>
                            </thead>
                            <tbody class="border-top">
                                <?php foreach ($top5_news as $news) { ?>
                                    <tr>
                                        <td class="ps-0">
                                            <div class="d-flex align-items-center">
                                                <div class="me-2 pe-1">
                                                    <img src="<?= base_url('public/img/news_icon.png') ?>" class="" width="40" height="40" alt="modernize-img">
                                                </div>
                                                <div class="d-flex align-items-center" style="word-break: break-all;">
                                                    <h6 class="fw-semibold mb-1 td-truncate text-truncate"><?= $news['title'] ?></h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="mb-0 fs-3">
                                                <?= date('d/m/Y H:i', strtotime($news['create_at'])) ?>น.
                                            </p>
                                        </td>
                                        <td>
                                            <span class="fw-semibold py-1 w-85 text-primary">
                                                <?= $news['category_name'] ?>
                                            </span>
                                        </td>
                                        <td>
                                            <p class="fs-3 text-dark mb-0"><?= number_format($news['views'], 0) ?></p>
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
</div>

<?php $this->endSection(); ?>

<?php $this->section('scripts'); ?>
<script>
    $(document).ready(function() {
        Highcharts.chart('container', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'จำนวนนักศึกษาแต่ละหลักสูตรแยกตามปี (ย้อนหลัง 3 ปี)',
                align: 'left'
            },
            xAxis: {
                categories: ['<?= @$student_state[0]['edu_year'] + 543 ?>', <?= @$student_state[1]['edu_year'] + 543 ?>, <?= @$student_state[2]['edu_year'] + 543 ?>]
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'จำนวน'
                },
                stackLabels: {
                    enabled: true
                },
                visible: false, //ซ่อนข้อมูลแกน y
            },

            tooltip: {
                headerFormat: '<b>{category}</b><br/>',
                pointFormat: '{series.name}: {point.y}<br/>ทั้งหมด: {point.stackTotal}'
            },
            plotOptions: {
                column: {
                    stacking: 'normal',
                    dataLabels: {
                        enabled: true
                    }
                }
            },
            series: [{
                name: 'ปวช.',
                data: [<?= @$student_state[0]['voc_value'] ?>, <?= @$student_state[1]['voc_value'] ?>, <?= @$student_state[2]['voc_value'] ?>]
            }, {
                name: 'ปวส.',
                data: [<?= @$student_state[0]['hvoc_value'] ?>, <?= @$student_state[1]['hvoc_value'] ?>, <?= @$student_state[2]['hvoc_value'] ?>]
            }, ]
        });
    })
</script>
<?php $this->endSection(); ?>