<?php
if (isset($_GET['aksi'])) {
    $aksi  = $_GET['aksi'];
    switch ($aksi) {
        case 'simpan':
            include "../koneksi.php";

            $id_pertanyaan = $_POST['id'];
            $pertanyaan = $_POST['pertanyaan'];
            $filename = $_FILES['gambar']['name'];
            $jenis_tubuh = $_POST['jenis_tubuh'];
            $jumlah_dipilih = count((array)$jenis_tubuh);
            //print_r($jumlah_dipilih);
            move_uploaded_file($_FILES['gambar']['tmp_name'], '../images/' . $filename);

            $query = mysqli_query($koneksi, "INSERT INTO pertanyaan VALUES('$id_pertanyaan','$pertanyaan','$filename')");

            if (isset($query)) {
                // for ($x = 0; $x < $jumlah_dipilih; $x++) {
                foreach ($jenis_tubuh as $key => $value) {
                    mysqli_query($koneksi, "INSERT INTO jenis_tubuh_pertanyaan VALUES(null,'$id_pertanyaan','$value')");
                }
            }
            header("location:../home.php?page=pertanyaan");
    }
}
