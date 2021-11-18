<?php
include "cabecalho.php";
include "../conexao.php";


$id=$_GET["id"];
$resultado=mysqli_query($con,"select * from categoria_exame where id=$id") or die(mysqli_error($con));
while($row=mysqli_fetch_array($resultado))
{
    $categoria_exame=$row["categoria"];
    $tempo_exame=$row["tempo_em_minutos"];
}
?>
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Editar Exame</h1>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">


        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <form name="form1" action="" method="post">
                        <div class="card-body">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header"><strong>Editar Exame</strong></div>
                                    <div class="card-body card-block">
                                        <div class="form-group"><label for="nome_exame" class=" form-control-label">Nova Categoria de Exame</label><input type="text" placeholder="Adicionar Categoria do Exame" class="form-control" name="nome_exame" value="<?php echo $categoria_exame; ?>"></div>
                                        <div class="form-group"><label for="tempo_exame" class=" form-control-label">Tempo do Exame em Minutos</label><input type="text" placeholder="Tempo do Exame em Minutos" class="form-control" name="tempo_exame" value="<?php echo $tempo_exame; ?>"></div>
                                        <div class="form-group"><input type="submit" name="enviar" value="Atualizar" class="btn btn-success"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- .card -->

            </div>
            <!--/.col-->
        </div><!-- .animated -->
    </div><!-- .content -->

    <?php
    if (isset($_POST["enviar"])) {
        mysqli_query($con, "update categoria_exame set categoria='$_POST[nome_exame]',tempo_em_minutos='$_POST[tempo_exame]' where id=$id") or die(mysqli_error($con));
    ?>
        <script type="text/javascript">
            window.location="categoria_exame.php";
        </script>
    <?php

    }
    ?>

    <?php
    include "rodape.php"
    ?>