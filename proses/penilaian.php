<?php
include '../koneksi.php';

if ($_GET['act'] == 'tambah') {
    $pekerja_id = $_POST['id'];
    $nama = $_POST['nama'];
    $perusahaan_id = $_POST['perusahaan_id'];
    //query
    $query =  mysqli_query($koneksi, "INSERT INTO bidang VALUES ('$id','$nama','$perusahaan_id')");

    if ($query) {
        # code redicet setelah insert ke bidang
        header("location:../home.php?page=bidang");
    } else {
        echo "ERROR, tidak berhasil" . mysqli_error($koneksi);
    }
}
