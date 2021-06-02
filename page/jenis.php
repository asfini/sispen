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
                                <th>Nama Jenis</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>
                        <?php
                        require_once "koneksi.php";
                        $query = mysqli_query($koneksi, "SELECT * FROM jenis_tubuh");
                        foreach ($query as $data) {
                        ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $data['id'] ?></td>
                                    <td><?php echo $data['jenis'] ?></td>
                                    <td>
                                        <a href="#" class="btn btn-primary btn-flat btn-xs" data-toggle="modal" data-target="#updatejenis<?php echo $data['id']; ?>"><i class="fa fa-pencil"></i> Edit</a>
                                        <a href="#" class="btn btn-danger btn-flat btn-xs" data-toggle="modal" data-target="#deletejenis<?php echo $data['id']; ?>"><i class="fa fa-trash"></i> Delete</a>

                                        <!-- modal delete -->
                                        <div class="example-modal">
                                            <div id="deletejenis<?php echo $data['id']; ?>" class="modal fade" role="dialog" style="display:none;">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
                                                            <h3 class="modal-title">Konfirmasi Delete Data Jenis</h3>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h4 align="center">Apakah yakin ingin menghapus jenis <?php echo $data['id']; ?><strong><span class="grt"></span></strong> ?</h4>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button id="nodelete" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancle</button>
                                                            <a href="proses/jenis.php?act=hapus&id=<?php echo $data['id']; ?>" class="btn btn-primary">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- modal delete -->

                                        <!-- modal update user -->
                                        <div class="example-modal">
                                            <div id="updatejenis<?php echo $data['id']; ?>" class="modal fade" role="dialog" style="display:none;">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
                                                            <h3 class="modal-title">Edit Data User</h3>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="proses/jenis.php?act=update" method="post" role="form">
                                                                <?php
                                                                $id = $data['id'];
                                                                $query = mysqli_query($koneksi, "SELECT * FROM jenis_tubuh WHERE id='$id'");
                                                                foreach ($query as $data) {
                                                                ?>
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <label class="col-sm-3 control-label text-right">ID <span class="text-red">*</span></label>
                                                                            <div class="col-sm-8"><input type="text" class="form-control" readonly name="id" value="<?php echo $data['id']; ?>"></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <label class="col-sm-3 control-label text-right">Jenis Tubuh <span class="text-red">*</span></label>
                                                                            <div class="col-sm-8"><input type="text" class="form-control" name="jenis" placeholder="jenis" value="<?php echo $data['jenis']; ?>"></div>
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
                                        </div><!-- modal update  -->
                                    </td>
                                </tr>
                            </tbody>


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
            <form action="proses/jenis.php?act=tambah" method="POST" class="form-horizontal">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Data Jenis Tubuh</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"></span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php
                    include_once 'koneksi.php';
                    $query = mysqli_query($koneksi, "SELECT MAX(id) as idTerbesar FROM jenis_tubuh");
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
                        <label class="control-label col-md-3">Jenis Tubuh</label>
                        <div class="col-md-8">
                            <input class="form-control" name="jenis" type="text">
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