<?php
  require('header.php');
?>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Laporan</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Laporan</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Data Laporan</h5>
              <p>Daftar laporan penjualan</p>
              <a href="<?=base_url()?>pdfGenerate"><button type="button" class="btn btn-primary">Cetak Laporan</button></a>
              <!-- Table with stripped rows -->
              <table id="example" class="table datatable">
                <thead>
                  <tr>
                    <th>Kode Dokumen</th>
                    <th>Nomor Dokumen</th>
                    <th>Pengguna</th>
                    <th>Total Harga</th>
                    <th>Tanggal Transaksi</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach($data as $d){
                  ?>
                  <tr>
                    <td><?=$d['kodeTransaksi'];?></td>
                    <td><?=$d['nomorDokumen'];?></td>
                    <td><?=$d['pengguna'];?></td>
                    <td><?=$d['totalHarga'];?></td>
                    <td><?=$d['tanggalTransaksi'];?></td>
                    
                    <?php
                      if($d['status'] == "0"){?>
                        <td>Belum Bayar</td>
                      <?php
                      }else if($d['status'] == "1"){?>
                        <td>Sudah Bayar</td>
                      <?php
                      }
                    ?>  
                    
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
