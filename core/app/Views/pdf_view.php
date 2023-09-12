<!DOCTYPE html>  
<html lang="en">  

<head>  
    <meta charset="UTF-8">  
    <meta http-equiv="X-UA-Compatible" content="IE=edge">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Laporan Export</title>  

</head>  

<body>  
<h2>Data Transaksi</h2>  
<table border=1 width=80% cellpadding=2 cellspacing=0 style="margin-top: 5px; text-align:center">  
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
</body>  

</html>