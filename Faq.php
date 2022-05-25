<?php
session_start();
require 'function.php';
if($_SESSION['level']==""){
		header("location: login.php");
	} 

?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Pasar Wisata/FAQ</title>
    <!-- Favicon-->
    <link rel="shorcut icon" href="favicon.ico" />
    <link rel="icon" type="image/png" href="ico/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="ico/favicon-16x16.png" sizes="16x16" />  
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <!-- AOS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <!-- Css -->
    <link rel="stylesheet" href="css/baru.css">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/282f37c3b4.js" crossorigin="anonymous"></script>
</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-light">
    <div class=" container-fluid">  
    <a class="navbar-brand fs-6" href="index.php" ><img src="assets/img/LOGOBARU.png" alt="" width="25" height="25" class="d-inline-block align-text-top"><font face="Amina Reska" style="color: #c08457"; size="3" >Pasar Wisata | faq</font></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h1 class="offcanvas-title" id="offcanvasNavbarLabel"><font face="Pink Chicken" style="color: #c08457">MENU</font></h1>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
         <?php
        if($_SESSION['level']=='admin'){?>
        <li class="nav-item">
         <a class="nav-link active" aria-current="page" href="admin/home.php"><font face="Pink Chicken" style="color: #c08457" size="5">Dashboard Admin</font></a>
        </li>
        <?php
        }
        ?>
        <li class="nav-item">
         <a class="nav-link active" aria-current="page" href="index.php"><font face="Pink Chicken" style="color: #c08457" size="5">Home</font></a>
        </li>
        <li class="nav-item">
         <a class="nav-link" href="produk.php"><font face="Pink Chicken" style="color: #c08457"  size="5">Product</font></a>
        </li>
        <li class="nav-item">
         <a class="nav-link" href="jadijual.php"><font face="Pink Chicken" style="color: #c08457" size="5">Seller</font></a>
        </li>
        <li class="nav-item">
         <a class="nav-link" href="Faq.php"><font face="Pink Chicken" style="color: #c08457"  size="5">FAQ</font></a>
        </li>
        <li class="nav-item">
         <a class="nav-link" href="logout.php"><font face="Pink Chicken" style="color: #c08457"  size="5">Logout</font></a>
        </li>
  </ul>
      </div>
    </div>
  </div>
  </nav>


<div class="bg-warning p-2 text-warning bg-opacity-25 text-center">  
<br>
<p class="text-center"><font face="Pink Chicken" style="color: #c08457" size="6" type="text-center" >Hallo, Ada yang bisa kami bantu?</font></p>
<div class="overflow-hidden" style="max-height: 30vh;">
      <div class="container px-5">
        <img src="bantuan.png" class="img-fluid border rounded-3 shadow-lg mb-4" alt="Example image" width="700" height="500" loading="lazy">
      </div>
    </div>
</div>

<div class="accordion" id="accordionPanelsStayOpenExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="panelsStayOpen-headingOne">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
      <font face="Pink Chicken">Bagaimana cara berbelanja disini?</font>
      </button>
    </h2>
    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingOne">
    <div class="accordion-body">
    <font face="Pink Chicken" size="3">Halo kami selaku admin mencoba menjawab pertanyaan anda, Cara berbelanja disini :
    <ol>  
      <li>Klik "Produk"
      <li>Cari produk yang anda inginkan
      <li>Klik "Beli"
      <li>Selanjutnya, anda akan diarahkan ke no. whatsapp admin
      <li>anda bisa langsung kirim pesan ke no. whatsapp tersebut dengan format:
        Hallo admin, saya ingin membeli "nama product"-"nama toko"-"jumlah produk yang ingin dibeli"
      <li>Terakhir, admin akan mengirimkan format pembelian yang harus diisi oleh pelanggan
    </ol>
    <strong> Note: Selain anda mengirimkan berkas anda juga bisa bertanya kepada admin di whatsapp ataupun gmail seputar membeli product</strong>
    </font>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
      <font face="Pink Chicken">Penawaran Pembelian</font>
      </button>
    </h2>
    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
      <div class="accordion-body">
      <font face="Pink Chicken" size="3">Halo kami selaku admin mencoba menjawab pertanyaan anda, dalam menu bantuan ini kami menawarkan kerajinan tangan yang dibuat dari daerah kabupaten pangandaran.
        Dalam beberapa waktu kami mengadakan event diskon atau potongan harga yang bisa mencapai <strong>50%</strong>. Jika anda memiliki pertanyaan lain anda dapat menghubungi secara langsung ke whatsapp kami atau melalui gmail kami.
        </font> 
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="panelsStayOpen-headingThree">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
      <font face="Pink Chicken">Mulai Berjualan disini</font>
      </button>
    </h2>
    <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
      <div class="accordion-body">
      <font face="Pink Chicken" size="3">
      Halo pelanggan setia, anda tertarik untuk menjadi Seller disini? Jika anda tertarik anda bisa mulai dengan:
      <ol>  
      <li>Klik "Seller"
      <li>Ketika tampilan terbuka, anda akan melihat sebuah file pdf
      <li>Anda bisa membaca PDF tersebut di halaman website nya, ataupun download pdf tersebut 
      <li>Setelah anda memahami isi PDF mengenai "kelengkapan data menjadi seller, syarat menjadi seller, juga perjanjian menjadi seller" segera klik "kirim sekarang" disebelah pdf tersebut
      <li>Selanjutnya, anda akan diarahkan ke no. whatsapp admin
      <li>anda bisa langsung kirim pesan ke no. whatsapp tersebut dengan format:
        Hallo admin, saya ingin menjadi seller, ini berkas yang dibutuhkan:
      <li>Terakhir, anda akan mendapatkan konfirmasi dari gmail admin bahwa anda sudah dapat mulai berjualan
    </ol>       
    <strong> Note: Selain anda mengirimkan berkas anda juga bisa bertanya kepada admin di whatsapp ataupun gmail seputar menjadi seller</strong>
       </font> 
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="panelsStayOpen-headingFour">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false" aria-controls="panelsStayOpen-collapseFour">
      <font face="Pink Chicken">Butuh bantuan lebih lanjut? Hubungi Call center</font>
      </button>
    </h2>
    <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingFour">
      <div class="accordion-body">
      <strong> <font face="Pink Chicken" size="3"><a href="https://web.whatsapp.com/">Whatsapp</a>  | <a href="mailto: admpariwisata24@gmail.com">Gmail</a> </font></strong> 
      </div>
    </div>
  </div>
</div>


<!-- footer -->

<section class="footer pt-5 mt-5 top-50">
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
</section>

<script>
function openModal() {
  document.getElementById("myModal").style.display = "block";
}

function closeModal() {
  document.getElementById("myModal").style.display = "none";
}

var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
</script>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
  <!-- AOS -->
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
</body>
</html>