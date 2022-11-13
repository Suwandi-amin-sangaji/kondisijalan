<?php
session_start();
if ($_SESSION['level'] == "") {
    header("location:../login/login.php");
}
include 'head.php';
include 'menu.php';
include 'header.php';
include 'koneksi.php';
?>

<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <!-- [ breadcrumb ] start -->
                <div class="page-header">
                    <div class="page-block">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <div class="page-header-title">
                                    <h5 class="m-b-10">Edit Jalan</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php"><i
                                                class="feather icon-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="#!">Jalan</a></li>
                                    <li class="breadcrumb-item"><a href="#!">Edit Jalan</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- [ breadcrumb ] end -->
                <div class="main-body">
                    <div class="page-wrapper">
                        <!-- [ Main Content ] start -->
                        <div class="row">
                            <div class="col-sm-12">
                            </div>
                            <!-- [ form-element ] start -->
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <?php
                                                if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
                                                    echo
                                                    '
                                                            <div class="alert alert-danger" role="alert">
                                                                ' . $_SESSION['pesan'] . '
                                                            </div>
                                                        ';
                                                }
                                                $_SESSION['pesan'] = '';
                                                ?>
                                                <?php
                                                $id = $_GET['id'];
                                                $data = mysqli_query($con, "SELECT * FROM tb_jalan WHERE id_jalan='$id'");
                                                while ($d = mysqli_fetch_array($data)) {
                                                ?>
                                                <form action="update_jalan.php" method="post"
                                                    enctype='multipart/form-data'>
                                                    <div class="form-group">
                                                        <label>Nama Jalan</label>
                                                        <input type="hidden" name="id"
                                                            value="<?php echo $_GET['id']; ?>">
                                                        <input type="text" class="form-control" placeholder="Nama Jalan"
                                                            name="a" required value="<?php echo $d['nama']; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Keterangan</label>
                                                        <input type="text" class="form-control" placeholder="Keterangan"
                                                            name="b" required value="<?php echo $d['ket']; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Edit Gambar</label><br>
                                                        <div>
                                                            <img src="gambar/<?= $d['foto'] ?>" alt="" width="200px">
                                                        </div><br>

                                                        <input type="file" class="form-control" placeholder="foto"
                                                            name="foto" required value="<?php echo $d['foto']; ?>">
                                                        <small class="text-danger">Abaikan Jika Tidak ingin Mengganti
                                                            Gambar</small>
                                                    </div>

                                                    <center>
                                                        <button type="submit" class="btn btn-primary"
                                                            name="simpan">Simpan</button>
                                                        <a class="btn btn-danger" href="data_jalan.php">Kembali</a>
                                                    </center>
                                                </form>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- [ form-element ] end -->
                            </div>
                            <!-- [ Main Content ] end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->
    <?php
    include 'foot.php';
    ?>