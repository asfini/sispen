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
      <li><a class="app-menu__item" href="home.php?page=question&pertanyaan=1"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Question</span></a></li>
    </ul>
  </aside>
  <main class="app-content">
    <div class="app-title">

      <ul class="app-breadcrumb breadcrumb right">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">Blank Page</a></li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <div>
            <?php
            if (isset($_GET['page'])) {
              $page  = $_GET['page'];
              switch ($page) {
                case 'user':
                  include "page/user.php";
                  break;
                case 'perusahaan':
                  include "page/perusahaan.php";
                  break;
                case 'bidang':
                  include "page/bidang.php";
                  break;
                case 'jenis':
                  include "page/jenis.php";
                  break;
                case 'pekerja':
                  include "page/pekerja.php";
                  break;
                case 'bidang':
                  include "page/bidang.php";
                  break;
                case 'pertanyaan':
                  include "page/pertanyaan.php";
                  break;
                case 'penilaian':
                  include "page/penilaian.php";
                  break;
                case 'question':
                  include "page/question.php";
                  break;
              }
            }
            ?>
          </div>

        </div>
      </div>
    </div>
  </main>
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