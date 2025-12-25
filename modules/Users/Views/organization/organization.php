<?php $this->extend('template/users_layout') ?>

<?php $this->section('style'); ?>
<style>
    .size-img {
        width: 100px;
    }

    .people-grid {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 10px;
    }

    .person-box {
        /* width: 80px; */
        text-align: center;
    }
</style>
<?php $this->endSection() ?>

<?php $this->section('content'); ?>
<div data-aos="fade-up" class="bg_content">
    <div class="py-5 px-5">
        <div class="text-center">
            <h1>
                <?php
                if (!empty($parent_id)) {
                    if ($parent_id == 1) {
                        echo 'ฝ่ายบริหารทรัพยากร';
                    } elseif ($parent_id == 2) {
                        echo 'ฝ่ายแผนงานและความร่วมมือ';
                    } elseif ($parent_id == 3) {
                        echo 'ฝ่ายพัฒนากิจการนักศึกษา';
                    } elseif ($parent_id == 4) {
                        echo 'ฝ่ายวิชาการ';
                    }
                }
                ?>
            </h1>
        </div>
        <div class="container border vh-100">
            <div id="chart-container" class="w-100"></div>
        </div>
    </div>
</div>
<?php $this->endSection() ?>

<?php $this->section('scripts'); ?>
<script>
    $(document).ready(function() {
        const org = <?php echo json_encode($org) ?>;

        const chart = new d3.OrgChart()
            .container("#chart-container")
            .data(org)
            .nodeWidth(d => 400)
            .nodeHeight(d => 220)
            .childrenMargin(() => 40)
            .compactMarginBetween(() => 35)
            .compactMarginPair(() => 30)
            .nodeContent((d) => {
                const hasPeople = Array.isArray(d.data.people);
                console.log(d);

                if (hasPeople) {
                    const peopleHTML = d.data.people.map(p => `
                       <a href="organization_personal/${p.personal_id}">
                        <div class="person-box">
                            <img src="${p.img}" style="width:60px; height:60px;">
                            <div style="font-weight:bold; font-size:16px">${p.name}</div>
                            <div style="font-size:12px; color:#666">${p.title}</div>
                        </div>
                       </a>
                    `).join('');

                    return `
                        <div style="padding:15px; background:#f5f5f5; border:1px solid #ccc; border-radius:8px;">
                            <div style="font-weight:bold; font-size:18px; margin-bottom:8px; text-align:center">${d.data.name}</div>
                            <div class="people-grid">${peopleHTML}</div>
                        </div>
                    `;
                } else {
                    return `
                    <a href="organization_personal/${d.data.personal_id}">
                        <div style="padding:15px; background:#fff; border:1px solid #ddd; border-radius:8px; height:100%; width:100%; text-align:center">
                            <img src="${d.data.img}" alt="${d.data.name}" style="width:100px; height:100px; ">
                            <div style="font-weight:bold; margin-top:10px;font-size:16px">${d.data.name}</div>
                            <div style="font-size:16px; color:#666;">${d.data.title}</div>
                        </div>
                    </a>
                    `;
                }
            })
            .expandAll()
            .render();
    });
</script>
<?php $this->endSection() ?>