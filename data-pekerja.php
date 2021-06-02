<?php
require_once "koneksi.php";
switch ($_GET['jenis']) {
	case 'perusahaan':
		$per_id = $_POST['per_id'];
		$query = mysqli_query($koneksi, "SELECT * FROM bidang where perusahaan_id = '$per_id'");
		echo '<option> Pilih Bidang</option>';
		while ($data = mysqli_fetch_array($query)) {
			echo '<option value="' . $data['id'] . '"> ' . $data['nama'] . ' </option>';
		}
		break;
	case 'bidang':
		$bid_id = $_POST['bid_id'];
		$query = mysqli_query($koneksi, "SELECT * FROM pekerja where bidang_id = '$bid_id'");
		echo '<option> Pilih Pekerja</option>';
		while ($data = mysqli_fetch_array($query)) {
			echo '<option value="' . $data['id'] . '"> ' . $data['nama'] . ' </option>';
		}
		break;
}
