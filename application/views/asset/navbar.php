<!-- navbar.php -->
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed" dir="ltr" data-theme="theme-default"
	data-assets-path="<?php echo base_url('assets/vuexy/assets/'); ?>" data-template="vertical-menu-template-starter">

<head>
	<meta charset="utf-8" />
	<meta name="viewport"
		content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

	<title>Hotel Hebat</title>

	<meta name="description" content="" />

	<!-- Favicon -->
	<link rel="icon" type="image/x-icon" href="<?php echo base_url('assets/vuexy/assets/img/favicon/favicon.ico'); ?>" />

	<!-- Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link
		href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
		rel="stylesheet" />

	<!-- Icons -->
	<link rel="stylesheet" href="<?php echo base_url('assets/vuexy/assets/vendor/fonts/fontawesome.css'); ?>" />
	<link rel="stylesheet" href="<?php echo base_url('assets/vuexy/assets/vendor/fonts/tabler-icons.css'); ?>" />
	<link rel="stylesheet" href="<?php echo base_url('assets/vuexy/assets/vendor/fonts/flag-icons.css'); ?>" />

	<!-- Core CSS -->
	<link rel="stylesheet" href="<?php echo base_url('assets/vuexy/assets/vendor/css/rtl/core.css'); ?>"
		class="template-customizer-core-css" />
	<link rel="stylesheet" href="<?php echo base_url('assets/vuexy/assets/vendor/css/rtl/theme-default.css'); ?>"
		class="template-customizer-theme-css" />
	<link rel="stylesheet" href="<?php echo base_url('assets/vuexy/assets/css/demo.css'); ?>" />

	<!-- Vendors CSS -->
	<link rel="stylesheet"
		href="<?php echo base_url('assets/vuexy/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css'); ?>" />
	<link rel="stylesheet"
		href="<?php echo base_url('assets/vuexy/assets/vendor/libs/node-waves/node-waves.css'); ?>" />
	<link rel="stylesheet"
		href="<?php echo base_url('assets/vuexy/assets/vendor/libs/typeahead-js/typeahead.css'); ?>" />
	<link rel="stylesheet"
		href="<?php echo base_url('assets/vuexy/assets/vendor/libs/apex-charts/apex-charts.css'); ?>" />
	<link rel="stylesheet" href="<?php echo base_url('assets/vuexy/assets/vendor/libs/swiper/swiper.css'); ?>" />
	<link rel="stylesheet"
		href="<?php echo base_url('assets/vuexy/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css'); ?>" />
	<link rel="stylesheet"
		href="<?php echo base_url('assets/vuexy/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css'); ?>" />
	<link rel="stylesheet"
		href="<?php echo base_url('assets/vuexy/assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css'); ?>" />

	<!-- Page CSS -->
	<link rel="stylesheet" href="<?php echo base_url('assets/vuexy/assets/vendor/css/pages/cards-advance.css'); ?>" />
	<!-- Helpers -->
	<script src="<?php echo base_url('assets/vuexy/assets/vendor/js/helpers.js'); ?>"></script>
	<style>
		#hotel-room .card {
			transition: transform 0.3s ease, background-color 0.3s ease, color 0.3s ease;
		}

		#hotel-room .card:hover {
			background: linear-gradient(45deg, hsla(168, 85%, 52%, 0.5), hsla(263, 88%, 45%, 0.5) 100%);
		}

		/* Apply font color change when card is hovered */
		#hotel-room .card:hover .card-title,
		#hotel-room .card:hover .card-text {
			color: white;
			/* Change font color on hover */
		}
	</style>
</head>
<!-- Menu -->
<div class="layout-wrapper layout-navbar-full layout-horizontal layout-without-menu">

	<!-- Navbar -->

	<nav class="layout-navbar navbar navbar-expand-xl align-items-center bg-navbar-theme" id="layout-navbar">
		<div class="container-xxl">
			<div class="navbar-brand app-brand demo d-none d-xl-flex py-0 me-4">
				<a href="index.html" class="app-brand-link gap-2">
					<span class="app-brand-logo demo">
						<img src="<?php echo base_url('assets/pic/logo.webp'); ?>" alt="Logo" width="32" height="32">
					</span>

					<span class="app-brand-text demo menu-text fw-bold">Elysian Resort & Suites</span>
					<aside id="layout-menu" class="layout-menu-horizontal menu-horizontal menu bg-menu-theme" style="box-shadow:none;">
						<div class="container-xxl d-flex h-100">
							<ul class="menu-inner">
								<li class="menu-item bg-navbar-theme <?php echo ($this->uri->segment(1) == 'welcome') ? 'active' : ''; ?>">
									<a href="<?php echo base_url('welcome'); ?>" class="menu-link">
										<i class="menu-icon tf-icons ti ti-smart-home"></i>
										<div data-i18n="Page 1">Home</div>
									</a>
								</li>
								<li class="menu-item <?php echo ($this->uri->segment(1) == 'facility') ? 'active' : ''; ?>">
									<a href="<?php echo base_url('facility'); ?>" class="menu-link">
										<i class="menu-icon tf-icons ti ti-bath"></i>
										<div data-i18n="Page 2">Fasilitas Umum</div>
									</a>
								</li>
							</ul>
						</div>
					</aside>

				</a>

				<a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-xl-none">
					<i class="ti ti-x ti-sm align-middle"></i>
				</a>
			</div>

			<div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
				<a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
					<i class="ti ti-menu-2 ti-sm"></i>
				</a>
			</div>

			<div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
				<div class="navbar-nav align-items-center">
					<a class="nav-link style-switcher-toggle hide-arrow" href="javascript:void(0);">
						<i class="ti ti-sm"></i>
					</a>
				</div>

				<ul class="navbar-nav flex-row align-items-center ms-auto">

					<!-- User -->
					<ul class="navbar-nav flex-row align-items-center ms-auto">
						<?php if ($this->session->userdata('user_id')): ?>
							<!-- User is logged in -->
							<li class="nav-item">
								<a class="btn btn-outline-primary me-2" href="<?php echo base_url('auth/logout'); ?>">
									<i class="ti ti-logout me-2 ti-sm"></i>
									<span class="align-middle">Log Out</span>
								</a>
							</li>
							<li class="nav-item">
								<a class="btn btn-primary text-white" href="<?php echo base_url('user'); ?>">
									<i class="ti ti-user me-2 ti-sm"></i>
									<span class="align-middle">
										<?php echo $this->session->userdata('username'); ?>
									</span>
								</a>
							</li>
						<?php else: ?>
							<!-- User is not logged in -->
							<li class="nav-item">
								<a class="btn btn-outline-primary" href="<?php echo base_url('auth/login'); ?>">
									<i class="ti ti-login me-2 ti-sm"></i>
									<span class="align-middle">Log In</span>
								</a>
							</li>
						<?php endif; ?>
					</ul>
				</ul>
			</div>
		</div>

	</nav>

	<!-- / Navbar -->

	<!-- Layout container -->

	<!--/ Content -->

	<!-- Footer -->
	<footer class="content-footer footer bg-footer-theme">
		<div class="container-xxl">
			<div
				class="footer-container d-flex align-items-center justify-content-between py-2 flex-md-row flex-column">
				<div>
					©
					<script>
						document.write(new Date().getFullYear());
					</script>
					, made with ❤️ by <a href="https://pixinvent.com" target="_blank" class="fw-semibold">Pixinvent</a>
				</div>
				<div>
					<a href="https://pixinvent.com/demo/vuexy-html-bootstrap-admin-template/documentation/"
						target="_blank" class="footer-link me-4">Documentation</a>
				</div>
			</div>
		</div>
	</footer>
	<!-- / Footer -->

	<div class="content-backdrop fade"></div>
</div>
<!--/ Content wrapper -->
</div>

<!--/ Layout container -->

</div>

<!-- Overlay -->
<div class="layout-overlay layout-menu-toggle"></div>

<!-- Drag Target Area To SlideIn Menu On Small Screens -->
<div class="drag-target"></div>
<!-- / Navbar -->
<script src="<?php echo base_url('assets/vuexy/assets/vendor/libs/jquery/jquery.js'); ?>"></script>
<script src="<?php echo base_url('assets/vuexy/assets/vendor/libs/popper/popper.js'); ?>"></script>
<script src="<?php echo base_url('assets/vuexy/assets/vendor/js/bootstrap.js'); ?>"></script>
<script src="<?php echo base_url('assets/vuexy/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js'); ?>">
</script>
<script src="<?php echo base_url('assets/vuexy/assets/vendor/libs/node-waves/node-waves.js'); ?>"></script>

<script src="<?php echo base_url('assets/vuexy/assets/vendor/libs/hammer/hammer.js'); ?>"></script>
<script src="<?php echo base_url('assets/vuexy/assets/vendor/js/menu.js'); ?>"></script>
<!-- endbuild -->

<!-- Vendors JS -->

<!-- Main JS -->
<script src="<?php echo base_url('assets/vuexy/assets/js/main.js'); ?>"></script>