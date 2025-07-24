<?php $this->load->view('asset/navbar'); ?>
<?php $this->load->view('asset/css'); ?>
<script>
	$(document).ready(function() {
		$('#ViewSelect').select2({
			placeholder: "Choose Your Room View",
			tags: true,
			allowClear: true
		});
		$('#RoomSelect').select2({
			placeholder: "Choose Your Room Floor Height",
			tags: true,
			allowClear: true
		});
	});
</script>
<div class="container mt-5">
	<div class="row">
		<!-- Room Image -->
		<div class="col-md-6 mb-4">
			<div class="card">
				<img src="<?= base_url('uploads/' . $kamar->gambar) ?>" class="card-img" alt="<?= $kamar->tipe_kamar ?>">
			</div>
		</div>

		<!-- Booking Form and Room Info -->
		<div class="col-md-6 mb-4">
			<div class="">
				<div class="card-header">
					<h3><?= $kamar->tipe_kamar ?></h3>
				</div>
				<div class="card-body">
					<div class="nav-align-top nav-tabs-shadow mb-4">
						<ul class="nav nav-tabs nav-fill" role="tablist">
							<li class="nav-item">
								<button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
									data-bs-target="#navs-justified-home" aria-controls="navs-justified-home"
									aria-selected="true">
									<i class="tf-icons ti ti-article ti-xs me-1"></i> Description
								</button>
							</li>
							<li class="nav-item">
								<button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
									data-bs-target="#navs-justified-profile" aria-controls="navs-justified-profile"
									aria-selected="false">
									<i class="tf-icons ti ti-device-tv ti-xs me-1"></i> Facilities
								</button>
							</li>

						</ul>
						<div class="tab-content">
							<div class="tab-pane fade show active" id="navs-justified-home" role="tabpanel">
								<p>
									Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe, facilis? A nesciunt
									quas excepturi, tempora aperiam veniam. Culpa unde voluptatem vel suscipit
									asperiores adipisci illo deleniti ullam, magni nostrum tempore.
								</p>
								<p class="mb-0">

								</p>
							</div>
							<div class="tab-pane fade" id="navs-justified-profile" role="tabpanel">
								<?php if (!empty($kamar->fasilitas_kamar)): ?>
									<?php
									$facilities = json_decode($kamar->fasilitas_kamar, true); // Decode as an associative array
									if (is_array($facilities)):  // Ensure it's an array before looping
									?>
										<ul>
											<?php foreach ($facilities as $facility): ?>
												<li><?= $facility ?></li>
											<?php endforeach; ?>
										</ul>
									<?php else: ?>
										<p>No facilities available.</p>
									<?php endif; ?>
								<?php endif; ?>

							</div>

						</div>
					</div>
					<!-- Room Facilities -->
					<!-- Room Price -->
					<h4 class="text-primary"><strong>Jumlah Kamar :</strong> <?= $kamar->jumlah_kamar ?> </h4>
					<h3><strong>Harga:</strong> <?= number_format($kamar->harga) ?> IDR</h3>
					<!-- Booking Form -->
					<form action="<?= base_url('booking/confirm') ?>" method="post">
						<input type="hidden" name="kamar_id" value="<?= $kamar->kamar_id ?>">

						<div class="mb-3">
							<label for="check_in" class="form-label">Check-in Date</label>
							<input type="date" class="form-control" name="check_in" required>
						</div>
						<div class="mb-3">
							<label for="check_out" class="form-label">Check-out Date</label>
							<input type="date" class="form-control" name="check_out" required>
						</div>
						<div class="mb-3">
							<div class="form-group">
								<label for="ViewSelect">Room View</label>
								<select id="ViewSelect" name="room_view" class="form-control" multiple="multiple">
									<option value="Beach View">Beach View</option>
									<option value="Mountain View">Mountain View</option>
									<!-- Add more options as needed -->
								</select>
							</div>
						</div>
						<div class="mb-3">
							<div class="form-group">
								<label for="RoomSelect">Room Floor</label>
								<select id="RoomSelect" name="room_floor" class="form-control" multiple="multiple">
									<option value="Lower Floor">Lower Floor</option>
									<option value="Higher Floor">Higher Floor</option>
									<!-- Add more options as needed -->
								</select>
							</div>
						</div>
						<div class="mb-3">
							<label for="exampleFormControlTextarea1" class="form-label">Additonal Notes</label>
							<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" style="height: 86px;" name="notes"></textarea>
						</div>
						<button type="submit" class="btn btn-danger"><a href="<?= base_url('welcome') ?>"
								class="text-white">Go Back</a></button>
						<button type="submit" class="btn btn-primary">Confirm Booking</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>