<?php $this->load->view('asset/navbar'); ?>
<?php $this->load->view('asset/css'); ?>

<div class="container text-center my-5">
    <div class="card">
        <div class="card-body">
            <h1 class="card-title text-success">Your Order is Being Processed!</h1>
            <p class="card-text">Thank you for booking with us. We are currently processing your reservation. You will receive a confirmation email shortly.</p>
            <a href="<?= base_url('user') ?>" class="btn btn-primary">View Your Bookings</a>
        </div>
    </div>
</div>