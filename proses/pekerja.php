<?php
include '../koneksi.php';

if ($_GET['act'] == 'tambah') {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $bidang = $_POST['bidang'];
    //query
    $query =  mysqli_query($koneksi, "INSERT INTO pekerja VALUES ('$id','$nama','$bidang')");

    if ($query) {
        # code redicet setelah insert ke pekerja
        header("location:../home.php?page=pekerja");
    } else {
        echo "ERROR, tidak berhasil" . mysqli_error($koneksi);
    }
}
if ($_GET['act'] == 'hapus') {
    $id = $_GET['id'];
    //query
    $query =  mysqli_query($koneksi, "DELETE FROM pekerja WHERE id='$id'");

    if ($query) {
        # code redicet setelah insert ke pekerja
        header("location:../home.php?page=pekerja");
    } else {
        echo "ERROR, tidak berhasil" . mysqli_error($koneksi);
    }
}
if ($_GET['act'] == 'update') {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $bidang = $_POST['bidang'];

    //query
    $query =  mysqli_query($koneksi, "UPDATE pekerja SET nama = '$nama', bidang_id = '$bidang' WHERE id='$id'");

    if ($query) {
        # code redicet setelah insert ke pekerja
        header("location:../home.php?page=pekerja");
    } else {
        echo "ERROR, tidak berhasil" . mysqli_error($koneksi);
    }
}
