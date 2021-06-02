<div class="col-md-12">
    <div class="tile">

        <?php
        include_once "koneksi.php";
        //$pekerja =  $_POST['pekerja'];

        $id = $_GET['pertanyaan'];
        $query = mysqli_query($koneksi, "SELECT a.id,a.pertanyaan, b.jenis_tubuh_id,c.jenis as jenis
            FROM pertanyaan as a, jenis_tubuh_pertanyaan as b, jenis_tubuh as c
            WHERE a.id = b.pertanyaan_id AND b.jenis_tubuh_id = c.id
            AND a.id = 100+'$id' ORDER BY a.id ASC");
        if ($data = mysqli_fetch_array($query)) {
            if ($data['jenis'] == "Lingkungan") {
        ?>

                <h2 class="mb-3 line-head card mb-3 text-white bg-info">Faktor Risiko Lingkungan Kerja/Perusahaan</h2>
            <?php
            } else if ($data['jenis'] == "Tubuh bagian atas" || "Tubuh bagian tengah" || "Tubuh bagian bawah") {
            ?>
                <div>
                    <h2 class="mb-3 line-head card-header">Faktor Resiko Cedera Otot</h2>
                </div>

        <?php
            }
        }
        ?>
        <div class="tile-body">
            <div class="bs-component" style="margin-bottom: 15px;">
                <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">


                    <form action="" method="POST">
                        <?php
                        include_once "koneksi.php";

                        // Cek apakah terdapat data page pada URL
                        $pertanyaan = (isset($_GET['pertanyaan'])) ? $_GET['pertanyaan'] : 1;

                        $limit = 1; // Jumlah data per halamannya

                        // Untuk menentukan dari data ke berapa yang akan ditampilkan pada tabel yang ada di database
                        $limit_start = ($pertanyaan - 1) * $limit;

                        $query = mysqli_query($koneksi, "SELECT * FROM pertanyaan LIMIT " . $limit_start . "," . $limit);

                        $no = $limit_start + 1; // Untuk penomoran tabel
                        while ($data = mysqli_fetch_array($query)) { // Ambil semua data dari hasil eksekusi $sql
                        ?>
                            <table>
                                <tr>
                                    <td><?php echo $no . " . " ?></td>
                                    <td><?php echo $data['pertanyaan']  ?></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                            <label class="form-check-label" for="inlineRadio1"><img src="images/yes.png" alt="" width="200" height="200"></label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                            <label class="form-check-label" for="inlineRadio2"><img src="images/no.png" alt="" width="200" height="200"></label>
                                        </div>
                                    </td>
                                </tr>

                            </table>
                        <?php
                            $no++; // Tambah 1 setiap kali looping
                        }
                        ?>
                    </form>
                </div>
            </div>
            <center>
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <!-- LINK FIRST AND PREV -->
                        <?php
                        if ($pertanyaan == 1) { // Jika page adalah page ke 1, maka disable link PREV
                        ?>
                            <li class="disabled"><a href="#" class="btn btn-outline-primary">First</a></li>
                            <li class="disabled"><a href="#" class="btn btn-outline-primary">&laquo;</a></li>

                        <?php
                        } else { // Jika page bukan page ke 1
                            $link_prev = ($pertanyaan > 1) ? $pertanyaan - 1 : 1;
                        ?>
                            <li><a href="home.php?page=question&pertanyaan=1" class="btn btn-outline-primary">First</a></li>
                            <li><a href="home.php?page=question&pertanyaan=<?php echo $link_prev; ?>" class="btn btn-outline-primary">&laquo;</a></li>
                        <?php
                        }
                        ?>
                        <!-- LINK NUMBER -->
                        <?php
                        // Buat query untuk menghitung semua jumlah data
                        $sql2 = mysqli_query($koneksi, "SELECT COUNT(*) AS jumlah FROM pertanyaan");
                        $get_jumlah = mysqli_fetch_array($sql2);

                        $jumlah_page = ceil($get_jumlah['jumlah'] / $limit); // Hitung jumlah halamannya
                        $jumlah_number = 3; // Tentukan jumlah link number sebelum dan sesudah page yang aktif
                        $start_number = ($pertanyaan > $jumlah_number) ? $pertanyaan - $jumlah_number : 1; // Untuk awal link number
                        $end_number = ($pertanyaan < ($jumlah_page - $jumlah_number)) ? $pertanyaan + $jumlah_number : $jumlah_page; // Untuk akhir link number

                        ?>

                        <!-- LINK NEXT AND LAST -->
                        <?php
                        // Jika page sama dengan jumlah page, maka disable link NEXT nya
                        // Artinya page tersebut adalah page terakhir 
                        if ($pertanyaan == $jumlah_page) { // Jika page terakhir
                        ?>
                            <li class="disabled"><a href="#" class="btn btn-outline-primary">&raquo;</a></li>
                            <li class="disabled"><a href="#" class="btn btn-outline-primary">Last</a></li>
                        <?php
                        } else { // Jika Bukan page terakhir
                            $link_next = ($pertanyaan < $jumlah_page) ? $pertanyaan + 1 : $jumlah_page;
                        ?>
                            <li><a href="home.php?page=question&pertanyaan=<?php echo $link_next; ?>" class="btn btn-outline-primary">&raquo;</a></li>
                            <li><a href="home.php?page=question&pertanyaan=<?php echo $jumlah_page; ?>" class="btn btn-outline-primary">Last</a></li>
                        <?php
                        }
                        ?>
                    </ul>
                </nav>
            </center>
        </div>
    </div>

</div>