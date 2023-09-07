<?php
    if (!isset($_POST['latlong'])) {
        header("Location: get_lokasi.php");
    }


    //koneksi
    $connect = mysqli_connect('localhost', 'root', '', 'db_saveloc');

    //set variabel
    $latlong       = $_POST['latlong'];
    $no_kontak       = $_POST['no_kontak'];
    $nama_tempat    = $_POST['nama'];
    $kategori       = $_POST['kategori'];
    $keterangan     = $_POST['keterangan'];


    //input data
    $insert = mysqli_query($connect, "insert into lokasi set latlong='$latlong', no_kontak='$no_kontak', nama='$nama_tempat', kategori='$kategori', keterangan='$keterangan' ");

    //kembali
    header("Location: index.php");

?>