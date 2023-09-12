<?php
  require('headerDetail.php');
?>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Checkout</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Checkout</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Data Checkout</h5>
              <p>Daftar Checkout</p>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>Kode Tansaksi</th>
                    <th>Nomor Dokumen</th>
                    <th>Pengguna</th>
                    <th>Total Harga</th>
                    <th>Tanggal Transaksi</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th><?=$data[0]['kodeTransaksi']?></th>
                    <td><?=$data[0]['nomorDokumen']?></td>
                    <td><?=$data[0]['pengguna']?></td>
                    <td><?=$data[0]['totalHarga']?></td>
                    <td><?=$data[0]['tanggalTransaksi']?></td>
                    <td><?=$data[0]['status']?></td>
                  </tr>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->
              <h2>Total Harga : Rp.<?=$data[0]['totalHarga']?> </h2>
              <a href="<?=base_url()?>pembayaran/<?=$data[0]['kodeTransaksi']?>"><button type="button" class="btn btn-primary">Pembayaran</button></a>
            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->
  <?php
  require('footerDetail.php');
  ?>
