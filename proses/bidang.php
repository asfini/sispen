<?php
include '../koneksi.php';

if ($_GET['act'] == 'tambah') {
    $id = $_POST['id'];
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
if ($_GET['act'] == 'hapus') {
    $id = $_GET['id'];
    //query
    $query =  mysqli_query($koneksi, "DELETE FROM bidang WHERE id='$id'");

    if ($query) {
        # code redicet setelah insert ke bidang
        header("location:../home.php?page=bidang");
    } else {
        echo "ERROR, tidak berhasil" . mysqli_error($koneksi);
    }
}
if ($_GET['act'] == 'update') {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $perusahaan_id = $_POST['perusahaan_id'];

    //query
    $query =  mysqli_query($koneksi, "UPDATE bidang SET nama = '$nama', perusahaan_id = '$perusahaan_id' WHERE id='$id'");

    if ($query) {
        # code redicet setelah insert ke bidang
        header("location:../home.php?page=bidang");
    } else {
        echo "ERROR, tidak berhasil" . mysqli_error($koneksi);
    }
}
