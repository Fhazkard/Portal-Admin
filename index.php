<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta, title, favicons -->
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Portal Login</title>

  <!-- CSS -->
  <link href="content/css/bootstrap.min.css" rel="stylesheet">
  <link href="content/css/font-awesome.min.css" rel="stylesheet">
  <link href="content/css/animate.min.css" rel="stylesheet">
  <!-- Custom styling plus plugins -->
  <link href="content/css/custom.css" rel="stylesheet">  
  <script src="content/js/jquery.min.js"></script>
  
</head>

<body style="background:#F7F7F7;">

    <div id="wrapper">
      <div id="login" class="animated bounceInDown form">
        <section class="login_content">
            <form method="POST" action="koneksi/cek.php">
            <h1>Login Form</h1>
            <div>
            <strong>Username</strong>
            <input id="username" name="username" type="text" class="form-control" placeholder="Username" autofocus required maxlength="16" minlength="6"/>
            </div>
            <div>
            <strong>Password</strong>
            <input id="password" name="password" type="password" class="form-control" placeholder="Password" required maxlength="8" minlength="6" />
            </div>
            <?php require 'koneksi/csrf.php';session_start();CSRF::init();print CSRF::tokenInput(); ?>
            <div>
               <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
            </div>
            <br />
            <div class="clearfix"></div>
            <div class="separator">
            <div class="clearfix"></div>
            <br />
            <div>
                <h1 class="animated rubberBand"><i class="fa fa-paw" style="font-size: 26px;"></i> Bimbel Wisdom Batam</h1>
                <p>©2016 Created By <a href="https://Fhazkard.com"><strong>Fhazkard</strong></a></p>
            </div>
            </div>
          </form>
          <!-- form -->
        </section>
        <!-- content -->
      </div>
    </div>
</body>
</html>
