<?php
  require('headerDetail.php');
?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Detail Produk</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Product</li>
          <li class="breadcrumb-item active">Detail Produk</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="../assets/<?=$data[0]['gambar']?>" alt="Profile" class="rounded-circle">
              <h2><?=$data[0]['namaProduk']?></h2>
              <h3>Rp.<?=$data[0]['harga']?></h3>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                 
                  <h5 class="card-title">Detail Produk</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Kode Produk</div>
                    <div class="col-lg-9 col-md-8"><?=$data[0]['kodeProduk']?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Nama Produk</div>
                    <div class="col-lg-9 col-md-8"><?=$data[0]['namaProduk']?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Harga</div>
                    <div class="col-lg-9 col-md-8">Rp.<?=$data[0]['harga']?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Satuan</div>
                    <div class="col-lg-9 col-md-8"><?=$data[0]['satuan']?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Diskon</div>
                    <div class="col-lg-9 col-md-8"><?=$data[0]['diskon']?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Dimensi</div>
                    <div class="col-lg-9 col-md-8"><?=$data[0]['dimensi']?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Unit</div>
                    <div class="col-lg-9 col-md-8"><?=$data[0]['unit']?></div>
                  </div>
                  <a href="<?=base_url()?>checkout/1"><button type="button" class="btn btn-primary">Buy</button></a>
                  <a href="<?=base_url()?>checkout/<?=$data[0]['kodeProduk']?>"><button type="button" class="btn btn-primary">Chekout</button></a>
                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->
  <?php
  require('footerDetail.php');
  ?>