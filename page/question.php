<div class="col-md-12">
    <div class="tile">

        <?php
        include_once "koneksi.php";
        if (isset($_POST["pekerja"])) {
            $_SESSION['pekerja'] = $_POST['pekerja'];
            $id = $_SESSION['pekerja'];
            // $sql = mysqli_query($koneksi, "SELECT nama FROM pekerja where id = $id");
            // while ($row = mysqli_fetch_array($sql));
        }

        $id = $_GET['pertanyaan'];
        $query = mysqli_query($koneksi, "SELECT a.id,a.pertanyaan, b.jenis_tubuh_id,c.jenis as jenis
            FROM pertanyaan as a, jenis_tubuh_pertanyaan as b, jenis_tubuh as c
            WHERE a.id = b.pertanyaan_id AND b.jenis_tubuh_id = c.id
            AND a.id = 100+'$id' ORDER BY a.id ASC");
        if ($data = mysqli_fetch_array($query)) {
            if ($data['jenis'] == "Lingkungan") {
        ?>

                <h2 class="mb-3 line-head card mb-3 text-white bg-info">Faktor Risiko Lingkungan Kerja/Perusahaan
                    | <?php echo $_SESSION['pekerja'] ?> </h2>
            <?php
            } else if ($data['jenis'] == "Tubuh bagian atas" || "Tubuh bagian tengah" || "Tubuh bagian bawah") {
            ?>
                <div>
                    <h2 class="mb-3 line-head card-header">Faktor Resiko Cedera Otot | <?php echo $_SESSION['pekerja']; ?></h2>
                </div>

        <?php

            }
        }
        ?>
        <div class="tile-body">
            <form action="proses/proses.php" method="POST">
                <div class="col-md-3">
                    <input class="form-control" type="hidden" disabled name="pekerja" value="<?php echo $_SESSION['pekerja']  ?>">
                </div>

                <div class="bs-component" style="margin-bottom: 15px;">
                    <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">

                        <?php
                        //no error display
                        error_reporting(0);

                        include_once "koneksi.php";

                        // Cek apakah terdapat data page pada URL
                        $pertanyaan = (isset($_GET['pertanyaan'])) ? $_GET['pertanyaan'] : 1;

                        $limit = 1; // Jumlah data per halamannya

                        // Untuk menentukan dari data ke berapa yang akan ditampilkan pada tabel yang ada di database
                        $limit_start = ($pertanyaan - 1) * $limit;

                        $query = mysqli_query($koneksi, "SELECT * FROM pertanyaan LIMIT " . $limit_start . "," . $limit);

                        $no = $limit_start + 1; // Untuk penomoran tabel

                        //print_r($_SESSION);

                        while ($data = mysqli_fetch_array($query)) { // Ambil semua data dari hasil eksekusi $sql
                        ?>
                            <table>
                                <tr>
                                    <td><?php echo $no . " . " ?></td>
                                    <input type="hidden" name="nosoal" id="nosoal" value="<?php echo $data['id']; ?>">
                                    <td><?php echo $data['pertanyaan']  ?></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="pilihan" id="inlineRadio1" value="yes" <?php echo ($_SESSION['JAWABAN'][$data['id']] == "yes") ? "checked=\"checked\"" : ""; ?>>
                                            <label class="form-check-label" for="inlineRadio1"><img src="images/yes.png" alt="" width="200" height="200"></label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="pilihan" id="inlineRadio2" value="no" <?php echo ($_SESSION['JAWABAN'][$data['id']] == "no") ? "checked=\"checked\"" : ""; ?>>
                                            <label class="form-check-label" for="inlineRadio2"><img src="images/no.png" alt="" width="200" height="200"></label>
                                        </div>
                                    </td>
                                </tr>

                            </table>
                        <?php
                            $no++; // Tambah 1 setiap kali looping
                        }
                        ?>

                    </div>
                </div>
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
                            <li>
                                <button name="lastpage" value="home.php?page=question&pertanyaan=1" class="btn btn-outline-primary page-proses">First</button>
                            </li>
                            <li>

                                <button name="prevla" value="home.php?page=question&pertanyaan=<?php echo $link_prev; ?>" class="btn btn-outline-primary page-proses">&laquo;</button>
                            </li>


                            <!-- <li><button type="submit" name="prev" value="home.php?page=question&pertanyaan=<?php echo $link_prev; ?>" class="btn btn-outline-primary">&laquo;</button></li> -->
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
                            <li>
                                <button name="nextra" value="home.php?page=question&pertanyaan=<?php echo $link_next; ?>" type="submit" class="btn btn-outline-primary page-proses">&raquo;</button>
                            </li>

                            <li>
                                <button name="lastpage" value="home.php?page=question&pertanyaan=<?php echo $jumlah_page; ?>" class="btn btn-outline-primary page-proses">Last</button>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                </nav>
            </form>
        </div>
    </div>

</div>

<script>
    /*jQuery(document).ready(function($) {
        $('.page-proses').on('click', function(event) {
            alert("test");
            event.preventDefault(); //biar tag href tidak akses url dia baca via function dulu;

        });

        console.log("disiniaja");
    })*/

    /*function createItem() {
        event.preventDefault(); //biar tag href tidak akses url dia baca via function dulu;
        var test = $("input[name='pilihan']:checked").val();;
        console.log(test); //debug js untuk print nya di inspect element

        //proses penyimpanan ke data sess or cookie
        localStorage.setItem('scoreLastScore[<?php echo $no; ?>]', test);
        //end proses penyimpanan ke data sess or cookie

        var a = localStorage.getItem('scoreLastScore[<?php echo $no; ?>]'); //memanggil data yang disimpan tadi
        console.log(a);

        //alert(test);
        //redirect nex or prev page

        var halaman = $(this).attr("href");
        console.log(halaman);
        window.location.href(halaman);
    }*/

    function setchecked() {

        /*var a = localStorage.getItem('scoreLastScore[<?php echo $no; ?>]'); //memanggil data yang disimpan tadi
        console.log(a);

        if (a != "" || a != "undefined") {
            var $radios = $('input:radio[name=pilihan]');
            $radios.filter('[value=' + a + ']').prop('checked', true);
        }*/
    }

    //setchecked();
</script>