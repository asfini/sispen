<!-- Button modal tambah -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahModal">
    Insert Data
</button>

<br><br>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead align="center">
                            <tr>
                                <th>ID</th>
                                <th>Pertanyaan</th>
                                <th>Faktor Resiko</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>
                        <?php
                        require_once "koneksi.php";
                        $query = mysqli_query($koneksi, "SELECT a.id, a.pertanyaan, a.gambar, b.pertanyaan_id,
                        b.pertanyaan_id, b.jenis_tubuh_id, 
                        c.id, c.jenis As jenis, (SELECT COUNT(pertanyaan_id) FROM jenis_tubuh_pertanyaan WHERE pertanyaan_id=a.id) AS jumlah
                        FROM pertanyaan as a, jenis_tubuh_pertanyaan as b, jenis_tubuh as c 
                        WHERE a.id = b.pertanyaan_id
                        AND b.jenis_tubuh_id = c.id
                        ORDER BY a.id ASC");
                        $no = 1;
                        $nox = 1;
                        $jum = 1;
                        $jumx = 1;
                        foreach ($query as $data) {
                        ?>

                            <tr>
                                <?php if ($jum <= 1) { ?>
                                    <td align="center" rowspan="<?php echo $data['jumlah'] ?>"> <?php echo $no; ?> </td>

                                    <td rowspan="<?php echo $data['jumlah'] ?>"> <?php echo $data['pertanyaan']; ?> </td>
                                <?php
                                    $jum = $data['jumlah'];
                                    $no++;
                                } else {
                                    $jum = $jum - 1;
                                } ?>
                                <td>
                                    <ul>
                                        <li><?php echo $data['jenis'] ?></li>
                                    </ul>
                                </td>
                                <?php if ($jumx <= 1) { ?>
                                    <td rowspan="<?php echo $data['jumlah'] ?>">
                                        <a href="#" class="btn btn-primary btn-flat btn-xs" data-toggle="modal" data-target="#updatepertanyaan<?php echo $data['id']; ?>"><i class="fa fa-pencil"></i></a>
                                        <a href="#" class="btn btn-danger btn-flat btn-xs" data-toggle="modal" data-target="#deletepertanyaan<?php echo $data['id']; ?>"><i class="fa fa-trash"></i></a>

                                        <!-- modal delete -->
                                        <div class="example-modal">
                                            <div id="deletepertanyaan<?php echo $data['id']; ?>" class="modal fade" role="dialog" style="display:none;">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
                                                            <h3 class="modal-title">Konfirmasi Delete Data Pertanyaan</h3>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h4 align="center">Apakah yakin ingin menghapus pertanyaan <?php echo $data['id']; ?><strong><span class="grt"></span></strong> ?</h4>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button id="nodelete" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancle</button>
                                                            <a href="proses/pertanyaan.php?act=hapus&id=<?php echo $data['id']; ?>" class="btn btn-primary">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- modal delete -->

                                        <!-- modal update -->
                                        <div class="example-modal">
                                            <div id="updatepertanyaan<?php echo $data['id']; ?>" class="modal fade" role="dialog" style="display:none;">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
                                                            <h3 class="modal-title">Edit Data</h3>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="proses/pertanyaan.php?act=update" method="post" role="form">
                                                                <?php
                                                                $id = $data['id'];
                                                                $query = mysqli_query($koneksi, "SELECT * FROM pertanyaan WHERE id='$id'");
                                                                foreach ($query as $data) {
                                                                ?>
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <label class="col-sm-3 control-label text-right">ID <span class="text-red">*</span></label>
                                                                            <div class="col-sm-8"><input type="text" class="form-control" readonly name="id" value="<?php echo $data['id']; ?>"></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="control-label col-md-3">Pertanyaan</label>
                                                                        <div class="col-md-8">
                                                                            <textarea name="pertanyaan" cols="40" rows="4" class="form-control"><?php echo $data['pertanyaan'] ?></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button id="noedit" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                                                                        <input type="submit" name="submit" class="btn btn-primary" value="Update">
                                                                    </div>
                                                                <?php
                                                                }
                                                                ?>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- modal update-->
                                    </td>
                                <?php
                                    $jumx = $data['jumlah'];
                                    $nox++;
                                } else {
                                    $jumx = $jumx - 1;
                                } ?>
                            </tr>

                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Insert -->
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="proses/pertanyaan.php?act=tambah" method="POST" class="form-horizontal">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Data Perusahaan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"></span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php
                    include_once 'koneksi.php';
                    $query = mysqli_query($koneksi, "SELECT MAX(id) as idTerbesar FROM pertanyaan");
                    $data = mysqli_fetch_array($query);
                    $id = $data['idTerbesar'];
                    ?>

                    <div class="form-group row">
                        <label class="control-label col-md-3">ID</label>
                        <div class="col-md-8">
                            <input class="form-control" name="id" type="text" readonly value="<?php echo $id + 1; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3">Pertanyaan</label>
                        <div class="col-md-8">
                            <textarea name="pertanyaan" class="form-control" cols="40" rows="4"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3">Faktor Resiko</label>
                        <div class="col-md-8">
                            <?php
                            require_once "koneksi.php";
                            $query = mysqli_query($koneksi, "SELECT * FROM jenis_tubuh");
                            foreach ($query as $data) {
                            ?>
                                <input class="form-check-input" name="jenis_tubuh[<?php echo $data['id'] ?>]" type="checkbox" value="<?php echo $data['id'] ?>"> <?php echo $data['jenis'] ?>
                                <br>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3">Gambar</label>
                        <div class="col-md-8">
                            <input class="form-control" name="gambar" type="file" id="exampleInputFile" onchange="readURL2(this);">
                            <br>
                            <img id="previewgambar" src="" class="profile-user-img img-fluid img-circle" alt="">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" name="btnsimpan" value="Simpan" class="btn btn-primary">
                </div>

            </form>
        </div>
    </div>
</div>
<!-- Modal Insert Close-->


<script type="text/javascript">
    function readURL2(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#previewgambar')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>