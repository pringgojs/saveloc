s<!DOCTYPE html>
    <html lang="en">
      <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"   />
          <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"/>
        <link
              rel="stylesheet"
              href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
              integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
              crossorigin=""/>
      </head>
      <body>
        <br>
        <div class="container">
            <div class="alert alert-success">
                <h3>SaveLoc</h3>
            </div>
            <p>Klik tombol di bawah ini untuk menyimpan lokasi sekarang</p>
            <!-- saat button diklik maka akan menjalankan fungsi getlokasi -->
            <!-- <button class="btn btn-primary btn-block" onclick="getlokasi()">Dapatkan lokasi</button> -->
            <br>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" onclick="getlokasi()" data-toggle="modal" data-target="#exampleModal">
              Dapatkan lokasi
            </button>
            <!-- lokasi yang didapatkan akan dicetak di dalam elemen p -->
            <div id="mapid" style="border-radius: 8px; width: 100%; height: 400px"></div>


            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <!-- <p id="latlong"></p> -->
                    <div class="col-12"> <!-- ukuruan layar dengan bootstrap adalah 12 kolom, bagian kiri dibuat sebesar 4 kolom-->
                      <form action="proses.php" method="post">
                          <div class="form-group">
                              <label for="exampleFormControlInput1">Latitude, Longitude</label>
                              <input type="text" class="form-control" id="latlong" name="latlong">
                          </div>
                                              <div class="form-group">
                              <label for="exampleFormControlInput1">Nomor Kotak</label>
                              <input type="text" class="form-control" name="no_kontak">
                          </div>
                          <div class="form-group">
                              <label for="exampleFormControlInput1">Nama Tempat</label>
                              <input type="text" class="form-control" name="nama">
                          </div>
                          <div class="form-group">
                              <label for="exampleFormControlInput1">Kategori Tempat</label>
                              <select class="form-control" name="kategori" id="">
                                  <option value="">--Kategori Tempat--</option>
                                  <option value="rumah makan">Rumah Makan</option>
                                  <option value="pom bensin">Pom Bensin</option>
                                  <option value="Fasilitas Umum">Fasilitas Umum</option>
                                  <option value="Pasar/Mall">Pasar/Mall</option>
                                  <option value="rumah sakit">Rumah Sakit</option>
                                  <option value="Sekolah">Sekolah</option>
                              </select>
                          </div>
                          <div class="form-group">
                              <label for="exampleFormControlInput1">Keterangan</label>
                              <textarea class="form-control" name="keterangan" cols="30" rows="5"></textarea>
                          </div>
                          <div class="form-group">
                              <button type="submit" class="btn btn-info">Simpan</button>
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>


        <script
            src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
            integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
            crossorigin="">
        </script>

        <script>
          //mengambil elemen lokasi dan memasukannya ke dalam variabel lokasi
          var lokasi = document.getElementById("latlong");
          
          function getlokasi() {
              //jika browser mendukung navigator.geolocation maka akan menjalankan perintah di bawahnya
              if (navigator.geolocation) {
                  // getCurrentPosition digunakan untuk mendapatkan lokasi pengguna
                  //showPosition adalah fungsi yang akan dijalankan
                  navigator.geolocation.getCurrentPosition(showPosition);    
              }
          }
          
          function showPosition(posisi){
              // tampilkan kordinat di dalam elemen lokasi

              var latlong = posisi.coords.latitude +", " + posisi.coords.longitude;
              lokasi.value = latlong;
          }
        
        </script>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        <script>

        var mymap = L.map("mapid").setView(
                  [-7.8711798,111.4880463],
                  13
                );
        
                //setting maps menggunakan api mapbox bukan google maps, daftar dan dapatkan token
                L.tileLayer(
                  "https://tile.openstreetmap.org/{z}/{x}/{y}.png",
                  {
                    maxZoom: 18,
                    attribution:
                      'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                      '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                      'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                    id: "mapbox/streets-v11",
                    tileSize: 512,
                    zoomOffset: -1,
                  }
                ).addTo(mymap);
                
                <?php
        
                  $mysqli = mysqli_connect('localhost', 'root', '', 'db_saveloc');   //koneksi ke database
                  $tampil = mysqli_query($mysqli, "select * from lokasi"); //ambil data dari tabel lokasi
                  while($hasil = mysqli_fetch_array($tampil)){ ?> //melooping data menggunakan while

                  //menggunakan fungsi L.marker(lat, long) untuk menampilkan latitude dan longitude
                  //menggunakan fungsi str_replace() untuk menghilankan karakter yang tidak dibutuhkan
                  L.marker([<?php echo $hasil['latlong'] ?>]).addTo(mymap)

                          //data ditampilkan di dalam bindPopup( data ) dan dapat dikustomisasi dengan html
                          .bindPopup(`<?php echo 'nama tempat:'.$hasil['nama'].'|kategori:'.$hasil['kategori'].'|keteragan:'.$hasil['keterangan']; ?>`)


                <?php } ?>

                //menambahkan marker letak posisi dengan lat dan lng yang telah didapat sebelumnya
                // L.marker(
                //   [-7.8711798,111.4880463]
                //   )
                //   .addTo(mymap)
                //   .bindPopup("<b>Hai!</b><br />Ini adalah lokasi mu");
        </script>
    </body>
</html>