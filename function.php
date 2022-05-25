<?php

//koneksi database
$conn = mysqli_connect("localhost", "root", "", "tokokita");

//ambil data
function query($query){
    global $conn;
    $result= mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;   
    }
    return $rows;
}



//Registrasi.php
function Registrasi ($data){
    global $conn;
    $user = strtolower (stripslashes($data ["username"]));
    $password = mysqli_real_escape_string($conn, $data["Password"]);
    $password2 = mysqli_real_escape_string($conn, $data["Password2"]);

    //cek username ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$user'");
    if( mysqli_fetch_assoc($result)){
        echo "<script>
            alert('Email sudah terdaftar, silahkan gunakan email lain')
        </script>";
        return false;
    }

    //cek konfirmasi password
    if ($password !== $password2){
        echo "<script>
                alert('konfirmasi password tidak sesuai !');
        </script>";
        return false;
    }

    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    //tambahkan ke database
    mysqli_query($conn, "INSERT INTO user VALUES (null,'$user', '$password', 'biasa')");

    return mysqli_affected_rows($conn);
}

//tambah data 
function tambah($data){
    global $conn;

    //ambil data
    $nama = htmlspecialchars($data["nama_barang"]); 
    $toko = htmlspecialchars($data["nama_toko"]); 
    $harga  = htmlspecialchars($data["harga_barang"]);
   
    //upload gambar
    $foto = upload();
    if(!$foto){
        return false;
    }

    $tanggal =htmlspecialchars($data["tanggal_barang"]);
    $deskripsi =htmlspecialchars($data["deskripsi_barang"]);

    //query insert
    $query = "INSERT INTO produk
              VALUES
              (null , '$nama', '$toko', '$harga', '$foto', '$tanggal', '$deskripsi')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function upload(){
    $namaFile = $_FILES['foto_barang']['name'];
    $ukuranFile = $_FILES['foto_barang']['size'];
    $error = $_FILES['foto_barang']['error'];
    $tmpName = $_FILES ['foto_barang']['tmp_name'];

    //cek apakah ada gambar atau tidak 
    if($error === 4 ){
        echo "<script>
            alert ('Mohon inputkan gambar terlebih dahulu');
        </script>"; 
        return false;
    }

    //cek apakah file yang di upload adalah gambar
    $ekstensiFotoValid = ['jpg','jpeg','png'];
    $ekstensiFoto = explode('.', $namaFile);
    $ekstensiFoto = strtolower(end($ekstensiFoto));

    if(!in_array($ekstensiFoto, $ekstensiFotoValid )){
        echo "<script>
            alert ('Maaf harap masukan file gambar');
        </script>"; 
        return false;   
    }

    //cek ukuran file
    if($ukuranFile > 3000000){
         echo "<script>
            alert ('Ukuran gambar terlalu besar');
        </script>"; 
        return false;
    }

    //lolos pengecekan dan file di upload
    //jika ada file yg nama sama maka akan dirandom
    $namaFileBaru =uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiFoto;

    move_uploaded_file($tmpName, 'img/'. $namaFileBaru);
    return $namaFileBaru;
}


//hapus data
function hapus ($id) {
    global $conn;
    $query = "DELETE FROM produk WHERE id_barang = $id";
    mysqli_query($conn, $query) or die (mysqli_error($conn));
    return mysqli_affected_rows($conn);
}



//update data 
function ubah ($data){
    global $conn;
    
    //ambil data
    $id = $data["id"];
    $nama = htmlspecialchars($data["nama_barang"]); 
    $toko = htmlspecialchars($data["nama_toko"]); 
    $harga  = htmlspecialchars($data["harga_barang"]);
    $fotolama = htmlspecialchars($data["fotolama"]);
    //cek user ganti gambar ga
    if($_FILES["foto_barang"]['error'] === 4){
        $foto = $fotolama;
    }else{
        $foto = upload();
    }

    $tanggal =htmlspecialchars($data["tanggal_barang"]);
    $deskripsi =htmlspecialchars($data["deskripsi_barang"]);
   

    


    $query = "UPDATE produk SET
                nama_barang = '$nama', 
                nama_toko = '$toko', 
                harga_barang = '$harga',
                foto_barang = '$foto',
                tanggal_barang = '$tanggal',
                deskripsi_barang = '$deskripsi'
                WHERE id_barang = '$id'";
     mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

//Search / cari produk
function cari($keyword){
    $query = "SELECT *FROM produk 
                WHERE nama_barang LIKE '%$keyword%'";
    return query($query);
}



//FUNCTION TAMBAH DATA PENJUAL
function tambahPenjual($data){
    global $conn;

    //ambil data
    $nama = htmlspecialchars($data["nama_penjual"]); 
    $alamat  = htmlspecialchars($data["alamat_penjual"]);
    $nomer =htmlspecialchars($data["no_penjual"]);
    $deskripsi =htmlspecialchars($data["deskripsi_penjual"]);
   
    //query insert
    $query = "INSERT INTO penjual
              VALUES
              (null , '$nama', '$alamat', '$nomer', '$deskripsi')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

//UBAH DATA PENJUAL
function ubahPenjual ($data){
    global $conn;
    
    //ambil data
    $id = $data["id"];
    $nama = htmlspecialchars($data["nama_penjual"]); 
    $alamat  = htmlspecialchars($data["alamat_penjual"]);
    $nomer =htmlspecialchars($data["no_penjual"]);
    $deskripsi = htmlspecialchars($data["deskripsi_penjual"]);   

    


    $query = "UPDATE penjual SET
                nama_penjual = '$nama', 
                alamat_penjual = '$alamat',
                no_penjual = '$nomer',
                deskripsi_penjual = '$deskripsi'
                WHERE id = '$id'";
     mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

//HAPUS PENJUAL
function hapusPenjual ($id) {
    global $conn;
    $query = "DELETE FROM penjual WHERE id = $id";
    mysqli_query($conn, $query) or die (mysqli_error($conn));
    return mysqli_affected_rows($conn);
}

//Search / cari produk
function cariPenjual($keyword){
    $query = "SELECT *FROM penjual 
                WHERE nama_penjual LIKE '%$keyword%' OR
                no_penjual LIKE '%$keyword%' OR
                alamat_penjual LIKE '%$keyword%' OR
                deskripsi_penjual LIKE '%$keyword%'";
    return query($query);
}




//Tambah data admin


function tambahAdmin($data){
    global $conn;

    //ambil data
    $username = ($data["username"]); 
    $password  = ($data["password"]);
    $level = $data['level'];
   
    //query insert
    $query = "INSERT INTO user
              VALUES
              (null , '$username', '$password', '$level')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

//UBAH DATA admin
function ubahAdmin ($data){
    global $conn;
    
    //ambil data
    $id = $data['id'];
    $username = ($data["username"]); 
    $password  = ($data["password"]);

    


    $query = "UPDATE user SET
                username = '$username', 
                pass = '$password'
                WHERE id = '$id'";
     mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

//HAPUS ADmin
function hapusAdmin ($id) {
    global $conn;
    $query = "DELETE FROM user WHERE id = $id";
    mysqli_query($conn, $query) or die (mysqli_error($conn));
    return mysqli_affected_rows($conn);
}

//Search / cari admin
function cariAdmin($keyword){
    $query = "SELECT *FROM user 
                WHERE username LIKE '%$keyword%' OR
                pass LIKE '%$keyword%' OR
                id LIKE '%$keyword'";
    return query($query);
}

//function Rupiah
function rupiah($angka){
    $hasil = 'Rp ' . number_format($angka, 0, ",", "." );
    return $hasil;
}


 
?>