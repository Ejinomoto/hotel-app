<?php $this->load->view('asset/navbar'); ?>
<?php $this->load->view('asset/css'); ?>

<head>
    <style>
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

                <div class="container-xxl flex-grow-1 container-p-y">
                    <div class="pb-4">
                        <a class="btn btn-primary me-2 text-white" href="<?php echo base_url('welcome'); ?>">
                            <i class="ti ti-chevrons-left me-2 ti-sm"></i>
                            <span class="align-middle">Back</span>
                        </a>
                    </div>
                    <!-- Header -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card mb-4">
                                <div class="user-profile-header-banner">
                                    <img src="<?php echo base_url('assets/vuexy/assets/img/pages/profile-banner.png') ?>" alt="Banner image" class="rounded-top">
                                </div>
                                <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4">
                                    <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
                                        <img src="<?php echo base_url('assets/vuexy/assets/img/avatars/14.png') ?>" alt="user image" class="d-block h-auto ms-0 ms-sm-4 border-dark user-profile-img">
                                    </div>
                                    <div class="flex-grow-1 mt-3 mt-sm-5">
                                        <div class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
                                            <div class="user-profile-info">
                                                <h4> <?php echo $this->session->userdata('username'); ?></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ Header -->
                    <!-- User Profile Content -->
                    <div class="row">
                        <?php if (!empty($reservations)): ?>
                            <?php foreach ($reservations as $reservation): ?>
                                <div class="col-md-4">
                                    <div class="card mb-3">
                                        <div class="card-header">
                                            <h5 class="card-title"><?= $reservation->tipe_kamar ?></h5>
                                        </div>
                                        <div class="card-body">
                                            <p><strong>Nomor Reservasi:</strong> BK/ERS/<?= str_pad($reservation->reservation_id, 3, '0', STR_PAD_LEFT) ?></p>
                                            <p><strong>Check-in:</strong> <?= date('d F Y', strtotime($reservation->check_in_date)); ?></p>
                                            <p><strong>Check-out:</strong> <?= date('d F Y', strtotime($reservation->check_out_date)); ?></p>
                                            <p><strong>Room View:</strong> <?= ($reservation->room_view) ?></p>
                                            <p><strong>Room Floor:</strong> <?= ($reservation->room_floor) ?></p>
                                            <p><strong>Notes:</strong> <?= ($reservation->notes) ?></p>
                                            <p><strong>Total Price:</strong> <?= number_format($reservation->total_price) ?></p>
                                            <p><strong>Status:</strong> <?= ucfirst($reservation->status) ?></p>

                                            <!-- Print Receipt Button -->
                                            <?php if ($reservation->status === 'pending'): ?>
                                                <button class="btn btn-secondary" disabled>Pending</button>
                                            <?php else: ?>
                                                <button class="btn btn-primary" onclick="printReceipt(<?= $reservation->reservation_id ?>)">
                                                    Print Receipt
                                                </button>
                                                <button type="button" class="btn btn-primary waves-effect waves-light">
                                                    <span class="ti-xs ti ti-star me-1"></span>Rate
                                                </button>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p>No reservations found.</p>
                        <?php endif; ?>
                    </div>



                    <!--/ User Profile Content -->
                </div>

            </main>

            <script>
                function printReceipt(reservationId) {
                    // Open a new window to show the printable receipt
                    var printWindow = window.open('<?= base_url("booking/print_receipt/") ?>' + reservationId, '_blank');
                    printWindow.focus();
                }
            </script>

</body>

</html>