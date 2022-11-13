<?php  
    include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Pemetaan Jalan Rusak</title>
    <!-- Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Landing page template for creative dashboard">
    <meta name="keywords" content="Landing page template">
    <!-- Favicon icon -->
    <link rel="icon" href="assets/logos/logoku.png" type="image/png" sizes="16x16">
    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600" rel="stylesheet">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="assets/css/animate.css">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="assets/css/owl.carousel.css">
    <link rel="stylesheet" href="assets/css/owl.theme.css">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <!-- Full Page Animation -->
    <link rel="stylesheet" href="assets/css/animsition.min.css">
    <!-- Ionic Icons -->
    <link rel="stylesheet" href="assets/css/ionicons.min.css">
    <!-- Main Style css -->
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" media="all" />

    <style type="text/css">
        #map {
          height: 100%;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
</head>

<body>
    <div class="wrapper animsition" data-animsition-in-class="fade-in" data-animsition-in-duration="1000" data-animsition-out-class="fade-out" data-animsition-out-duration="1000">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light navbar-default navbar-fixed-top" role="navigation">
                <div class="container">
                    <a class="navbar-brand page-scroll" href="#main"><img src="assets/logos/logoku.png" alt="adminity Logo" /></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                     <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                        </ul>
                        <ul class="navbar-nav my-2 my-lg-0">
                            <li class="nav-item">
                                <a class="nav-link page-scroll" href="index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link page-scroll" href="pemetaan.php">Pemetaan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link page-scroll" href="grafik.php">Grafik</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link page-scroll" href="login/login.php">Login</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div class="main" id="main">
            <!-- Main Section-->
            <div class="hero-section app-hero">
                <div class="container">
                    <div class="hero-content app-hero-content text-center">
                        <div class="row justify-content-md-center">
                            <div class="col-md-10">
                                <h1 class="wow fadeInUp" data-wow-delay="0s">PEMETAAN JALAN RUSAK</h1>
                                <p class="wow fadeInUp" data-wow-delay="0.2s">
                                    Website pemetaan jalan rusak ini dibuat untuk memudahkan pihak terkait dalam memberikan informasi kepada masyarakat tentang letak lokasi jalan rusak.
                                </p>
                            </div>
                            <div class="col-md-12">
                                <div class="hero-image">
                                    <img class="img-fluid" src="assets/images/g1.jpg" alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                        <div class="flex-features" id="features">
                <div class="container">
                    <div class="flex-split">
                        <div class="f-left wow fadeInUp" data-wow-delay="0s">
                            <div class="left-content">
                                <img class="img-fluid" src="assets/images/g2.png" alt="" />
                            </div>
                        </div>
                        <div class="f-right wow fadeInUp" data-wow-delay="0.2s">
                            <div class="right-content">
                                <h2>ABOUT SYSTEM</h2>
                                <p align="justify">
                                    SIG adalah sistem yang dapat mendukung pengambilan keputusan spasial dan mampu mengintegrasikan deskripsi-deskripsi lokasi dengan karakteristik-karateristik fenomena yang ditemukan di lokasi tersebut. SIG yang lengkap mencakup teknologi dan metodologi yang diperlukan yaitu data spasial, perangkat keras, perangkat lunak dan stuktur organisasi.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="flex-split">
                        <div class="f-right">
                            <div class="right-content wow fadeInUp" data-wow-delay="0.2s">
                                <h2>BROKEN ROAD</h2>
                                <p align="justify">
                                   Kondisi jalan yang rusak sering menyebabkan kecelakaan, bahkan menyebabkan jatuhnya korban dan kerugian harta benda akibat terperosok atau terserempet atau ditabrak kendaraan lain saat menghindari jalan rusak tersebut.
                                </p>
                                <p align="justify">
                                   Bagi pemerintah pusat maupun daerah perlu alaram peringatan bahwa ada sanksi apabila membiarkan jalan rusak. Sesuai Pasal 24 ayat (1) UU No.22 Tahun 2009 tentang Lalu Lintas dan Angkutan Jalan, penyelengkara wajib segera dan patut untuk memperbaiki jalan yang rusak yang dapat mengakibatkan kecelakaan lalu lintas.
                                </p>
                            </div>
                        </div>
                        <div class="f-left">
                            <div class="left-content wow fadeInUp" data-wow-delay="0.3s">
                                <img class="img-fluid" src="assets/images/g3.png" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer Section -->
            <div class="footer">
                <div class="container">
                    <div class="col-md-12 text-center">
                        <img src="assets/logos/logo.png" alt="Datta Able Logo" />
                        <ul class="footer-menu">
                            <li><a href="http://demo.com">Site</a></li>
                            <li><a href="#!">Support</a></li>
                            <li><a href="#!">Terms</a></li>
                            <li><a href="#!">Privacy</a></li>
                        </ul>
                        <div class="footer-text">
                            <p>
                                Copyright © 2018 Datta Able. All Rights Reserved.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Scroll To Top -->
            <a id="back-top" class="back-to-top page-scroll" href="#main">
                <i class="ion-ios-arrow-thin-up"></i>
            </a>
            <!-- Scroll To Top Ends-->
        </div>
        <!-- Main Section -->
    </div>
    <!-- Wrapper-->

    <!-- Jquery and Js Plugins -->
    <script type="text/javascript" src="assets/js/jquery-2.1.1.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/plugins.js"></script>
    <script type="text/javascript" src="assets/js/menu.js"></script>
    <script type="text/javascript" src="assets/js/custom.js"></script>
</body>

<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <script>

        function initMap() {
            

            var myLatLng = {lat: -0.87956, lng: 131.26104};
            var map = new google.maps.Map(document.getElementById('googleMap'), {
                center: myLatLng,
                zoom: 14
            });

            var infowindow = new google.maps.InfoWindow();

            var marker, i;

            var locations = [
            <?php
              include 'koneksi.php';
              $data = mysqli_query($con, "SELECT * FROM tb_berat ORDER by id_berat DESC");
              $no = 1;
              while($d = mysqli_fetch_array($data)){
              ?>
                            ['Lokasi: <?=$d['nama_jalan']?><br>Keterangan: <?=$d['keterangan']?>', <?=$d['lat']?>, <?=$d['lon']?>, <?=$no++?>],
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
              $data = mysqli_query($con, "SELECT * FROM tb_sedang ORDER by id_sedang DESC");
              $no = 1;
              while($d = mysqli_fetch_array($data)){
              ?>
                            ['Lokasi: <?=$d['nama_jalan']?><br>Keterangan: <?=$d['keterangan']?>', <?=$d['lat']?>, <?=$d['lon']?>, <?=$no++?>],
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
              $data = mysqli_query($con, "SELECT * FROM tb_baik ORDER by id_baik DESC");
              $no = 1;
              while($d = mysqli_fetch_array($data)){
              ?>
                            ['Lokasi: <?=$d['nama_jalan']?><br>Keterangan: <?=$d['keterangan']?>', <?=$d['lat']?>, <?=$d['lon']?>, <?=$no++?>],
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
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAJeymz8JBndLm59FY1Ca9uxoGAxOASO6s&libraries=places&callback=initMap" async defer></script>

</html>
