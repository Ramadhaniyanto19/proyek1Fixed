<?php
require '../function.php';


//Tambah Data
if(isset ($_POST["submit"])){

  if(tambah($_POST) > 0){  
      echo"<script>alert('Data berhasil ditambahkan');
      document.location.href = 'produk.php';
      </script>";
  }else{
      echo"<script>alert('Data gagal ditambahkan');
      document.location.href = 'produk.php';
      </script>";
      
  }

}

//edit data
if(isset($_POST["edit"])){
    if( ubah($_POST) > 0){
        echo "<script> alert('Data berhasil diperbarui');
        document.location.href = 'produk.php';
      </script>";
  }else{
      echo"<script>alert('Data gagal diperbarui');
      document.location.href = 'produk.php';
      </script>";
        }
    }

//pagination
$batas = 3;
$jumlahData = count(query("SELECT *FROM produk"));
$jumlahHalaman = ceil($jumlahData / $batas);
$halaman = (isset($_GET['halaman'])) ? $_GET['halaman'] : 1;
$awaldata =($batas * $halaman) - $batas;	
$previous = $halaman - 1;
$next = $halaman + 1;

$produk = query("SELECT *FROM produk LIMIT $awaldata, $batas"); 



//cari data
if(isset ($_POST["cari"])){
    $produk = cari($_POST["keyword"]);
}

?>
<?php include('template/header.php');?>
<div id="layoutSidenav_content">

    <main>
    <font face="Pink Chicken">
                <div class="container-fluid py-2">
                    <h1 class=" border-bottom border-dark border-2 py-2" style="width: 260px;">Data Product</h1>
                   <!-- Button trigger modal -->
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Tambah Data
                    </button>
                    <a type="button" target="_blank" class="btn btn-warning" href="cetak_produk.php" style="color: white;">
                    Cetak Data Produk
                    </a>
                      <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0 float-end" action="" method="POST"> 
                        <div class="input-group">
                            <input class="form-control" type="text" placeholder="Cari" aria-label="Cari" autocomplete="off" name="keyword"
                                aria-describedby="btnNavbarSearch">
                            <button class="btn btn-primary" type="submit" name="cari"><i
                                    class="fas fa-search"></i></button>  
                        </div>
                      </form>
                        <table class="table table-dark table-bordered mt-2">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Nama Toko</th>
                                    <th>Harga</th>
                                    <th>Foto</th>
                                    <th>Tanggal Masuk</th>
                                    <th>Deskripsi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach($produk as $pdk): ?>
                                <tr>
                                    <td>
                                        <?php echo $i; ?>
                                    </td>
                                    <td>
                                        <?php echo $pdk["nama_barang"]; ?>
                                    </td>
                                    <td>
                                        <?php echo $pdk["nama_toko"]; ?>
                                    </td>
                                    <td>
                                        <?php echo rupiah($pdk["harga_barang"]);  ?>
                                    </td>
                                    <td><img src="img/<?php echo $pdk["foto_barang"]; ?>" width="130px"></td>
                                    <td>
                                        <?php echo $pdk["tanggal_barang"]; ?>
                                    </td>
                                    <td width="300px">
                                        <?php echo $pdk["deskripsi_barang"]; ?>
                                    </td>
                                    <td>
                                        <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editdata<?php echo $pdk['id_barang']; ?>"
                                        >Ubah</a>
                                        <a href="hapus.php?id=<?php echo $pdk["id_barang"]; ?>" class="btn btn-danger">Hapus</a>
                                    </td>
                                </tr>
                                <?php $i++;?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                <?php if($halaman > 1) : ?>
                                <li class="page-item"><a class="page-link" <?php echo "href='?halaman=$previous'"?>>Previous</a></li>
                                <?php endif;?>
                                <?php 
                                for($x=1; $x<=$jumlahHalaman; $x++): 
                                    ?>
                                <?php if($x == $halaman): ?>   
                                <li class="page-item"><a class="page-link" style="color: red;" href="?halaman=<?php echo $x ?>"
                                ><?php echo $x; ?></a></li>
                                <?php else :?>
                                      <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"
                                ><?php echo $x; ?></a></li>
                                <?php endif;?>
                                <?php endfor;?>
                                <?php if($halaman < $jumlahHalaman ) :?>
                                <li class="page-item"><a class="page-link"<?php if($halaman < $jumlahHalaman) { echo "href='?halaman=$next'"; } ?>>Next</a></li>
                                <?php endif;?>
                            </ul>
                        </nav>
                </div>

                 <!-- Modal tambah data -->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Barang</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <input type="hidden" name="id" id="id_barang" for="id_barang" class="form-control"  required>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_barang" class="form-label">Nama Barang</label>
                                            <input type="text" name="nama_barang" id="nama_barang" for="nama_barang" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_toko" class="form-label">Nama Toko</label>
                                            <input type="text" name="nama_toko" id="nama_toko" for="nama_toko" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="harga_barang" class="form-label">Harga Barang</label>
                                            <input type="numbers" name="harga_barang" id="harga_barang" for="harga_barang" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="foto_barang" class="form-label">Foto Barang</label>
                                            <input type="file" name="foto_barang" id="foto_barang" for="foto_barang" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="tanggal_barang" class="form-label">Tanggal</label>
                                            <input type="date" name="tanggal_barang" id="tanggal_barang" for="tanggal_barang" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="deskripsi_barang" class="form-label">Deskripsi Barang</label>
                                            <input type="teks" name="deskripsi_barang" id="deskripsi_barang" for="deskripsi_barang" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="reset" class="btn btn-danger">Reset</button>
                                        <input type="submit" name="submit" class="btn btn-success" value="tambah">
                                    </div>
                                </form>  
                            </div>
                        </div>
                    </div>
                 <!-- end modal -->

                       <!-- Modal edit data -->
                    <?php foreach($produk as $pdk): ?>
                    <div class="modal fade" id="editdata<?php echo $pdk['id_barang']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Edit Barang</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="fotolama" value="<?php echo $pdk['foto_barang']?>">
                                    <div class="modal-body">
                                        <div class="form-group">
                                             <input type="hidden" name="id" id="id_barang" for="id_barang" class="form-control" value="<?php echo $pdk['id_barang']?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_barang" class="form-label">Nama Barang</label>
                                            <input type="text" name="nama_barang" id="nama_barang" for="nama_barang" class="form-control" value="<?php echo $pdk['nama_barang'];?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_toko" class="form-label">Nama Toko</label>
                                            <input type="text" name="nama_toko" id="nama_toko" for="nama_toko" class="form-control" value="<?php echo $pdk['nama_toko'];?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="harga_barang" class="form-label">Harga Barang</label>
                                            <input type="numbers" name="harga_barang" id="harga_barang" for="harga_barang" class="form-control" value="<?php echo $pdk['harga_barang'];?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="foto_barang" class="form-label">Foto Barang</label>
                                            <br>
                                            <img src="img/<?php echo $pdk['foto_barang']; ?>" width="120px">
                                            <input type="file" name="foto_barang" id="foto_barang" for="foto_barang" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="tanggal_barang" class="form-label">Tanggal</label>
                                            <input type="date" name="tanggal_barang" id="tanggal_barang" for="tanggal_barang" class="form-control" value="<?php echo $pdk['tanggal_barang'];?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="deskripsi_barang" class="form-label">Deskripsi Barang</label>
                                            <input type="teks" name="deskripsi_barang" id="deskripsi_barang" for="deskripsi_barang" class="form-control" value="<?php echo $pdk['deskripsi_barang'];?>" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="reset" class="btn btn-danger">Reset</button>
                                        <input type="submit" name="edit" class="btn btn-success" value="edit">
                                    </div>
                                </form>  
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <!-- end modal -->
                    </font>
                </main>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <!-- ini js ku -->
    <script src="js/jsku.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>


</body>
</html>