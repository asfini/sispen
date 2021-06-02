<?php
include '../koneksi.php';

if ($_GET['act'] == 'tambah') {
    $id = $_POST['id'];
    $jenis = $_POST['jenis'];
    //query
    $query =  mysqli_query($koneksi, "INSERT INTO jenis_tubuh VALUES 
    ('$id','$jenis')");

    if ($query) {
        # code redicet setelah insert ke jenis
        header("location:../home.php?page=jenis");
    } else {
        echo "ERROR, tidak berhasil" . mysqli_error($koneksi);
    }
}
if ($_GET['act'] == 'hapus') {
    $id = $_GET['id'];
    //query
    $query =  mysqli_query($koneksi, "DELETE FROM jenis_tubuh WHERE id='$id'");

    if ($query) {
        # code redicet setelah insert ke jenis
        header("location:../home.php?page=jenis");
    } else {
        echo "ERROR, tidak berhasil" . mysqli_error($koneksi);
    }
}
if ($_GET['act'] == 'update') {
    $id = $_POST['id'];
    $jenis = $_POST['jenis'];

    //query
    $query =  mysqli_query($koneksi, "UPDATE jenis_tubuh SET jenis = '$jenis' WHERE id='$id'");

    if ($query) {
        # code redicet setelah insert ke jenis
        header("location:../home.php?page=jenis");
    } else {
        echo "ERROR, tidak berhasil" . mysqli_error($koneksi);
    }
}
