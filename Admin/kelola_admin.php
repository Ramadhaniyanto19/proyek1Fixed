<?php
require '../function.php';




//Tambah Data
if(isset ($_POST["submit"])){

  if(tambahAdmin($_POST) > 0){  
      echo "<script> alert('Data berhasil ditambahkan');
        document.location.href = 'kelola_admin.php';
      </script>";
  }else{
      echo"<script>alert('Data gagal ditambahkan');
      document.location.href = 'kelola_admin.php';
      </script>";
      
  }

}

//edit data
if(isset($_POST["edit"])){
    if( ubahAdmin($_POST) > 0){
        echo "<script> alert('Data berhasil diperbarui');
        document.location.href = 'kelola_admin.php';
      </script>";
  }else{
      echo"<script>alert('Data gagal diperbarui');
      document.location.href = 'kelola_admin.php';
      </script>";
        }
    }

//pagination
$batas = 8;
$jumlahData = count(query("SELECT *FROM user"));
$jumlahHalaman = ceil($jumlahData / $batas);
$halaman = (isset($_GET['halaman'])) ? $_GET['halaman'] : 1;
$awaldata =($batas * $halaman) - $batas;	
$previous = $halaman - 1;
$next = $halaman + 1;

$admin = query("SELECT *FROM user where level = 'admin' LIMIT $awaldata, $batas"); 


//cari data
if(isset ($_POST["search"])){
    $admin = cariAdmin($_POST["keyword"]);
}

?>
<?php include ('template/header.php');?>
        <div id="layoutSidenav_content">
            <main>
            <font face="Pink Chicken">
                <div class="container-fluid py-3">
                    <h1 class="border-bottom border-2 py-1 pb-2 border-dark" style="width:300px">Data Admin Sistem</h1>
                   <!-- Button trigger modal -->
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Tambah Data
                    </button>
                     <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0 float-end" action="" method="POST"> 
                        <div class="input-group">
                            <input class="form-control" type="text" placeholder="Cari" aria-label="Cari" autocomplete="off" name="keyword"
                                aria-describedby="btnNavbarSearch">
                            <button class="btn btn-primary" type="submit" name="search"><i
                                    class="fas fa-search"></i></button>  
                        </div>
                      </form>
                        <table class="table table-dark table-bordered mt-2">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Password</th>                       
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach($admin as $adm): ?>
                                <tr>
                                    <td>
                                        <?php echo $i; ?>
                                    </td>
                                    <td>
                                        <?php echo $adm["username"]; ?>
                                    </td>
                                    <td>
                                        <?php echo $adm["pass"]; ?>
                                    </td>
                                    <td>
                                        <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editdata<?php echo $adm['id']; ?>"
                                        >Ubah</a>
                                        <a href="hapus_admin.php?id=<?php echo $adm["id"]; ?>" class="btn btn-danger">Hapus</a>
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
                                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Data</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <input type="hidden" name="id" id="id" for="id" class="form-control"  required>
                                        </div>
                                        <div class="form-group">
                                            <label for="username" class="form-label">Username</label>
                                            <input type="text" name="username" id="username" for="username" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="text" name="password" id="password" for="password" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" name="level" value="admin" for="level" class="form-control"  required>
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
                    <?php foreach($admin as $adm): ?>
                    <div class="modal fade" id="editdata<?php echo $adm['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Edit Data</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <div class="form-group">
                                             <input type="hidden" name="id" id="id" for="id" class="form-control" value="<?php echo $adm['id']?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="username" class="form-label">Username</label>
                                            <input type="text" name="username" id="username" for="username" class="form-control" value="<?php echo $adm['username'];?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="text" name="password" id="password" for="password" class="form-control" value="<?php echo $adm['pass'];?>" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" name="level" value="admin" for="level" class="form-control"  required>
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

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>

</body>
</html>