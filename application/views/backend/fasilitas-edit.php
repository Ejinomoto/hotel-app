<body>
	<!-- Layout wrapper -->
	<!-- Layout wrapper -->
	<div class="layout-wrapper layout-content-navbar">
		<div class="layout-container">
			<!-- Menu -->

			<?php $this->load->view('asset/sidebar'); ?>

			<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
				<div class="app-brand demo">
					<a href="index.html" class="app-brand-link">
						<span class="app-brand-logo demo">
							<svg width="32" height="22" viewBox="0 0 32 22" fill="none"
								xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" clip-rule="evenodd"
									d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z"
									fill="#7367F0" />
								<path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd"
									d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z"
									fill="#161616" />
								<path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd"
									d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z"
									fill="#161616" />
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
					<!-- Page -->
					<li class="menu-item active">
						<a href="#" class="menu-link">
							<i class="menu-icon tf-icons ti ti-smart-home"></i>
							<div data-i18n="Page 1">Kamar</div>
						</a>
					</li>

				</ul>
			</aside>
			<!-- / Menu -->

			<!-- Layout container -->
			<div class="layout-page">
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
							</a>
						</div>

						<ul class="navbar-nav flex-row align-items-center ms-auto">
							<!-- User -->
							<ul class="navbar-nav flex-row align-items-center ms-auto">
								<?php if ($this->session->userdata('user_id')): ?>
									<!-- User is logged in -->
									<li class="nav-item">
										<a class="btn btn-outline-primary me-2"
											href="<?php echo base_url('auth/logout'); ?>">
											<i class="ti ti-logout me-2 ti-sm"></i>
											<span class="align-middle">Log Out</span>
										</a>
									</li>
									<li class="nav-item">
										<a class="btn btn-primary text-white"
											href="<?php echo base_url('user/profile'); ?>">
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
				<br>

				<!-- Content wrapper -->
				<div class="container">
					<div class="row">
						<div class="col-md-3">
							<div class="card border-success">
								<div class="card-body">
									<?php echo form_open_multipart('fasilitas/edit'); ?>
									<div class="mb-3">
										<label class="form-label">Nama</label>
										<input type="text" name="name" class="form-control"
											value="<?= $editnya->name ?>">
									</div>
									<div class="mb-3">
										<label class="form-label">Description</label>
										<input type="text" name="description" class="form-control"
											value="<?= $editnya->description ?>">
									</div>
									<div class="mb-3">
										<label class="form-label">Gambar</label>
										<input type="file" name="gambar" class="form-control">
									</div>

									<button type="" class="btn btn-danger"><a href="<?= base_url('fasilitas') ?>"
											class="text-white">Go Back</a></button>
									<button type="submit" name="submit" class="btn btn-primary">Submit</button>
									</form>
								</div>
							</div>
						</div>

						<script>
							function addFacility() {
								let newField = `
							<div class="input-group mb-2">
								<input type="text" class="form-control" name="fasilitas_kamar[]" placeholder="Enter facility" required>
								<button type="button" class="btn btn-danger" onclick="removeFacility(this)">Remove</button>
							</div>`;
								document.getElementById('facilities').insertAdjacentHTML('beforeend', newField);
							}

							function removeFacility(button) {
								button.parentElement.remove();
							}
						</script>


						<div class="col-md-9">
							<div class="card border-danger">
								<div class="card-body">
									<table id="example" class="table table-bordered" style="width:100%">
										<thead>
											<tr class="text-center">
												<th>No</th>
												<th>Nama Fasilitas</th>
												<th>Deskripsi</th>
												<th>Gambar</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php $no = 1;
											foreach ($row as $r): ?>
												<tr class="text-center">
													<td><?= $no++ ?></td>
													<td><?= $r->name; ?></td>
													<td><?= $r->description; ?></td>
													<td>
														<img src="<?= base_url('uploads/' . $r->gambar) ?>" width="100px">
													</td>
													<td>
														<a href="#" class="btn btn-sm btn-success">Edit</a>
														<a href="#" class="btn btn-sm btn-danger">Delete</a>
													</td>
												</tr>
											<?php endforeach ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- / Content -->

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
								, made with ❤️ by <a href="https://pixinvent.com" target="_blank"
									class="fw-semibold">Pixinvent</a>
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
			<!-- Content wrapper -->
		</div>
		<!-- / Layout page -->
	</div>


</body>

</html>