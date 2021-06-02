<?php
include '../koneksi.php';
//error_reporting(0);
if ($_GET['act'] == 'tambah') {
    $id_pertanyaan = $_POST['id'];
    $pertanyaan = $_POST['pertanyaan'];
    $filename = $_FILES['gambar']['name'];
    $jenis_tubuh = $_POST['jenis_tubuh'];
    $jumlah_dipilih = count((array)$jenis_tubuh);
    //print_r($jumlah_dipilih);
    move_uploaded_file($_FILES['gambar']['tmp_name'], 'images/' . $filename);

    //query
    $query = mysqli_query($koneksi, "INSERT INTO pertanyaan VALUES('$id_pertanyaan','$pertanyaan','$filename')");

    if (isset($query)) {
        foreach ($jenis_tubuh as $key => $value) {
            mysqli_query($koneksi, "INSERT INTO jenis_tubuh_pertanyaan VALUES(null,'$id_pertanyaan','$value')");
            header("location:../home.php?page=pertanyaan");
        }
    } else {
        echo "ERROR, tidak berhasil" . mysqli_error($koneksi);
    }
}
if ($_GET['act'] == 'hapus') {
    $id = $_GET['id'];
    //query
    $query =  mysqli_query($koneksi, "DELETE FROM pertanyaan WHERE id='$id'");

    if ($query) {
        # code redicet setelah insert ke bidang
        header("location:../home.php?page=pertanyaan");
    } else {
        echo "ERROR, tidak berhasil" . mysqli_error($koneksi);
    }
}
if ($_GET['act'] == 'update') {
    $id_pertanyaan = $_POST['id'];
    $pertanyaan = $_POST['pertanyaan'];
    $filename = $_FILES['gambar']['name'];
    $jenis_tubuh = $_POST['jenis_tubuh'];
    $jumlah_dipilih = count((array)$jenis_tubuh);

    //query
    $query =  mysqli_query($koneksi, "UPDATE bidang SET nama = '$nama', perusahaan_id = '$perusahaan_id' WHERE id='$id'");

    if ($query) {
        # code redicet setelah insert ke bidang
        header("location:../home.php?page=bidang");
    } else {
        echo "ERROR, tidak berhasil" . mysqli_error($koneksi);
    }
}
