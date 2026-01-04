<?php $this->extend('template/users_layout') ?>

<?php $this->section('style'); ?>
<style>
    :root {
        --primary-color: #870100;
        /* Maroon / Blood Red */
        --accent-color: #D4AF37;
        /* Gold */
        --text-dark: #2d3436;
        --bg-light: #f8f9fa;
        --white: #ffffff;
    }

    .bg_content {
        background: linear-gradient(180deg, #fff 0%, var(--bg-light) 100%);
        padding-bottom: 6rem;
        font-family: 'Sarabun', sans-serif;
    }

    .section-title {
        font-weight: 800;
        color: var(--primary-color);
        position: relative;
        display: inline-block;
        margin-bottom: 3rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        z-index: 1;
        font-size: 2rem;
    }

    .section-title::after {
        content: '';
        position: absolute;
        width: 60px;
        height: 5px;
        background: var(--accent-color);
        bottom: -12px;
        left: 50%;
        transform: translateX(-50%);
        border-radius: 10px;
    }

    .group-title {
        color: var(--text-dark);
        font-weight: 700;
        margin-top: 3rem;
        margin-bottom: 2rem;
        text-align: center;
        position: relative;
        font-size: 1.5rem;
        padding-left: 0;
    }

    .group-title::after {
        content: '';
        display: block;
        width: 50px;
        height: 4px;
        background: var(--primary-color);
        margin: 10px auto 0;
        border-radius: 2px;
    }

    /* --- Brand New Card Design --- */
    .executive-card {
        background: var(--white);
        border-radius: 16px;
        transition: all 0.4s ease;
        border: none;
        height: 100%;
        position: relative;
        overflow: visible;
        margin-top: 30px;
    }

    /* The "Maroon Background" Frame */
    .img-frame {
        background: linear-gradient(135deg, #870100 0%, #600000 100%);
        padding: 6px;
        border-radius: 14px;
        box-shadow: 0 10px 20px rgba(135, 1, 0, 0.2);
        width: 180px;
        height: 220px;
        /* 4:5 Portrait */
        margin: 0 auto 20px;
        position: relative;
        transition: transform 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        z-index: 2;
    }

    .executive-card:hover .img-frame {
        transform: translateY(-15px) scale(1.02);
        box-shadow: 0 20px 30px rgba(135, 1, 0, 0.3);
    }

    /* Decorative Gold Accent on Frame */
    .img-frame::after {
        content: '';
        position: absolute;
        bottom: -5px;
        right: -5px;
        width: 40px;
        height: 40px;
        border-bottom: 4px solid var(--accent-color);
        border-right: 4px solid var(--accent-color);
        border-radius: 0 0 14px 0;
        opacity: 0.7;
        transition: 0.3s;
    }

    .executive-card:hover .img-frame::after {
        opacity: 1;
        width: 100%;
        height: 100%;
        border-radius: 14px;
    }

    .img-personal {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 10px;
        display: block;
        background-color: #fff;
    }

    /* Info Section */
    .card-info {
        text-align: center;
        padding: 0 15px 20px;
        position: relative;
        z-index: 2;
    }

    .executive-name {
        color: var(--text-dark);
        font-weight: 700;
        font-size: 1.15rem;
        margin-bottom: 8px;
        line-height: 1.3;
    }

    .executive-position {
        color: var(--primary-color);
        font-weight: 600;
        font-size: 0.9rem;
        display: inline-block;
        position: relative;
        padding-bottom: 5px;
    }

    /* Director / Head Special Card */
    .director-card {
        max-width: 500px;
        margin: 0 auto;
        padding: 0;
        background: transparent;
        box-shadow: none;
    }

    .director-card .img-frame {
        width: 220px;
        height: 275px;
        padding: 8px;
        background: linear-gradient(135deg, #d4af37 0%, #870100 100%);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    }

    .director-card .executive-name {
        font-size: 1.5rem;
        margin-top: 1.5rem;
    }

    .director-card .executive-position {
        font-size: 1.1rem;
        background: rgba(135, 1, 0, 0.08);
        padding: 6px 20px;
        border-radius: 50px;
    }

    /* Responsive Grid */
    .executives-row {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 30px;
    }

    .exec-col {
        flex: 0 0 250px;
        max-width: 280px;
    }

    a.card-link {
        text-decoration: none;
        display: block;
        height: 100%;
    }
</style>
<?php $this->endSection() ?>

<?php $this->section('content'); ?>
<?php
// PHP Logic to process $org data
$rootName = "งานบุคลากร";
$heads = []; // Leaders (Single people nodes)
$groups = []; // Staff groups
$subDepartments = []; // Child Organizations

if (isset($org) && is_array($org)) {
    // 1. Find Root Node to get Name
    foreach ($org as $node) {
        if (strpos($node['id'], 'org_') === 0 && empty($node['parentId'])) {
            $rootName = $node['name'];
            break;
        }
    }

    // 2. Classify Nodes
    foreach ($org as $node) {
        // Skip root node from being displayed as a card itself
        if (strpos($node['id'], 'org_') === 0 && empty($node['parentId'])) {
            continue;
        }

        if (isset($node['people']) && is_array($node['people'])) {
            // This is a Group of People
            $groups[] = $node;
        } elseif (isset($node['personal_id'])) {
            // This is a Single Leader/Executive
            $heads[] = $node;
        } elseif (strpos($node['id'], 'org_') === 0) {
            // This is a sub-department
            $subDepartments[] = $node;
        }
    }
}
?>

<div class="bg_content">
    <div class="">
        <div class="py-5">
            <!-- Header -->
            <div class="text-center mb-5" data-aos="fade-down">
                <h1 class="section-title"><?= $rootName ?></h1>
            </div>

            <!-- 1. Heads / Executives Section -->
            <?php if (!empty($heads)): ?>
                <div class="mb-5">
                    <div class="executives-row justify-content-center">
                        <?php foreach ($heads as $head): ?>
                            <?php
                            $link = "organization_personal/" . ($head['personal_id'] ?? '#');
                            ?>
                            <div class="director-wrapper text-center" data-aos="zoom-in" style="flex: 0 0 auto;">
                                <a href="<?= $link ?>" class="card-link">
                                    <div class="executive-card director-card">
                                        <div class="img-frame">
                                            <img class="img-personal" src="<?= $head['img'] ?>" alt="<?= $head['name'] ?>">
                                        </div>
                                        <div class="card-info">
                                            <h4 class="executive-name"><?= $head['name'] ?></h4>
                                            <span class="executive-position"><?= $head['title'] ?></span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>

            <!-- 2. Groups Section -->
            <?php if (!empty($groups)): ?>
                <?php foreach ($groups as $group): ?>
                    <div class="group-section mb-5" data-aos="fade-up">
                        <h3 class="group-title"><?= $group['name'] ?></h3>
                        <div class="executives-row">
                            <?php foreach ($group['people'] as $key => $person): ?>
                                <?php
                                $link = "organization_personal/" . ($person['personal_id'] ?? '#');
                                ?>
                                <div class="exec-col" data-aos="fade-up" data-aos-delay="<?= ($key % 4) * 50 ?>">
                                    <a href="<?= $link ?>" class="card-link">
                                        <div class="executive-card">
                                            <div class="img-frame">
                                                <img class="img-personal" src="<?= $person['img'] ?>" alt="<?= $person['name'] ?>">
                                            </div>
                                            <div class="card-info">
                                                <h5 class="executive-name"><?= $person['name'] ?></h5>
                                                <span class="executive-position"><?= $person['title'] ?></span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>

            <!-- 3. Sub-Departments (If any) -->
            <?php if (!empty($subDepartments)): ?>
                <!-- Optional: Display links to sub departments if need -->
            <?php endif; ?>

        </div>
    </div>
</div>
<?php $this->endSection() ?>

<?php $this->section('scripts'); ?>
<script>
    // AOS Animation handled globally
</script>
<?php $this->endSection() ?>