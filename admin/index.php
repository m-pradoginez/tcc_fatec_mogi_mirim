<?php
include "../conexao.php";
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="pt">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login do Administrador</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">


    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



</head>

<body class="bg-dark">


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo" style="color: white;">
                    Login do Administrador
                </div>
                <div class="login-form">
                    <form name="entrae" method="post">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                        </div>
                            <div class="form-group">
                                <label>Senha</label>
                                <input type="password" class="form-control" name="senha" id="senha" placeholder="Senha" required>
                        </div>
                                <button type="submit" name="enviar_login_admin" class="btn btn-success btn-flat m-b-30 m-t-30">Entrar</button>
                                
                                <div class="alert alert-danger" id="msgerro" style="margin-top: 10px; display: none;">
                                    <strong>Inválido</strong> Email ou Senha incorreto.
                                </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>


</body>

</html>

<?php
    if (isset($_POST["enviar_login_admin"])) {
        $count=0;
        $email=mysqli_real_escape_string($con, $_POST['email']);
        $senha=mysqli_real_escape_string($con, $_POST["senha"]);

        $res=mysqli_query($con,"select * from admin_login where email='$email' && senha='$senha'");
        $count=mysqli_num_rows($res);

        if ($count == 0) {
            ?>
            <script type="text/javascript">
                document.getElementById("msgerro").style.display="block";
            </script>
            <?php
        }
        else {
            ?>
            <script type="text/javascript">
                window.location="demo.php";
            </script>
            <?php
        }
    }
?>
