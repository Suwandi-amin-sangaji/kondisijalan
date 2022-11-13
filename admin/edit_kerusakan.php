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
                                    <h5 class="m-b-10">Edit Kerusakan</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php"><i
                                                class="feather icon-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="#!">Kerusakan</a></li>
                                    <li class="breadcrumb-item"><a href="#!">Edit Kerusakan</a></li>
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
                                                $data = mysqli_query($con, "SELECT * FROM tb_kerusakan WHERE id_kerusakan='$id'");
                                                while ($d = mysqli_fetch_array($data)) {
                                                ?>
                                                <form action="update_kerusakan.php" method="POST"
                                                    enctype='multipart/form-data'>
                                                    <div class="form-group">
                                                        <label>Nama Jalan</label>
                                                        <input hidden name="id" value="<?php echo $_GET['id']; ?>">
                                                        <select class="js-example-basic-single form-control" name="a"
                                                            required>
                                                            <?php
                                                                $jalan = mysqli_query($con, "SELECT * FROM tb_jalan");
                                                                while ($data_jalan = mysqli_fetch_array($jalan)) {
                                                                    if ($d['id_jalan'] == $data_jalan['id_jalan']) {
                                                                        $select = "selected";
                                                                    } else {
                                                                        $select = "";
                                                                    }
                                                                    echo "<option $select>" . $data_jalan['nama'] . "</option>";
                                                                }
                                                                ?>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Gambar</label>
                                                        <input name="foto" class="form-control" type='file'
                                                            accept='image/*' onchange='readURL(event)'>
                                                    </div>
                                                    <p>Preview</p>
                                                    <img id='output' style="width:200px;height:200px;"
                                                        src="gambar/<?= $d['foto'] ?>"><br>
                                                    <small class="text-danger">Abaikan Jika Tidak ingin Mengubah
                                                        Gambar</small><br>
                                                    <div class="form-group">
                                                        <label>Jumlah Lubang</label>
                                                        <input type="number" class="form-control"
                                                            placeholder="Jumlah Lubang" name="jum_lubang" required
                                                            min="0" max="4" value="<?php echo $d['jum_lubang']; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Ukuran Lubang</label>
                                                        <input type="number" class="form-control"
                                                            placeholder="Ukuran Lubang" name="uk_lubang" required
                                                            min="0" max="5" value="<?php echo $d['uk_lubang']; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Bekas Roda</label>
                                                        <input type="number" class="form-control"
                                                            placeholder="Bekas Roda" name="bekas_roda" required min="0"
                                                            max="4" value="<?php echo $d['bekas_roda']; ?>">
                                                    </div>

                                                    <button class="btn btn-primary" type="submit" name="simpan">
                                                        Update</button>
                                                    <a class="btn btn-danger" href="data_kerusakan.php">Kembali</a>

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