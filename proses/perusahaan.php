<?php
include '../koneksi.php';

if ($_GET['act'] == 'tambah') {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    //query
    $query =  mysqli_query($koneksi, "INSERT INTO perusahaan VALUES 
    ('$id','$nama')");

    if ($query) {
        # code redicet setelah insert ke perusahaan
        header("location:../home.php?page=perusahaan");
    } else {
        echo "ERROR, tidak berhasil" . mysqli_error($koneksi);
    }
}
if ($_GET['act'] == 'hapus') {
    $id = $_GET['id'];
    //query
    $query =  mysqli_query($koneksi, "DELETE FROM perusahaan WHERE id='$id'");

    if ($query) {
        # code redicet setelah insert ke perusahaan
        header("location:../home.php?page=perusahaan");
    } else {
        echo "ERROR, tidak berhasil" . mysqli_error($koneksi);
    }
}
if ($_GET['act'] == 'update') {
    $id = $_POST['id'];
    $nama = $_POST['nama'];

    //query
    $query =  mysqli_query($koneksi, "UPDATE perusahaan SET nama = '$nama' WHERE id='$id'");

    if ($query) {
        # code redicet setelah insert ke perusahaan
        header("location:../home.php?page=perusahaan");
    } else {
        echo "ERROR, tidak berhasil" . mysqli_error($koneksi);
    }
}
