<?php

require_once __DIR__ . '/../vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf();


require '../function.php';
$produk = query("SELECT * FROM produk"); 

$html = '<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Data Produk</title>
</head>
<body>
  <h1>Data Produk</h1>
    <table border = "1" cellpadding ="10" cellspacing = "0">
          <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Nama Toko</th>
            <th>Harga</th>
            <th>Foto</th>
            <th>Tanggal Masuk</th>
            <th>Deskripsi</th>
          </tr>';

$i = 1;
    foreach ($produk as $pdk){
      $html .= '<tr>
          <td>'. $i++ .'</td>
          <td>'. $pdk["nama_barang"] .'</td>
          <td>'. $pdk["nama_toko"] .'</td>
          <td width = "15%">'. $pdk["harga_barang"] .'</td>
          <td> <img src="img/'. $pdk["foto_barang"]. '" width = "30%"></td>
          <td width = "10%%">'. $pdk["tanggal_barang"] .'</td>
          <td width = "20%%">'. $pdk["deskripsi_barang"] .'</td>
      </tr>';
    }
    


$html .= '</table>
</body>
</html>';

$mpdf->WriteHTML($html);
$mpdf->Output();
?>