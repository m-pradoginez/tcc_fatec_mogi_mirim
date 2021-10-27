<?php
include_once 'conexao.php';
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Register Now</title>
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
			<div class="text-center custom-login">
				<h3>Registro Novo Aluno</h3>

			</div>
			<div class="content-error">
				<div class="hpanel">
                    <div class="panel-body">
                        <form action="" name="formularioLogin" method="post">
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label>Nome Completo</label>
                                    <input type="text" name="nomecompleto" style="text-transform: uppercase" class="form-control">
                                </div>
                                <div class="form-group col-lg-12">
                                <label>Senha</label>
                                <input type="password" name="senha" class="form-control">
                            </div>
                                <div class="form-group col-lg-12">
                                    <label>Email Institucional</label>
                                    <input type="text" name="email" class="form-control">
                                </div>
                                </div>
                            <div class="text-center">
                                <button type="submit" name="enviar" class="btn btn-success loginbtn">Registrar</button>
                            </div>

                            <div class="alert alert-success" role="alert" id="sucesso" style="margin-top: 15px; display: none;">
                                Cadastro realizado com sucesso! 🥳
                            </div>

                            <div class="alert alert-danger" role="alert" id="falha" style="margin-top: 15px; display: none;">
                                <strong>Cadastro já existente!</strong> Aluno(a) já está cadastrado na plataforma. 😲
                            </div>
                        </form>
                    </div>
                </div>
			</div>
		</div>   
    </div>

    <!-- Checar se o aluno já possuí cadastro no banco de dados ou não -->
    <?php
        if(isset($_POST["enviar"]))
        {
            $count = 0;
            $resultado=mysqli_query($con,"select * from cadastro where nomecompleto=UPPER('$_POST[nomecompleto]')") or die(mysqli_error($con));
            $count=mysqli_num_rows($resultado);

            // Se o aluno já possuir cadastro no banco de dados, exibir uma mensagem de alerta
            if ($count > 0) {
                ?>
                <script type="text/javascript">
                    document.getElementById('sucesso').style.display="none";
                    document.getElementById('falha').style.display="block"; 
                </script>
                <?php
            } else {
                // Se o aluno não possuí cadastro no banco de dados, então inserir um novo usuário
                mysqli_query($con,"insert into cadastro values (NULL,UPPER('$_POST[nomecompleto]'),'$_POST[senha]','$_POST[email]')") or die(mysqli_error($con));
                ?>
                <script type="text/javascript">
                    document.getElementById('sucesso').style.display="block";
                    document.getElementById('falha').style.display="none"; 
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
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
</body>
</html>