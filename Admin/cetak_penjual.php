<?php

require_once __DIR__ . '/../vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf();


require '../function.php';
$penjual = query("SELECT * FROM penjual"); 

$html = '<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Data Penjual</title>
</head>
<body>
  <h1>Data Produk</h1>
    <table border = "1" cellpadding ="10" cellspacing = "0">
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Nomor Handphone</th>
            <th>Deskripsi</th>
          </tr>';

$i = 1;
    foreach ($penjual as $pjl){
      $html .= '<tr>
          <td>'. $i++ .'</td>
          <td>'. $pjl["nama_penjual"] .'</td>
          <td>'. $pjl["alamat_penjual"] .'</td>
          <td>'. $pjl["no_penjual"] .'</td>
          <td>'. $pjl["deskripsi_penjual"] .'</td>
      </tr>';
    }
    


$html .= '</table>
</body>
</html>';

$mpdf->WriteHTML($html);
$mpdf->Output();
?>