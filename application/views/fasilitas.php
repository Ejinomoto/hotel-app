<?php $this->load->view('asset/navbar'); ?>
<?php $this->load->view('asset/css'); ?>

<body>



    <div>
        <!-- Content wrapper -->
        <div class="content-wrapper">
            <!-- Menu -->

            <!-- / Menu -->

            <!-- Content -->

            <main>

                <div class="container">
                    <div class="p-5 mb-4 bg-light my-4 rounded-3 text-center">
                        <div class="container-fluid py-2">
                            <h1 class="display-5 fw-bold">
                                Fasilitas Umum
                            </h1>

                            <p class=" fs-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium, animi
                                iusto
                                pariatur cum esse recusandae. Laborum sed est, excepturi maxime voluptate animi itaque
                                labore ea
                                tempora deserunt modi fugiat obcaecati!</p>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <?php foreach ($row as $r) : ?>
                            <div class="col-md-4 mb-4">
                                <!-- Added mb-4 here for spacing -->
                                <div class="card">
                                    <img src="<?= base_url('uploads/' . $r->gambar) ?>" height="300px" alt="...">
                                    <div class="card-body text-center">
                                        <h5 class="card-title"><?= $r->name ?></h5>
                                        <p class="card-text"><?= $r->description ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </main>
</body>

</html>