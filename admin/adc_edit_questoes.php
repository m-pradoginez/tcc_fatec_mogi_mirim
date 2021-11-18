<?php
include "cabecalho.php";
include "../conexao.php";
$id = $_GET["id"];
$categoria_exame = '';
$resultado = mysqli_query($con, "select * from categoria_exame where id=$id") or die(mysqli_error($con));
while ($row = mysqli_fetch_array($resultado)) {
    $categoria_exame = $row["categoria"];
    $tempo_exame = $row["tempo_em_minutos"];
}
?>
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Adicionar Questão no Questionário de <?php echo $categoria_exame; ?></h1>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">


        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-lg-6">
                            <form name="form1" action="" method="post">
                                <div class="card">
                                    <div class="card-header"><strong>Adicionar Nova Questão</strong></div>
                                    <div class="card-body card-block">
                                        <div class="form-group"><input type="text" placeholder="Texto da Questão" class="form-control" name="questao"></div>
                                        <div class="form-group"><input type="text" placeholder="Texto da Opção A" class="form-control" name="opcao1"></div>
                                        <div class="form-group"><input type="text" placeholder="Texto da Opção B" class="form-control" name="opcao2"></div>
                                        <div class="form-group"><input type="text" placeholder="Texto da Opção C" class="form-control" name="opcao3"></div>
                                        <div class="form-group"><input type="text" placeholder="Texto da Opção D" class="form-control" name="opcao4"></div>
                                        <div class="form-group"><input type="text" placeholder="Resposta" class="form-control" name="resposta"></div>
                                        <div class="form-group"><input type="submit" name="enviar" value="Adicionar Questão" class="btn btn-success"></div>
                                    </div>
                                </div>
                            </form>
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
        $loop = 0;
        $count = 0;

        $resultado = mysqli_query($con, "select * from questoes where categoria='$categoria_exame' order by id asc") or die(mysqli_error($con));
        $count = mysqli_num_rows($resultado);
        if ($count == 0) 
        {
            # code...
        } 
        else 
        {
            while ($row = mysqli_fetch_array($resultado)) 
            {
                $loop = $loop + 1;
                mysqli_query($con, "update questoes set numero_questao='$loop' where id=$row[$id]");
            }
        }
        $loop = $loop + 1;
        mysqli_query($con, "insert into questoes values (NULL,'$loop','$_POST[questao]','$_POST[opcao1]','$_POST[opcao2]','$_POST[opcao3]','$_POST[opcao4]','$_POST[resposta]','$categoria_exame')") or die(mysqli_error($con));
        
        ?>
        <script type="text/javascript">
            alert("Questão adicionada com sucesso 📝✍️🤩")
            window.location.href = window.location.href;
        </script>
        <?php
    }
    ?>

    <?php
    include "rodape.php"
    ?>