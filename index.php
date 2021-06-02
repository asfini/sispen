<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Main CSS-->
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <!-- Font-icon css-->
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    body {
      background-image: url('images/background.jpg');
      background-repeat: no-repeat;
      background-size: cover;
    }
  </style>
  <title>Login - SisPen</title>
</head>

<body class="landing-page">
  <header class="app-header"><a class="app-header__logo" href="index.html">SPPK</a>

    <!-- Navbar Right Menu-->
    <ul class="app-nav">

      <!-- User Menu-->
      <li class="dropdown"><a class="app-nav__item dropdown-item" href="login.php" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i> Login </a>
      </li>
    </ul>
  </header>

  <div class="landing-hero-content">
    <h1>Sistem Penilaian Resiko</h1>
    <h1>Posture Kerja Menggunakan</h1>
    <h1> Metode Plibel Check</h1>
    <div>
      <a class="btn btn-info" href="">Lakukan Penilaian</a>
    </div>
  </div>

  <br><br><br><br><br>


  <!-- Essential javascripts for application to work-->
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
  <!-- The javascript plugin to display page loading on top-->
  <script src="js/plugins/pace.min.js"></script>
  <script type="text/javascript">
    // Login Page Flipbox control
    $('.login-content [data-toggle="flip"]').click(function() {
      $('.login-box').toggleClass('flipped');
      return false;
    });
  </script>
</body>

</html>