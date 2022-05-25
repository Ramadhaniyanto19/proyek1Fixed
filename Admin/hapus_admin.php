<?php
require '../function.php';

$conn = mysqli_connect('localhost', 'root', '', 'tokokita');

$id = $_GET["id"];


if( hapusAdmin($id) > 0){
      echo "<script> alert('Data berhasil dihapus');
        document.location.href = 'kelola_admin.php';
      </script>";
 }else{
       echo "<script> alert('Data gagal dihapus');
        document.location.href = 'kelola_admin.php';
      </script>";
 }

?>