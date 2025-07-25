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

</head>
<!-- Menu -->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
	<div class="app-brand demo">
		<a href="index.html" class="app-brand-link">
			<span class="app-brand-logo demo">
				<svg width="32" height="22" viewBox="0 0 32 22" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path fill-rule="evenodd" clip-rule="evenodd"
						d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z"
						fill="#7367F0" />
					<path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd"
						d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z" fill="#161616" />
					<path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd"
						d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z" fill="#161616" />
					<path fill-rule="evenodd" clip-rule="evenodd"
						d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z"
						fill="#7367F0" />
				</svg>
			</span>
			<span class="app-brand-text demo menu-text fw-bold">Vuexy</span>
		</a>
		<a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
			<i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
			<i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
		</a>
	</div>

	<div class="menu-inner-shadow"></div>

	<ul class="menu-inner py-1">

	</ul>
</aside>
<!-- / Menu -->

<!-- Navbar -->
<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
	id="layout-navbar">
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
					<a class="btn btn-primary text-white" href="<?php echo base_url('user/profile'); ?>">
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
</nav>
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
