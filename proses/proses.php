<?php

require "../koneksi.php";

//cara cepat tanpa harus pakai $_POST dalam mengambil var di pos

foreach ($_POST as $key => $value) {
    $$key = $value;
}

//print $nextra . " ";

//session_sta
//$_COOKIE['JAWABAN'][$nosoal] = $pilihan;
session_start();
$_SESSION['JAWABAN'][$nosoal] = $pilihan;

print_r($_SESSION);
//exit;

//ambil nama dari var button yng mana yang di submit

if (!empty($nextra)) {
    header("location:http://localhost/sispen/" . $nextra);
}

if (!empty($lastpage)) {
    header("location:http://localhost/sispen/" . $lastpage);
}

if (!empty($prevla)) {
    header("location:http://localhost/sispen/" . $prevla);
}

if (!empty($lastpage)) {
    header("location:http://localhost/sispen/" . $lastpage);
}
