<?php  
    session_start();
    if($_SESSION['level']==""){
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
                                        <h5 class="m-b-10">Edit Kerusakan Sedang</h5>
                                    </div>
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php"><i class="feather icon-home"></i></a></li>
                                        <li class="breadcrumb-item"><a href="#!">Lokasi</a></li>
                                        <li class="breadcrumb-item"><a href="#!">Edit Kerusakan Sedang</a></li>
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
                                                        $id = $_GET['id'];
                                                        $data = mysqli_query($con,"SELECT * FROM tb_sedang 
                                                            JOIN tb_jalan ON tb_sedang.id_jalan=tb_jalan.id_jalan WHERE id_sedang='$id'");
                                                        while($d = mysqli_fetch_array($data))
                                                        {
                                                     ?>
                                                    <center>
                                                        <div id="googleMap" style="width:1000px;height:500px;" align="center"></div>
                                                    </center>
                                                    <br>
                                                    <form action="update_sedang.php" method="post">
                                                        <div class="form-group">
                                                            <label>Nama Jalan</label>
                                                            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                                                            <input type="text" class="form-control" placeholder="Nama Jalan" name="a" required value="<?php echo $d['nama']; ?>">
                                                        </div>
                                                        <input type="hidden" name="id_jalan" value="<?php echo $d['id_jalan']; ?>">

                                                        <input type="hidden" name="lats" id="lat">
                                                        <input type="hidden" name="lngs" id="lng">

                                                        <div class="form-group">
                                                            <label>Keterangan</label>
                                                            <input type="text" class="form-control" placeholder="Keterangan" name="b" required value="<?php echo  $d['keterangan']; ?>">
                                                        </div>
                                                        <center>
                                                            <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
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
                      var myLatLng = {lat: -0.87956, lng: 131.26104};
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
              <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAJeymz8JBndLm59FY1Ca9uxoGAxOASO6s&libraries=places&callback=initMap" async defer></script>
<?php  
    include 'foot.php';
?>