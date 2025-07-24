<?php $this->load->view('asset/navbar'); ?>
<?php $this->load->view('asset/css'); ?>

<head>
	<style>
		.carousel-caption {
			top: 50%;
			transform: translateY(-50%);
			bottom: initial;
			/* Remove default bottom positioning */
		}

		.overlay {
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			background-color: rgba(0, 0, 0, 0.4);
			/* Adjust the transparency as needed */
			pointer-events: none;
			/* Ensure the overlay does not block interactions */
			z-index: 1;
		}

		.position-relative img {
			position: relative;
			z-index: 0;
			/* Ensure the image is below the overlay */
		}


		#myCarousel {
			max-height: 400px;
			/* Adjust this value as needed */
			overflow: hidden;
		}

		#myCarousel .carousel-item img {
			height: 100%;
			object-fit: cover;
		}

		::-webkit-scrollbar {
			display: none;
			/* For Chrome, Safari, and Opera */
		}
	</style>
</head>

<body>



	<div>
		<!-- Content wrapper -->
		<div class="content-wrapper">
			<!-- Menu -->

			<!-- / Menu -->

			<!-- Content -->

			<main>

				<div class="container">
					<!-- <div class="p-5 mb-4 bg-light my-4 rounded-3 text-center">
						<div class="container-fluid py-2">
							<h1 class="display-5 fw-bold">
								Hotel Hebat
							</h1>

							<p class=" fs-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium, animi
								iusto
								pariatur cum esse recusandae. Laborum sed est, excepturi maxime voluptate animi itaque
								labore ea
								tempora deserunt modi fugiat obcaecati!</p>
						</div>
					</div> -->

					<div id="myCarousel" class="carousel slide my-4 rounded-3" data-bs-ride="carousel">
						<div class="carousel-indicators">
							<button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
							<button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
							<button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
						</div>
						<div class="carousel-inner">
							<div class="carousel-item active">
								<div class="position-relative" style="width: 1392px; height: 400px;">
									<img src="<?php echo base_url('assets/pic/hotel-header-1.jpg') ?>" class="d-block" style="width: 100%; height: 100%;" alt="First Slide">
									<!-- <div class="overlay"></div> -->
								</div>

								<div class="carousel-caption d-flex flex-column align-items-center">
									<h1>Elysian Resort & Suites</h1>
									<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aliquid illo molestias deserunt accusamus rem, excepturi quo totam nemo maxime neque consequuntur sapiente ipsa sequi dolorum necessitatibus ut error natus nostrum.</p>
								</div>
							</div>

							<div class="carousel-item">
								<img src="<?php echo base_url('assets/pic/hotel-header-2.jpg') ?>" class="d-block" style="width: 1392px; height: 400px;" alt="Second Slide">
								<div class="carousel-caption d-flex flex-column align-items-center">
									<h1>Centered Second Slide Title</h1>
									<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nesciunt nostrum itaque aperiam ex nihil neque iure ratione amet reiciendis tempore sequi quos impedit voluptatum, natus, pariatur harum saepe corrupti maxime!
										Quae, quam. Error dignissimos veritatis vero expedita! Veniam assumenda commodi ipsam a esse culpa velit sapiente vel eum dolor modi magni iure consequatur, incidunt repellendus expedita, accusantium asperiores nihil ratione.</p>
								</div>
							</div>
							<div class="carousel-item">
								<img src="<?php echo base_url('assets/pic/hotel-header-3.jpg') ?>" class="d-block" style="width: 1392px; height: 400px;" alt="Third Slide">
								<div class="carousel-caption d-flex flex-column align-items-center">
									<h1>Centered Third Slide Title</h1>
									<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum asperiores eveniet nisi corrupti quis magni, iste et. Nemo exercitationem tempora temporibus nam. Excepturi perspiciatis asperiores vitae consequatur officia tenetur itaque.
										Quaerat enim qui veritatis error doloribus ullam totam cupiditate id ipsa alias odit repudiandae, in mollitia eum fugit nostrum laborum perferendis, voluptatibus officiis iusto illum reiciendis, sunt facere soluta? Sequi.</p>
								</div>
							</div>
						</div>
						<button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="visually-hidden">Previous</span>
						</button>
						<button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="visually-hidden">Next</span>
						</button>
					</div>


					<div class="row mb-5">
						<?php foreach ($row as $r) : ?>

							<div class="col-md-4 mb-4" id="hotel-room">
								<a href="<?= base_url('booking/book/' . $r->kamar_id) ?>">
									<!-- Added mb-4 here for spacing -->
									<div class="card">
										<img src="<?= base_url('uploads/' . $r->gambar) ?>" width="450" height="300" class="card-img-top" alt="Room image">
										<div class="card-body text-center">
											<!-- Using Bootstrap flex utilities to align title and price horizontally -->
											<div id="hotel-room-text" class="d-flex justify-content-between align-items-center mb-3">
												<h5 class="card-title mb-0"><?= $r->tipe_kamar ?></h5>
												<p class="card-text mb-0">IDR <?= number_format($r->harga) ?> </p>
											</div>

											<span>
												<?php
												// Decode the JSON data from the database
												$fasilitas = json_decode($r->fasilitas_kamar, true);

												// Check if decoding was successful and it's an array
												if (is_array($fasilitas)) {
													// Loop through each facility and display it as a badge
													foreach ($fasilitas as $facility) {
														echo '<span class="badge bg-label-primary badge-sm text-uppercase me-1">' . $facility . '</span>';
													}
												} else {
													// Handle the case where the data is not valid JSON
													echo '<span class="badge bg-label-primary badge-sm text-uppercase">' . $r->fasilitas_kamar . '</span>';
												}
												?>
											</span>
											<p class="card-text mt-4">
												<?php if ($r->jumlah_kamar > 0): ?>
													<?php if ($this->session->userdata('user_id')): ?>
														<!-- User is logged in, show "More Info" button -->
														<a href="<?= base_url('booking/book/' . $r->kamar_id) ?>" class="btn btn-primary">More Info</a>
													<?php else: ?>
														<!-- User is not logged in, show greyed out button with "Log in first" -->
														<a href="<?= base_url('auth/login') ?>" class="btn btn-secondary disabled">Log in first</a>
													<?php endif; ?>
												<?php else: ?>
													<!-- Show "Out of Rooms" -->
													<button class="btn btn-danger">Out of Rooms</button>
												<?php endif; ?>
											</p>



										</div>
									</div>
								</a>
							</div>
						<?php endforeach ?>
					</div>
				</div>

			</main>



</body>

</html>