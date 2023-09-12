<?php
  require('header.php');
?>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Product</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Product</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Data Produk</h5>
              <p>Daftar produk penjualan</p>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>Kode Produk</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Satuan Harga</th>
                    <th>Diskon</th>
                    <th>Dimensi Produk</th>
                    <th>Unit</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach($data as $d){
                  ?>
                  <tr>
                    <td><?=$d['kodeProduk'];?></td>
                    <td><?=$d['namaProduk'];?></td>
                    <td><?=$d['harga'];?></td>
                    <td><?=$d['satuan'];?></td>
                    <td><?=$d['diskon'];?></td>
                    <td><?=$d['dimensi'];?></td>
                    <td><?=$d['unit'];?></td>
                    <td>
                      <a href="<?=base_url()?>detailProduct/<?=$d['kodeProduk'];?>">Detail</a>
                    </td>
                  </tr>
                  <?php
                  }
                  ?>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->
  <?php
  require('footer.php');
  ?>
