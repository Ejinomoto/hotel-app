<!DOCTYPE html>

<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default"
	data-assets-path="<?php echo base_url('assets/vuexy/assets/)')?>"
	data-template="vertical-menu-template-no-customizer">

<head>
	<meta charset="utf-8" />
	<meta name="viewport"
		content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

	<title>Login Basic - Pages | Vuexy - Bootstrap Admin Template</title>

	<meta name="description" content="" />

	<?php $this->load->view('asset/css'); ?>
</head>

<body>
	<!-- Content -->

	<div class="container-xxl">
		<div class="authentication-wrapper authentication-basic container-p-y">
			<div class="authentication-inner py-4">
				<!-- Login -->
				<div class="card">
					<div class="card-body">
						<!-- Logo -->
						<div class="app-brand justify-content-center mb-4 mt-2">
							<a href="index.html" class="app-brand-link gap-2">
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
								<span class="app-brand-text demo text-body fw-bold ms-1">Hotel Hebat</span>
							</a>
						</div>
						<!-- /Logo -->
						<h4 class="mb-1 pt-2">Welcome to Hotel Hebat! 👋</h4>
						<p class="mb-4">Please sign-in to your account and start the adventure</p>

						<form id="formAuthentication" class="mb-3" action="<?php echo site_url('auth/login_action');?>"
							method="POST">
							<div class="mb-3">
								<label for="email" class="form-label">Username</label>
								<input type="text" class="form-control" id="username" name="username" placeholder="Enter your username"
									autofocus />
							</div>
							<div class="mb-3 form-password-toggle">
								<div class="d-flex justify-content-between">
									<label class="form-label" for="password">Password</label>
									<a href="auth-forgot-password-basic.html">
									</a>
								</div>
								<div class="input-group input-group-merge">
									<input type="password" id="password" class="form-control" name="password"
										placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
										aria-describedby="password" />
									<span class="input-group-text cursor-pointer" id="togglePassword">
										<i class="ti ti-eye-off" id="icon"></i>
									</span>
									<script>
										// Get the elements
										const togglePassword = document.querySelector('#togglePassword');
										const passwordField = document.querySelector('#password');
										const icon = document.querySelector('#icon');

										// Add a click event listener to the toggle icon
										togglePassword.addEventListener('click', function () {
											// Toggle the password field between 'password' and 'text'
											const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
											passwordField.setAttribute('type', type);

											// Toggle the icon between eye and eye-off
											icon.classList.toggle('ti-eye');
											icon.classList.toggle('ti-eye-off');
										});

									</script>
								</div>
							</div>
							<div class="mb-3">
								<button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
							</div>
						</form>

						<p class="text-center">
							<span>New on our platform?</span>
							<a href="<?php echo site_url('auth/register'); ?>">
								<span>Create an account</span>
							</a>
						</p>


					</div>
				</div>
				<!-- /Register -->
			</div>
		</div>
	</div>

	<!-- / Content -->


</body>

</html>
