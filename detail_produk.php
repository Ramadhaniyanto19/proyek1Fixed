<?php
session_start();
require_once 'function.php';
if($_SESSION['level']==""){
		header("location: login.php");
	} 

if(isset ($_POST["search"])){
    $produk = cari($_POST["keyword"]);
}

$id = $_GET['id'];
$p = mysqli_query($conn, "SELECT *FROM produk WHERE id_barang ='$id'");
$produk = $p -> fetch_array();


?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
* {box-sizing: border-box;}

.img-magnifier-container {
  position:relative;
}

.img-magnifier-glass {
  position: absolute;
  border: 3px solid #000;
  border-radius: 50%;
  cursor: none;
  /*Set the size of the magnifier glass:*/
  width: 100px;
  height: 100px;
}
</style>
<script>
function magnify(imgID, zoom) {
  var img, glass, w, h, bw;
  img = document.getElementById(imgID);
  /*create magnifier glass:*/
  glass = document.createElement("DIV");
  glass.setAttribute("class", "img-magnifier-glass");
  /*insert magnifier glass:*/
  img.parentElement.insertBefore(glass, img);
  /*set background properties for the magnifier glass:*/
  glass.style.backgroundImage = "url('" + img.src + "')";
  glass.style.backgroundRepeat = "no-repeat";
  glass.style.backgroundSize = (img.width * zoom) + "px " + (img.height * zoom) + "px";
  bw = 3;
  w = glass.offsetWidth / 2;
  h = glass.offsetHeight / 2;
  /*execute a function when someone moves the magnifier glass over the image:*/
  glass.addEventListener("mousemove", moveMagnifier);
  img.addEventListener("mousemove", moveMagnifier);
  /*and also for touch screens:*/
  glass.addEventListener("touchmove", moveMagnifier);
  img.addEventListener("touchmove", moveMagnifier);
  function moveMagnifier(e) {
    var pos, x, y;
    /*prevent any other actions that may occur when moving over the image*/
    e.preventDefault();
    /*get the cursor's x and y positions:*/
    pos = getCursorPos(e);
    x = pos.x;
    y = pos.y;
    /*prevent the magnifier glass from being positioned outside the image:*/
    if (x > img.width - (w / zoom)) {x = img.width - (w / zoom);}
    if (x < w / zoom) {x = w / zoom;}
    if (y > img.height - (h / zoom)) {y = img.height - (h / zoom);}
    if (y < h / zoom) {y = h / zoom;}
    /*set the position of the magnifier glass:*/
    glass.style.left = (x - w) + "px";
    glass.style.top = (y - h) + "px";
    /*display what the magnifier glass "sees":*/
    glass.style.backgroundPosition = "-" + ((x * zoom) - w + bw) + "px -" + ((y * zoom) - h + bw) + "px";
  }
  function getCursorPos(e) {
    var a, x = 0, y = 0;
    e = e || window.event;
    /*get the x and y positions of the image:*/
    a = img.getBoundingClientRect();
    /*calculate the cursor's x and y coordinates, relative to the image:*/
    x = e.pageX - a.left;
    y = e.pageY - a.top;
    /*consider any page scrolling:*/
    x = x - window.pageXOffset;
    y = y - window.pageYOffset;
    return {x : x, y : y};
  }
}
</script>
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

    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top " style="background-color: #c08457;">
  <div class="container-fluid">
    <a class="navbar-brand" fs-6" href="index.php">
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


<font face="Pink Chicken">
    <!-- Section-->
      <main>
      <section class="produk">
            <div class="container-fluid">
                <div class="row">
                        <div class="col-sm-12 mt-4 mb-2">
                            <h2 class=" section-tittle text-center fw-bold">DETAIL PRODUCT</h2>
                        </div>
                        <div class="img-magnifier-container col-lg-8 col-md-12 col-sm-12 image-pdk">
                            <img id="img" class="img-fluid" src="Admin/img/<?= $produk["foto_barang"];?>" alt="">
                        </div>
                        <div class="border  shadow ms-5 col-lg-3 col-sm-12 col-md-11 border-test">
                            <div class="body">
                            <h1 class="py-2 text-center"><?= $produk["nama_toko"];?></h1>
                            <h6>Nama Produk :  <?= $produk["nama_barang"];?></h6>
                            <h6>Harga Produk : <?= rupiah($produk["harga_barang"]);?></h6>
                            <h6>Deskripsi Produk : </h6>
                            <h7><?= $produk["deskripsi_barang"];?></h7>
                                <a href="https://api.whatsapp.com/send?phone=+6281394671261 &text= hallo admin, saya tertarik membeli produk <?php echo $produk['nama_barang'];?> dari <?= $produk["nama_toko"];?> " class=" button btn btn-success">Beli</a>                               
                                <a href="produk.php" class="text-light button btn btn-warning mt-2 ">Kembali</a>                               
                            </div>
                        </div>
                </div>
            </div>
        </section>
    </main>
    </font>
    <br>
    <br>


    
    <!-- Footer-->

    <font face="Amina Reska" style="color: #717171"  size="2" >
    <div class="container">
  <footer class="row row-cols-5 py-5 my-5 border-top">
    <div class="col-3">
      <p class="text-muted">&copy; 2021</p>
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
        <li class="nav-item mb-2"><a href="https://www.instagram.com/apatuh.ciu/" class="nav-link p-0 text-muted"></a><img src="assets/img/instagram.png" alt="" width="30" height="30" >Instagram</li>
        <li class="nav-item mb-2"><a href="" class="nav-link p-0 text-muted"></a><img src="assets/img/whatsapp.png" alt="" width="30" height="30" >whatsapp</li>
      </ul>
    </div>
  </footer>
</div>
</font>

<script>
/* Initiate Magnify Function
with the id of the image, and the strength of the magnifier glass:*/
magnify("img", 2);
</script>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>
</html>