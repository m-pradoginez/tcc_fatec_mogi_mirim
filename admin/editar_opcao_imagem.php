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
                        <form name="form1" action="" method="post" enctype="multipart/form-data">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="cardheader"><strong>Atualizar Questão com Imagens</strong></div>
                                <div class="card-body card-block">
                                    <div class="form-group"><label for="fquestao" class=" form-control-label">Texto da Questão...</label><input type="text" placeholder="Digite o texto da questão..." class="form-control" name="fquestao" value="<?php echo $questao; ?>"></div>
                                    <div class="form-group"><img src="<?php echo $opcao1; ?>" height="50" width="50"><br><label for="fopcao1" class=" form-control-label">Opção A</label><input type="file" class="form-control" name="fopcao1" style="padding-bottom: 40px"></div>
                                    <div class="form-group"><img src="<?php echo $opcao2; ?>" height="50" width="50"><br><label for="fopcao2" class=" form-control-label">Opção B</label><input type="file" class="form-control" name="fopcao2" style="padding-bottom: 40px"></div>
                                    <div class="form-group"><img src="<?php echo $opcao3; ?>" height="50" width="50"><br><label for="fopcao3" class=" form-control-label">Opção C</label><input type="file" class="form-control" name="fopcao3" style="padding-bottom: 40px"></div>
                                    <div class="form-group"><img src="<?php echo $opcao4; ?>" height="50" width="50"><br><label for="fopcao4" class=" form-control-label">Opção D</label><input type="file" class="form-control" name="fopcao4" style="padding-bottom: 40px"></div>
                                    <div class="form-group"><img src="<?php echo $resposta; ?>" height="50" width="50"><label for="fresposta" class=" form-control-label">Resposta</label><input type="file" class="form-control" name="fresposta" style="padding-bottom: 45px"></div>
                                    <div class="formgroup"><input type="submit" name="enviar" value="Atualizar Questão" class="btn btnsuccess"></div>
                                </div>
                            </div>
                        </div>
                    
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
if (isset($_POST["enviar"])) {
    $opcao1 = $_FILES["fopcao1"]["name"];
    $opcao2 = $_FILES["fopcao2"]["name"];
    $opcao3 = $_FILES["fopcao3"]["name"];
    $opcao4 = $_FILES["fopcao4"]["name"];
    $resposta = $_FILES["fresposta"]["name"];
    $tm = md5(time());

    if ($opcao1 != "") {
        $dst1 = "./opcao_imagens/" . $tm . $opcao1;
        $dst_db1 = "opcao_imagens/" . $tm . $opcao1;
        move_uploaded_file($_FILES["fopcao1"]["tmp_name"], $dst1);
        mysqli_query($con, "update questoes set questao='$_POST[fquestao]', opcao1='$dst_db1' where id=$id") or die(mysqli_error($con));
    }

    if ($opcao2 != "") {
        $dst2 = "./opcao_imagens/" . $tm . $opcao2;
        $dst_db2 = "opcao_imagens/" . $tm . $opcao2;
        move_uploaded_file($_FILES["fopcao2"]["tmp_name"], $dst2);
        mysqli_query($con, "update questoes set questao='$_POST[fquestao]', opcao2='$dst_db2' where id=$id") or die(mysqli_error($con));
    }

    if ($opcao3 != "") {
        $dst3 = "./opcao_imagens/" . $tm . $opcao3;
        $dst_db3 = "opcao_imagens/" . $tm . $opcao3;
        move_uploaded_file($_FILES["fopcao3"]["tmp_name"], $dst3);
        mysqli_query($con, "update questoes set questao='$_POST[fquestao]', opcao3='$dst_db3' where id=$id") or die(mysqli_error($con));
    }

    if ($opcao4 != "") {
        $dst4 = "./opcao_imagens/" . $tm . $opcao4;
        $dst_db4 = "opcao_imagens/" . $tm . $opcao4;
        move_uploaded_file($_FILES["fopcao4"]["tmp_name"], $dst4);
        mysqli_query($con, "update questoes set questao='$_POST[fquestao]', opcao4='$dst_db4' where id=$id") or die(mysqli_error($con));
    }

    if ($resposta != "") {
        $dst_resposta = "./opcao_imagens/" . $tm . $resposta;
        $dst_db_resposta = "opcao_imagens/" . $tm . $resposta;
        move_uploaded_file($_FILES["fresposta"]["tmp_name"], $dst_resposta);
        mysqli_query($con, "update questoes set questao='$_POST[fquestao]', resposta='$dst_db_resposta' where id=$id") or die(mysqli_error($con));
    }

    mysqli_query($con, "update questoes set questao='$_POST[fquestao]' where id=$id") or die(mysqli_error($con));

?>
    <script type="text/javascript">
        window.location = "adc_edit_questoes.php?id=<?php echo $id1 ?>";
    </script>
    <?php

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