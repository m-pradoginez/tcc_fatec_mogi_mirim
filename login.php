<?php
include "conexao.php";
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
    <link rel="stylesheet" href="css1/bootstrap.min.css">
    <link rel="stylesheet" href="css1/font-awesome.min.css">
    <link rel="stylesheet" href="css1/owl.carousel.css">
    <link rel="stylesheet" href="css1/owl.theme.css">
    <link rel="stylesheet" href="css1/owl.transitions.css">
    <link rel="stylesheet" href="css1/animate.css">
    <link rel="stylesheet" href="css1/normalize.css">
    <link rel="stylesheet" href="css1/main.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css1/responsive.css">
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>

	<div class="error-pagewrap">
		<div class="error-page-int">
			<div class="text-center m-b-md custom-login">
				<h3>LOGIN FORM</h3>

			</div>
			<div class="content-error">
				<div class="hpanel">
                    <div class="panel-body">
                        <form action="" name="login" method="post">
                            <div class="form-group">
                                <label class="control-label" for="email">Email Institucional</label>
                                <input type="text" placeholder="example@fatec.sp.gov.br" title="Por favor entre com seu e-mail institucional" required="" value="" name="email" id="email" class="form-control">

                            </div>
                            <div class="form-group">
                                <label class="control-label" for="senha">Senha</label>
                                <input type="password" title="Por favor digite sua senha" placeholder="******" required="" value="" name="senha" id="senha" class="form-control">

                            </div>

                            <button type="submit" name="login" class="btn btn-success btn-block loginbtn">Entrar</button>
                            <a class="btn btn-default btn-block" href="registrar.php">Registrar</a>
                            <div class="alert alert-danger" role="alert" id="falha" style="margin-top: 15px; display: none;">
                               <strong>Inválido!</strong> Email ou senha incorreto. 🤔
                            </div>
                        </form>
                    </div>
                </div>
			</div>
		</div>   
    </div>

<?php
        if(isset($_POST["login"]))
        {
            $count = 0;
            $resultado=mysqli_query($con,"select * from cadastro where email='$_POST[email]'") or die(mysqli_error($con));
            $count=mysqli_num_rows($resultado);

            if ($count == 0) {
                ?>
                <script type="text/javascript">
                    document.getElementById('falha').style.display="block"; 
                </script>
                <?php
            } else {
                ?>
                <script type="text/javascript">
                    window.location="index.php"
                </script>
                <?php
            }
        }
        ?>

    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/jquery-price-slider.js"></script>
    <script src="js/jquery.meanmenu.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
</body>

</html>