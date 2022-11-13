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
<style type="text/css">
#map {
    height: 100%;
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <!-- [ breadcrumb ] start -->

                <!-- [ breadcrumb ] end -->
                <div class="main-body">
                    <div class="page-wrapper">
                        <!-- [ Main Content ] start -->
                        <div class="row">
                            <!-- [ sample-page ] start -->
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Hello <?php echo $_SESSION['nama'] ?></h5>
                                    </div>
                                    <div class="card-block">
                                        <p>"Website pemetaan jalan rusak ini dibuat untuk memudahkan pihak terkait dalam
                                            memberikan informasi kepada masyarakat tentang letak lokasi jalan rusak."
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- [ sample-page ] end -->
                        </div>

                        <div class="row">
                            <!-- [ daily sales section ] start -->
                            <div class="col-md-6 col-xl-4">
                                <div class="card">
                                    <div class="card-block">
                                        <?php $baik = mysqli_fetch_array(mysqli_query($con, "SELECT cluster, COUNT(cluster) AS jumlah FROM tb_kerusakan WHERE cluster='C2'"));
                                        $total = mysqli_fetch_array(mysqli_query($con, "SELECT cluster, COUNT(cluster) AS total FROM tb_kerusakan"));
                                        $totb = $baik['jumlah'];
                                        $tot = $total['total'];
                                        $persen = ($totb / $tot) * 100;
                                        ?>
                                        <h6 class="mb-4">Kerusakan Baik</h6>
                                        <div class="row d-flex align-items-center">
                                            <div class="col-9">
                                                <h3 class="f-w-300 d-flex align-items-center m-b-0"><i
                                                        class=" text-c-green f-30 m-r-10"></i><?php echo $baik['jumlah']; ?>
                                                </h3>
                                            </div>

                                            <div class="col-3 text-right">
                                                <p class="m-b-0"><?php echo $persen; ?>%</p>
                                            </div>
                                        </div>
                                        <div class="progress m-t-30" style="height: 7px;">
                                            <div class="progress-bar progress-c-theme" role="progressbar"
                                                style="width: 80%;" aria-valuenow="50" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- [ daily sales section ] end -->

                            <!-- [ Monthly  sales section ] start -->
                            <div class="col-md-6 col-xl-4">
                                <div class="card">
                                    <div class="card-block">
                                        <?php $sedang = mysqli_fetch_array(mysqli_query($con, "SELECT cluster, COUNT(cluster) AS jumlah FROM tb_kerusakan WHERE cluster='C3'"));
                                        $total = mysqli_fetch_array(mysqli_query($con, "SELECT cluster, COUNT(cluster) AS total FROM tb_kerusakan"));
                                        $tots = $sedang['jumlah'];
                                        $tot = $total['total'];
                                        $persen = ($tots / $tot) * 100;
                                        ?>
                                        <h6 class="mb-4">Kerusakan Sedang</h6>
                                        <div class="row d-flex align-items-center">
                                            <div class="col-9">
                                                <h3 class="f-w-300 d-flex align-items-center  m-b-0"><i
                                                        class=" text-c-red f-30 m-r-10"></i><?php echo $sedang['jumlah']; ?>
                                                </h3>
                                            </div>
                                            <div class="col-3 text-right">
                                                <p class="m-b-0"><?php echo $persen; ?>%</p>
                                            </div>
                                        </div>
                                        <div class="progress m-t-30" style="height: 7px;">
                                            <div class="progress-bar progress-c-theme2" role="progressbar"
                                                style="width: 12%;" aria-valuenow="35" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- [ Monthly  sales section ] end -->

                            <!-- [ year  sales section ] start -->
                            <div class="col-md-12 col-xl-4">
                                <div class="card">
                                    <div class="card-block">
                                        <?php $berat = mysqli_fetch_array(mysqli_query($con, "SELECT cluster, COUNT(cluster) AS jumlah FROM tb_kerusakan WHERE cluster='C1'"));
                                        $total = mysqli_fetch_array(mysqli_query($con, "SELECT cluster, COUNT(cluster) AS total FROM tb_kerusakan"));
                                        $totbe = $berat['jumlah'];
                                        $tot = $total['total'];
                                        $persen = ($totbe / $tot) * 100;
                                        ?>
                                        <h6 class="mb-4">Kerusakan Berat</h6>
                                        <div class="row d-flex align-items-center">
                                            <div class="col-9">
                                                <h3 class="f-w-300 d-flex align-items-center  m-b-0"><i
                                                        class="feather icon-arrow-up text-c-green f-30 m-r-10"></i><?php echo $berat['jumlah']; ?>
                                                </h3>
                                            </div>
                                            <div class="col-3 text-right">
                                                <p class="m-b-0"><?php echo $persen; ?>%</p>
                                            </div>
                                        </div>
                                        <div class="progress m-t-30" style="height: 7px;">
                                            <div class="progress-bar progress-c-theme" role="progressbar"
                                                style="width: 8%;" aria-valuenow="70" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- [ year  sales section ] end -->
                        </div>
                        <!-- [ Main Content ] end -->

                        <div class="row">
                            <!-- [ sample-page ] start -->
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-block">
                                        <center>
                                            <div id="googleMap" style="width:100%;height:500px;" align="center"></div>
                                        </center>
                                    </div>
                                </div>
                            </div>
                            <!-- [ sample-page ] end -->
                        </div>

                        <div class="row">
                            <!-- [ sample-page ] start -->
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-block">
                                        <center>
                                            <canvas id="myChart2"></canvas>
                                        </center>
                                        <script>
                                        var ctx = document.getElementById("myChart2").getContext('2d');
                                        var myChart = new Chart(ctx, {
                                            type: 'pie',
                                            data: {
                                                labels: ["Berat", "Sedang", "Baik"],
                                                datasets: [{
                                                    label: '',
                                                    data: [
                                                        <?php
                                                            $jumlah_sr = mysqli_query($con, "SELECT * FROM tb_kerusakan WHERE cluster='C1'");
                                                            echo mysqli_num_rows($jumlah_sr);
                                                            ?>,
                                                        <?php
                                                            $jumlah_cr = mysqli_query($con, "SELECT * FROM tb_kerusakan WHERE cluster='C3'");
                                                            echo mysqli_num_rows($jumlah_cr);
                                                            ?>,
                                                        <?php
                                                            $jumlah_tr = mysqli_query($con, "SELECT * FROM tb_kerusakan WHERE cluster='C2'");
                                                            echo mysqli_num_rows($jumlah_tr);
                                                            ?>
                                                    ],
                                                    backgroundColor: [
                                                        'rgb(205, 92, 92)',
                                                        'rgb(218, 165, 32)',
                                                        'rgb(46, 139, 87)',
                                                    ],
                                                    borderColor: [
                                                        'rgb(205, 92, 92)',
                                                        'rgb(218, 165, 32)',
                                                        'rgb(46, 139, 87)',
                                                    ],
                                                    borderWidth: 1
                                                }]
                                            },
                                            options: {
                                                scales: {
                                                    yAxes: [{
                                                        ticks: {
                                                            beginAtZero: true
                                                        }
                                                    }]
                                                }
                                            }
                                        });
                                        </script>
                                    </div>
                                </div>
                            </div>
                            <!-- [ sample-page ] end -->
                        </div>
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
        zoom: 14
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    var locations = [
        <?php
            include 'koneksi.php';
            $data = mysqli_query($con, "SELECT * FROM tb_berat 
           JOIN tb_jalan ON tb_berat.id_jalan=tb_jalan.id_jalan
           JOIN tb_kerusakan ON tb_kerusakan.id_jalan=tb_jalan.id_jalan  
            ORDER by id_berat DESC");
            $no = 1;
            while ($d = mysqli_fetch_array($data)) {
            ?>['<img width=300px src=gambar/<?= $d['foto'] ?>> <br> Lokasi: <?= $d['nama'] ?><br>Keterangan: <?= $d['keterangan'] ?>',
            <?= $d['lat'] ?>, <?= $d['lon'] ?>, <?= $no++ ?>],
        <?php } ?>
    ];
    for (i = 0; i < locations.length; i++) {
        marker = new google.maps.Marker({
            position: new google.maps.LatLng(locations[i][1], locations[i][2]),
            map: map,
            icon: 'assets/images/pin1.png'
        });

        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
                infowindow.setContent(locations[i][0]);
                infowindow.open(map, marker);
            }
        })(marker, i));
    }

    var locations2 = [
        <?php
            include 'koneksi.php';
            $data = mysqli_query($con, "SELECT * FROM tb_sedang 
             JOIN tb_jalan ON tb_sedang.id_jalan=tb_jalan.id_jalan
             JOIN tb_kerusakan ON tb_kerusakan.id_jalan=tb_jalan.id_jalan  
            ORDER by id_sedang DESC");
            $no = 1;
            while ($d = mysqli_fetch_array($data)) {
            ?>['<img width=300px src=gambar/<?= $d['foto'] ?>> <br> Lokasi: <?= $d['nama'] ?><br>Keterangan: <?= $d['keterangan'] ?>',
            <?= $d['lat'] ?>, <?= $d['lon'] ?>,
            <?= $no++ ?>],
        <?php } ?>
    ];
    for (j = 0; j < locations2.length; j++) {
        marker2 = new google.maps.Marker({
            position: new google.maps.LatLng(locations2[j][1], locations2[j][2]),
            map: map,
            icon: 'assets/images/pin2.png'
        });

        google.maps.event.addListener(marker2, 'click', (function(marker2, j) {
            return function() {
                infowindow.setContent(locations2[j][0]);
                infowindow.open(map, marker2);
            }
        })(marker2, j));
    }

    var locations3 = [
        <?php
            include 'koneksi.php';
            $data = mysqli_query($con, "SELECT * FROM tb_baik 
            JOIN tb_jalan ON tb_baik.id_jalan=tb_jalan.id_jalan
            JOIN tb_kerusakan ON tb_kerusakan.id_jalan=tb_jalan.id_jalan  
            ORDER BY id_baik");
            $no = 1;
            while ($d = mysqli_fetch_array($data)) {
            ?>['<img width=300px src=gambar/<?= $d['foto'] ?>> <br> Lokasi: <?= $d['nama'] ?><br>Keterangan: <?= $d['keterangan'] ?>',
            <?= $d['lat'] ?>, <?= $d['lon'] ?>,
            <?= $no++ ?>],
        <?php } ?>
    ];
    for (k = 0; k < locations3.length; k++) {
        marker3 = new google.maps.Marker({
            position: new google.maps.LatLng(locations3[k][1], locations3[k][2]),
            map: map,
            icon: 'assets/images/pin3.png'
        });

        google.maps.event.addListener(marker3, 'click', (function(marker3, k) {
            return function() {
                infowindow.setContent(locations3[k][0]);
                infowindow.open(map, marker3);
            }
        })(marker3, k));
    }
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