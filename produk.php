<?php
session_start();
require_once 'function.php';
if($_SESSION['level']==""){
		header("location: login.php");
	} 
$produk = query("SELECT *FROM produk");

if(isset ($_POST["search"])){
    $produk = cari($_POST["keyword"]);
}
?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Produk</title>
    <!-- Favicon-->
    <link rel="shorcut icon" href="favicon.ico" />
    <link rel="icon" type="image/png" href="ico/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="ico/favicon-16x16.png" sizes="16x16" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <!-- Css -->
    <link rel="stylesheet" href="css/baru.css">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/282f37c3b4.js" crossorigin="anonymous"></script>
</head>

<body>

<div class="text-center" style="background-color: #F6CBA3;">
  <img src="assets/img/atas2.png" width="500px" height="500px" class="rounded img-fluid " alt="">
</div>

<div class="sticky-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark " style="background-color: #c08457;">
  <div class="container-fluid">
    <a class="navbar-brand fs-6" href="index.php">
    <img src="assets/img/LOGOBARU.png" alt="" width="25" height="25" class="d-inline-block align-text-top"> <font face="Amina Reska" size="4" >Pasar Wisata</font></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse container navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <?php if($_SESSION['level']=='admin'){?>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="admin/home.php"><font face="Pink Chicken" style="color: #ffffff" size="3">Dashboard Admin</font></a>
        </li>
        <?php
         }?>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="index.php"><font face="Pink Chicken" style="color: #ffffff" size="3">Home</font></a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="produk.php"><font face="Pink Chicken" style="color: #ffffff"  size="3">Product</font></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="jadijual.php"><font face="Pink Chicken" style="color: #ffffff" size="3">Seller</font></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Faq.php"><font face="Pink Chicken" style="color: #ffffff"  size="3">FAQ</font></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php"><font face="Pink Chicken" style="color: #ffffff"  size="3">Logout</font></a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<font face="Pink Chicken" style="color: #1d2656"  size="6" >
<div class="b-example-divider"></div>
  <header>
    <div class="px-1 py-1 border-bottom mb-1" style="background-color: #c08457;">
      <div class="container flex-wrap">
        <form action="" method="POST">
        <div class="input-group mb-1 pt">
        <input class="form-control" placeholder="Cari Produk" type="search" name="keyword" autocomplete="off">
        <button class="btn btn-primary" type="submit" name="search" id="button-addon2"> Cari </button>
        </div>
        </form>
      </div>
    </div>
  </header>
  </div>
</font>

  <div class="b-example-divider"></div>
</main>


<!-- slide -->
<div class="container  mt-3">
    <div class="row slideku">
        <div class="col-8 h-100">
            <div id="carouselExampleIndicators" class="carousel slide h-100" data-bs-ride="carousel">
                 <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner h-100">
                        <div class="carousel-item active h-100">
                            <img src="assets/img/psr3.png" class="d-block w-100 h-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="assets/img/psr2.png" class="d-block w-100 h-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="assets/img/psr1.png" class="d-block w-100 h-100" alt="...">
                        </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                </button>
                </div>
            </div>
            <div class="col-4 h-100">
                <div class="h-50">
                    <img class="h-100 w-100" src="assets/img/psr1.png" alt="TokoKita">
                </div>
            <div class="h-50 pt-3">
                <img class="w-100 h-100" src="assets/img/psr2.png" alt="">
            </div>
        </div>
    </div>
</div>

    <!-- endslide -->
    <!-- Section-->
    
      <main>
      <font face="Pink Chicken" style="color: #1d2656"  size="6" >
      <section class="produk">
            <div class="container">
              <hr/>
                <div class="row">
                    <!-- <form action="" method="POST">
                    <div class="input-group mb-3 pt-4">
                        <input class="form-control" placeholder="Cari Produk" type="search" name="keyword" autocomplete="off">
                        <button class="btn btn-primary" type="submit" name="search" id="button-addon2"> Cari </button>
                    </div>
                    </form> -->
                        <div class="col-sm-12 mb-3">
                            <h2 class=" section-tittle text-center fw-bold ">PRODUCT</h2>
                        </div>

                        <?php foreach ($produk as $pdk):?>
                    
                        <div class="produk-card cd-item card ms-5 me-3 ms-5 pt-2 border-2 align-content-center border-info  mb-4 container-mt shadow p-5">
                        <!-- <h5 class="text-center"><font face="Tentang Nanti Demo" style="color: #c08457"  size="4">hidup dan mati</font></h5> -->
                        <h3 class="card-title text-center"><?php echo $pdk['nama_toko'];?></h3>
                        <td>
                          <img class="img-fluid mx-auto d-block" src="Admin/img/<?php echo $pdk["foto_barang"]; ?>" width="300px" >
                        </td>
                            <div class="card-body test">
                                <h6 class="card-title"><?php echo $pdk['nama_barang'];?></h6>
                                <h6 class="card-harga"><?php echo rupiah($pdk['harga_barang']);?></h6>
                            </div>
                            <div class="card-body">
                                <a class="btn btn-primary" href="detail_produk.php?id=<?php echo $pdk['id_barang'];?>">Detail</a>
                                <a href="https://api.whatsapp.com/send?phone=+6281394671261 &text= hallo admin, saya tertarik membeli produk <?php echo $pdk['nama_barang'];?> dari <?php echo $pdk['nama_toko'];?>" class="btn btn-success">Beli </a>
                            </div>
                        </div>
                        <?php endforeach;?>
                </div>
                        </div>
            </div>
        </section>
        </font>
       
    
        <!-- Modal detail data -->
        <?php foreach ($produk as $pdk):?>
                    <div class="modal fade" id="detail<?php echo $pdk['id_barang'];?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Detail Barang</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                    <tr><div class="modal-body">
                                        <div class="form-group">
                                             <input type="hidden" value="<?php echo $pdk['id'];?>">
                                        </div>
                                        <div class="form-group">
                                             <center><img src="Admin/img/<?php echo $pdk['foto_barang'];?>" width="100%"></center>
                                        </div>
                                        <div class="form-group pt-3">
                                            <p style="font-size: 15px;" class="fw-bold">Produk :<span class=" txt-color"> <?php echo $pdk['nama_barang'];?></span></p>
                                        </div>
                                        <div class="form-group">    
                                            <p style="font-size: 15px;" class="fw-bold">Harga Produk : Rp. <?php echo $pdk['harga_barang'];?></p>
                                        </div>
                                        <div class="form-group">
                                            <p style="font-size: 15px;" class="fw-bold">Deskripsi Produk : <br> <?php echo $pdk['deskripsi_barang'];?></p>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-cancel btn-danger" data-bs-dismiss="modal">Batal</button>
                                        <a href="https://api.whatsapp.com/send?phone=+6281394671261 &text= hallo admin, saya tertarik membeli produk <?php echo $pdk['nama_barang'];?> dari <?php echo $pdk['nama_toko'];?>" class="btn btn-cancel btn-success">Beli</a>
                                    </div>
                               </div>
                            </div>
                        </div>
                    </div>
    <?php endforeach;?>
                 <!-- end modal -->
    </main>
    


    <br>
    <br>
    <!-- Footer-->

    <font face="Amina Reska" style="color: #717171"  size="2" >
    <div class="container">
  <footer class="row row-cols-5 py-5 my-5 border-top">
    <div class="col-3">
      <p class="text-muted">&copy; Pasar Wisata</p>
      <h5>Contact us</h5>
      <img src="assets/img/qrcode.png" class="img-fluid" alt="">
    </div>

    <div class="col-3">
      <h5>Created By</h5>
      <ul class="nav flex-column">
        <li class="nav-item mb-2">Mohammad Ramadhaniyanto</li>
        <li class="nav-item mb-2">Suci Rahma Rosa</li>
      </ul>
    </div>

    <div class="col-3">
      <h5>Payment</h5>
      <ul class="nav flex-column">
      <img src="assets/img/bank.png" class="img-fluid" alt="" width="160" height="160">
      </ul>
    </div>

    <div class="col-3">
      <h5>Follow Us</h5>
      <ul class="nav flex-column">
        <li class="nav-item mb-2"><a href="https://www.instagram.com/pasarwisata.pangandaran/" class="nav-link p-0 text-muted"></a><img src="assets/img/instagram.png" alt="" width="30" height="30" >Instagram</li>
        <li class="nav-item mb-2"><a href="https://api.whatsapp.com/send?phone=+6281394671261" class="nav-link p-0 text-muted"></a><img src="assets/img/whatsapp.png" alt="" width="30" height="30" >whatsapp</li>
      </ul>
    </div>

  </footer>
</div>
</font>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>
</html>