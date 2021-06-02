<?php
session_start();
if ($_SESSION['status'] != "login") {
    header("location:../index.php?pesan=belum_login");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <!-- Twitter meta-->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@pratikborsadiya">
    <meta property="twitter:creator" content="@pratikborsadiya">
    <!-- Open Graph Meta-->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Vali Admin">
    <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
    <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
    <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
    <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <title>SPPK</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="asset/jquery/jquery-3.3.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#perusahaan').change(function() {
                var perusahaan_id = $(this).val();
                $.ajax({
                    type: 'POST',
                    url: 'data-pekerja.php?jenis=perusahaan',
                    data: 'per_id=' + perusahaan_id,
                    success: function(response) {
                        $('#bidang').html(response);
                    }
                });
            })

            $('#bidang').change(function() {
                var bidang_id = $(this).val();
                $.ajax({
                    type: 'POST',
                    url: 'data-pekerja.php?jenis=bidang',
                    data: 'bid_id=' + bidang_id,
                    success: function(response) {
                        $('#pekerja').html(response);
                    }
                });
            })
        });
    </script>

</head>

<body class="app sidebar-mini">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="index.php">SPPK</a>
        <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
        <!-- Navbar Right Menu-->
        <ul class="app-nav">
            <li class="app-search">
                <input class="app-search__input" type="search" placeholder="Search">
                <button class="app-search__button"><i class="fa fa-search"></i></button>
            </li>
            <!--Notification Menu-->

            <!-- User Menu-->
            <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
                <ul class="dropdown-menu settings-menu dropdown-menu-right">
                    <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-cog fa-lg"></i> Settings</a></li>
                    <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-user fa-lg"></i> Profile</a></li>
                    <li><a class="dropdown-item" href="proses/login.php?aksi=logout"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
                </ul>
            </li>
        </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
        <div class="app-sidebar__user"><img src="" alt="">
            <div>
                <p class="app-sidebar__user-name">Sistem Penilaian</p>
                <p class="app-sidebar__user-designation">Administrator</p>
            </div>
        </div>
        <ul class="app-menu">
            <li><a class="app-menu__item" href="dashboard.php"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
            <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Data Master</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                <ul class="treeview-menu">
                    <li><a class="treeview-item" href="home.php?page=perusahaan"><i class="icon fa fa-circle-o"></i> Perusahaan </a></li>
                    <li><a class="treeview-item" href="home.php?page=bidang"><i class="icon fa fa-circle-o"></i> Bidang </a></li>
                    <li><a class="treeview-item" href="home.php?page=jenis"><i class="icon fa fa-circle-o"></i> Jenis </a></li>
                    <li><a class="treeview-item" href="home.php?page=pekerja"><i class="icon fa fa-circle-o"></i> Pekerja </a></li>
                    <li><a class="treeview-item" href="home.php?page=pertanyaan"><i class="icon fa fa-circle-o"></i> Pertanyaan </a></li>

                </ul>
            </li>
            <li><a class="app-menu__item" href="home.php?page=penilaian&pertanyaan=101"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Penilaian Resiko</span></a></li>
        </ul>
    </aside>
    <main class="app-content">

        <div class="row">
            <div class="col-md-12">
                <div class="landing-hero-content">
                    <h1>Sistem Penilaian Resiko</h1>
                    <h1>Posture Kerja Menggunakan</h1>
                    <h1> Metode Plibel Check</h1>
                    <div>
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#tambahModal">Lakukan Penilaian</button>
                    </div>
                </div>

                <br><br><br><br><br>
            </div>
        </div>
    </main>

    <!-- Modal Insert -->
    <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="home.php?page=question&pertanyaan=1" method="POST" class="form-horizontal">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Form Pekerja</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="control-label col-sm-3">Perusahaan</label>
                            <div class="col-sm-9">
                                <?php
                                include "koneksi.php";
                                $query = mysqli_query($koneksi, "SELECT * FROM perusahaan ORDER BY nama ASC");
                                ?>
                                <select class="form-control" name="perusahaan" id="perusahaan">
                                    <option>Pilih Perusahaan</option>
                                    <?php
                                    while ($data = mysqli_fetch_assoc($query)) {
                                        echo '<option value="' . $data['id'] . '">' . $data['nama'] . '</option>';
                                    }
                                    ?>
                                </select>
                                <img src="asset/img/loading.gif" width="35" id="load1" style="display:none;" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-3">Bidang</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="bidang" id="bidang">
                                    <option></option>
                                </select>
                                <img src="asset/img/loading.gif" width="35" id="load2" style="display:none;" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-3">Pekerja</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="pekerja" id="pekerja">
                                    <option></option>
                                </select>
                                <img src="asset/img/loading.gif" width="35" id="load3" style="display:none;" />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-info" value="Next"></input>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal Insert Close-->



    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <!-- Google analytics script-->
    <script type="text/javascript">
        if (document.location.hostname == 'pratikborsadiya.in') {
            (function(i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function() {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                    m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
            ga('create', 'UA-72504830-1', 'auto');
            ga('send', 'pageview');
        }
    </script>
</body>

</html>