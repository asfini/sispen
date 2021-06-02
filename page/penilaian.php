<div class="col-md-12">
    <div class="tile">

        <?php
        include_once "koneksi.php";
        //$pekerja =  $_POST['pekerja'];

        $id = $_GET['pertanyaan'];
        $query = mysqli_query($koneksi, "SELECT a.id,a.pertanyaan, b.jenis_tubuh_id,c.jenis as jenis
            FROM pertanyaan as a, jenis_tubuh_pertanyaan as b, jenis_tubuh as c
            WHERE a.id = b.pertanyaan_id AND b.jenis_tubuh_id = c.id
            AND a.id = '$id' ORDER BY a.id ASC");
        if ($data = mysqli_fetch_array($query)) {
            if ($data['jenis'] == "Lingkungan") {
        ?>

                <h2 class="mb-3 line-head">Faktor Risiko Lingkungan Kerja/Perusahaan</h2>
            <?php
            } else if ($data['jenis'] == "Tubuh bagian atas" || "Tubuh bagian tengah" || "Tubuh bagian bawah") {
            ?>
                <h2 class="mb-3 line-head">Faktor Resiko Cedera Otot</h2>
        <?php
            }
        }
        ?>
        <div class="tile-body">
            <div class="bs-component" style="margin-bottom: 15px;">
                <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">


                    <form action="" method="POST">

                        <!-- <?php
                                $_SESSION['pkrj'] = $pekerja;
                                ?>
                        <input type="text" name="pekerja" value="<?php echo $_SESSION['pkrj']  ?>"> -->

                        <?php
                        include_once "koneksi.php";

                        $id = $_GET['pertanyaan'];
                        $query = mysqli_query($koneksi, "SELECT * FROM pertanyaan WHERE id='$id'");

                        if ($_GET['pertanyaan'] == $id) {
                            foreach ($query as $data) {
                        ?>
                                <table>
                                    <tr>
                                        <td><?php echo $id - 100 . " . " ?></td>
                                        <td><?php echo $data['pertanyaan']  ?></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <?php $pertanyaan = $_GET['pertanyaan'] ?>
                                        <td><a href="?page=penilaian&pertanyaan=<?php echo $pertanyaan + 1 ?>"><img src="images/yes.png" alt="" width="200" height="200"></a>
                                            <a href="?page=penilaian&pertanyaan=<?php echo $pertanyaan + 1 ?>"><img src="images/no.png" alt="" width="200" height="200"></a>
                                        </td>
                                    </tr>
                                </table>


                        <?php
                            }
                        }
                        ?>
                    </form>

                </div>
            </div>
            </form>
        </div>
    </div>
    <?php
    $no = 0;
    for ($i = 101; $i <= 146; $i++) {
        $no++
    ?>

        <a href="?page=penilaian&pertanyaan=<?php echo $i; ?>" class="btn btn-primary"><?php echo $no; ?></a>

    <?php } ?>
</div>