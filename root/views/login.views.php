
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Viens Dindin </title>

    <!-- Bootstrap -->
    <link href="assets/plugins/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="assets/plugins/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="assets/plugins/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="assets/css/custom.min.css" rel="stylesheet">
    <link href="assets/css/error.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <form method="post" action="login.php" name="loginForm" id="loginForm">
                        <h1>Connexion</h1>
                        <div>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Nom d'utilisateur"  />
                        </div>
                        <div>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Mot de passe"  />
                        </div>
                        <div>
                            <button class="btn btn-default submit" type="submit" name="connexion">Je me connecte</button>
                            <a class="reset_pass" href="#">Mot de passe oublié? veuillez contacter l'admin</a>
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">
                            <div class="clearfix"></div>
                            <br />

                            <div>
                            <h1><i class="fa fa-eye"></i> Viens Dindin</h1>
                            <p>©2019 All Rights Reserved. Viens Dindin</p>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
    <script src="assets/plugins/jquery/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
	<script src="assets/js/validation/login.js"></script>
  </body>
</html>
