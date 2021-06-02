<?php
// menghubungkan dengan koneksi
include '../koneksi.php';
if ($_GET['aksi'] == "login") {
    // mengaktifkan session php
    session_start();

    // menangkap data yang dikirim dari form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // menyeleksi data admin dengan username dan password yang sesuai
    $data = mysqli_query($koneksi, "select * from users where username='$username' and password='$password'");

    // menghitung jumlah data yang ditemukan
    $cek = mysqli_num_rows($data);

    if ($cek > 0) {
        $_SESSION['status'] = "login";
        header("location:../dashboard.php");
    }
}
if ($_GET['aksi'] == "logout") {
    // mengaktifkan session
    session_start();

    // menghapus semua session
    session_destroy();

    // mengalihkan halaman sambil mengirim pesan logout
    header("location:../index.php?pesan=logout");
}
