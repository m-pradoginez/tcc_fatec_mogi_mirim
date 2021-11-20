<?php
include "cabecalho.php";
include "../conexao.php";

$id = $_GET["id"];
$id1 = $_GET["id1"];

$questao = "";
$opcao1 = "";
$opcao2 = "";
$opcao3 = "";
$opcao4 = "";
$resposta = "";
$resultado = mysqli_query($con, "select * from questoes where id=$id") or die(mysqli_error($con));
while ($row = mysqli_fetch_array($resultado)) {
    $questao = $row["questao"];
    $opcao1 = $row["opcao1"];
    $opcao2 = $row["opcao2"];
    $opcao3 = $row["opcao3"];
    $opcao4 = $row["opcao4"];
    $resposta = $row["resposta"];
}
?>
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Atualizar Questão</h1>
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
                        <div class="col-lg-12">
                            <form name="form1" action="" method="post" enctype="multipart/form-data">
                                <div class="card">
                                    <div class="card-header"><strong>Atualizar Questão com Texto</strong></div>
                                    <div class="card-body card-block">
                                        <div class="form-group"><label for="questao" class=" form-control-label">Questão</label><input type="text" placeholder="Texto da Questão" class="form-control" name="questao" value="<?php echo $questao; ?>"></div>
                                        <div class="form-group"><label for="opcao1" class=" form-control-label">Alternativa A</label><input type="text" class="form-control" name="opcao1" value="<?php echo $opcao1; ?>"></div>
                                        <div class="form-group"><label for="opcao1" class=" form-control-label">Alternativa B</label><input type="text" class="form-control" name="opcao2" value="<?php echo $opcao2; ?>"></div>
                                        <div class="form-group"><label for="opcao1" class=" form-control-label">Alternativa C</label><input type="text" class="form-control" name="opcao3" value="<?php echo $opcao3; ?>"></div>
                                        <div class="form-group"><label for="opcao1" class=" form-control-label">Alternativa D</label><input type="text" class="form-control" name="opcao4" value="<?php echo $opcao4; ?>"></div>
                                        <div class="form-group"><label for="resposta" class=" form-control-label">Resposta</label><input type="text" class="form-control" name="resposta" value="<?php echo $resposta; ?>"></div>
                                        <div class="form-group"><input type="submit" name="enviar" value="Atualizar Questão" class="btn btn-success"></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
if (isset($_POST["enviar"])) {
    mysqli_query($con, "update questoes set questao='$_POST[questao]',opcao1='$_POST[opcao1]',opcao2='$_POST[opcao2]',opcao3='$_POST[opcao3]',opcao4='$_POST[opcao4]',resposta='$_POST[resposta]' where id=$id") or die(mysqli_error($con));
?>
    <script type="text/javascript">
        window.location = "adc_edit_questoes.php?id=<?php echo $id1 ?>";
    </script>
<?php
}
?>

<?php
include "rodape.php"
?>