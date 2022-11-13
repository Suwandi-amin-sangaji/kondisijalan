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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
                                    <h5 class="m-b-10">Tambah Kerusakan Berat</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php"><i
                                                class="feather icon-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="#!">Lokasi</a></li>
                                    <li class="breadcrumb-item"><a href="#!">Tambah Kerusakan Berat</a></li>
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
                                                <h4 align="center">Pilih Data Jalan</h4>
                                                <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="GET">
                                                    <div class="form-group">
                                                        <label>Nama Jalan</label>
                                                        <select class="js-example-basic-single form-control"
                                                            name="id_kerusakan" required>
                                                            <option>Pilih</option>
                                                            <?php
                                                            include 'koneksi.php';
                                                            $kelu = mysqli_query($con, "SELECT * FROM tb_kerusakan  
                                                                        JOIN tb_jalan ON tb_kerusakan.id_jalan=tb_jalan.id_jalan
                                                                        WHERE cluster='C1'
                                                                        ORDER by id_kerusakan ASC");
                                                            while ($a = mysqli_fetch_array($kelu)) {
                                                            ?>
                                                            <option value="<?= $a['id_kerusakan'] ?>"><?= $a['nama'] ?>
                                                            </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <center>
                                                        <button type="submit" class="btn btn-primary">Pilih</button>
                                                        <a class="btn btn-danger" href="data_berat.php">Kembali</a>
                                                    </center>
                                                </form>
                                                <?php
                                                if (isset($_GET['id_kerusakan'])) {
                                                    $id_kerusakan = $_GET['id_kerusakan'];

                                                    //menampilkan data pegawai berdasarkan pilihan combobox ke dalam form
                                                    $tamPeg = mysqli_query($con, "SELECT * FROM tb_kerusakan 
                                                                JOIN tb_jalan ON tb_kerusakan.id_jalan=tb_jalan.id_jalan
                                                                WHERE id_kerusakan='$id_kerusakan'");
                                                    $tpeg = mysqli_fetch_array($tamPeg);

                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- [ form-element ] end -->
                            </div>
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <center>
                                                    <div id="googleMap" style="width:100%;height:500px;" align="center">
                                                    </div>
                                                </center>
                                                <br>
                                                <form action="simpan_berat.php" method="POST">
                                                    <div class="form-group">
                                                        <label>KONDISI JALAN</label><br>
                                                        <img src="gambar/<?php echo $tpeg['foto']; ?>"
                                                            style="width:100px;height:100px;">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Nama Jalan</label>
                                                        <input type="text" class="form-control" placeholder="Nama Jalan"
                                                            name="nama" required value="<?php echo $tpeg['nama']; ?>">
                                                    </div>
                                                    <input type="hidden" name="id_jalan"
                                                        value="<?php echo $tpeg['id_jalan']; ?>">

                                                    <div class="form-group">
                                                        <label>Latitude</label>
                                                        <input type="text" name="lat" id="lat" class="form-control">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Longtitude</label>
                                                        <input type="text" name="lon" id="lng" class="form-control">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Keterangan</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Jumlah Lubang" name="keterangan" required
                                                            value="Jumlah Lubang <?php echo  $tpeg['jum_lubang']; ?>, Ukuran Lubang <?php echo  $tpeg['uk_lubang']; ?>, dan Bekas Roda <?php echo  $tpeg['bekas_roda']; ?>. Wilayah sepanjang 200m">
                                                    </div>
                                                    <center>
                                                        <button type="submit" class="btn btn-primary"
                                                            name="simpan">Simpan</button>
                                                    </center>
                                                </form>
                                                <?php
                                                }
                                            ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- [ Main Content ] end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- [ Main Content ] end -->
<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
<script>
function initMap() {
    var myLatLng = {
        lat: -0.87956,
        lng: 131.26104
    };
    var map = new google.maps.Map(document.getElementById('googleMap'), {
        center: myLatLng,
        zoom: 15
    });

    var marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        title: '',
        draggable: true
    });

    google.maps.event.addListener(marker, 'dragend', function(marker) {
        var latLng = marker.latLng;
        document.getElementById('lat').value = [latLng.lat()];
        document.getElementById('lng').value = [latLng.lng()];
        // console.log(latLng.lat());
    });
}
// google.maps.event.addDomListener(window, 'load', initMap);
</script>
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAJeymz8JBndLm59FY1Ca9uxoGAxOASO6s&callback=initAutocomplete&libraries=places&v=weekly" async></script> -->
<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAJeymz8JBndLm59FY1Ca9uxoGAxOASO6s&libraries=places&callback=initMap"
    async defer></script>
<?php
include 'foot.php';
?>