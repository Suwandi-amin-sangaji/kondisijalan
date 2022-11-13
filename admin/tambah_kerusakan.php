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
                                    <h5 class="m-b-10">Tambah Kerusakan</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php"><i
                                                class="feather icon-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="#!">Kerusakan</a></li>
                                    <li class="breadcrumb-item"><a href="#!">Tambah Kerusakan</a></li>
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
                                                <form action="simpan_kerusakan.php" method="post"
                                                    enctype='multipart/form-data'>
                                                    <div class="form-group">
                                                        <label>Nama Jalan</label>
                                                        <select class="js-example-basic-single form-control" name="a"
                                                            required>
                                                            <option>Pilih</option>
                                                            <?php
                                                            include 'koneksi.php';
                                                            $kelu = mysqli_query($con, "SELECT * FROM tb_jalan ORDER by id_jalan ASC");
                                                            while ($a = mysqli_fetch_array($kelu)) {
                                                            ?>
                                                            <option value="<?= $a['id_jalan'] ?>"><?= $a['nama'] ?>
                                                            </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Gambar</label>
                                                        <input name="foto" class="form-control" type='file'
                                                            accept='image/*' onchange='readURL(event)'>
                                                    </div>
                                                    <p>Preview</p>
                                                    <img id='output' style="width:200px;height:200px;"><br>

                                                    <div class="form-group">
                                                        <label>Jumlah Lubang</label>
                                                        <input type="number" class="form-control"
                                                            placeholder="Jumlah Lubang" name="b" required min="0"
                                                            max="4">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Ukuran Lubang</label>
                                                        <input type="number" class="form-control"
                                                            placeholder="Ukuran Lubang" name="c" required min="0"
                                                            max="5">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Bekas Roda</label>
                                                        <input type="number" class="form-control"
                                                            placeholder="Bekas Roda" name="d" required min="0" max="4">
                                                    </div>
                                                    <center>
                                                        <button type="submit" class="btn btn-primary"
                                                            name="simpan">Simpan</button>
                                                        <a class="btn btn-danger" href="data_kerusakan.php">Kembali</a>
                                                    </center>
                                                </form>
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

    <script>
    var readURL = function(event) {
        var input = event.target;

        var reader = new FileReader();
        reader.onload = function() {
            var dataURL = reader.result;
            var output = document.getElementById('output');
            output.src = dataURL;
        };
        reader.readAsDataURL(input.files[0]);
    };
    </script>
    <?php
    include 'foot.php';
    ?>