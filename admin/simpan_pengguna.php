<?php 
session_start();
include 'koneksi.php';
 
if (isset($_POST['simpan'])) {
    $nama      = $_POST['b'];
    $username  = $_POST['c'];
    $password  = $_POST['d'];
    $level     = $_POST['e'];
   //buat folder bernama gambar
    $tempdir = "assets/images/pengguna/"; 
            if (!file_exists($tempdir))
            mkdir($tempdir,0755); 

            $target_path = $tempdir . basename($_FILES['filegambar']['name']);

            //nama gambar
            $nama_gambar=$_FILES['filegambar']['name'];
            //ukuran gambar
            $ukuran_gambar = $_FILES['filegambar']['size'];  
            if($ukuran_gambar > 1000000000){ 
                $_SESSION['pesan'] = "Ukuran Harus Dibawah 1MB";
                header("location:tambah_pengguna.php");
            }else{
                if (move_uploaded_file($_FILES['filegambar']['tmp_name'], $target_path)) {
                    
                    $sql=mysqli_query($con,"INSERT INTO tb_pengguna VALUES('','$level','$nama_gambar','$nama','$username','$password')");
                    $_SESSION['pesan'] = "Data Berhasil Disimpan";
                    header("location:data_pengguna.php");
                } else {
                    $_SESSION['pesan'] = "Data Gagal Disimpan";
                    header("location:tambah_pengguna.php");
                }
            } 
}
?> 