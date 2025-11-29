<!-- <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>404 Page Not Found</title>

	<style>
	div.logo {
		height: 200px;
		width: 155px;
		display: inline-block;
		opacity: 0.08;
		position: absolute;
		top: 2rem;
		left: 50%;
		margin-left: -73px;
	}
	body {
		height: 100%;
		background: #fafafa;
		font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
		color: #777;
		font-weight: 300;
	}
	h1 {
		font-weight: lighter;
		letter-spacing: 0.8;
		font-size: 3rem;
		margin-top: 0;
		margin-bottom: 0;
		color: #222;
	}
	.wrap {
		max-width: 1024px;
		margin: 5rem auto;
		padding: 2rem;
		background: #fff;
		text-align: center;
		border: 1px solid #efefef;
		border-radius: 0.5rem;
		position: relative;
	}
	pre {
		white-space: normal;
		margin-top: 1.5rem;
	}
	code {
		background: #fafafa;
		border: 1px solid #efefef;
		padding: 0.5rem 1rem;
		border-radius: 5px;
		display: block;
	}
	p {
		margin-top: 1.5rem;
	}
	.footer {
		margin-top: 2rem;
		border-top: 1px solid #efefef;
		padding: 1em 2em 0 2em;
		font-size: 85%;
		color: #999;
	}
	a:active,
	a:link,
	a:visited {
		color: #dd4814;
	}
</style>
</head>
<body>
	<div class="wrap">
		<h1>404 - File Not Found</h1>

		<p>
			<?php if (! empty($message) && $message !== '(null)') : ?>
				<?= esc($message) ?>
			<?php else : ?>
				Sorry! Cannot seem to find the page you were looking for.
			<?php endif ?>
		</p>
	</div>
</body>
</html> -->


<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme" data-layout="vertical" data-boxed-layout="boxed" data-card="shadow">

<head>
	<!-- Required meta tags -->
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Favicon icon-->
    <link rel="shortcut icon" href="<?= base_url('public/img/logo_nbg.png') ?>" type="image/icon type">
	<link rel="stylesheet" href="<?php echo base_url('public/assets/css/styles.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('public/assets/css/myStyles.css') ?>">
	<!-- Core Css -->
	<link rel="stylesheet" href="../assets/css/styles.css">

	<title>ไม่พบหน้าเว็บ</title>
</head>

<body data-sidebartype="mini-sidebar" cz-shortcut-listen="true">
	<!-- Preloader -->
	<div class="preloader" style="display: none;">
		<img src="../assets/images/logos/favicon.png" alt="loader" class="lds-ripple img-fluid">
	</div>
	<div id="main-wrapper">
		<div class="position-relative overflow-hidden min-vh-100 w-100 d-flex align-items-center justify-content-center">
			<div class="d-flex align-items-center justify-content-center w-100">
				<div class="row justify-content-center w-100">
					<div class="col-lg-4">
						<div class="text-center">
							<img src="<?= base_url('public/img/errorimg.svg') ?>" alt="modernize-img" class="img-fluid" width="500">
							<h1 class="fw-semibold mb-7 fs-9">ขออภัย!!!</h1>
							<h4 class="fw-semibold mb-7">ไม่พบหน้าที่ค้นหา</h4>
							<!-- <a class="btn btn-primary" href="../main/index.html" role="button">กลับ</a> -->
							<?php if (! empty($message) && $message !== '(null)' && env('CI_ENVIRONMENT') == 'development') { ?>
								<?= esc($message) ?>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>