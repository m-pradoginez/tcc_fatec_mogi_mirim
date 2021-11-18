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
                            <form name="form1" action="" method="post" enctype="multipart/form-data">
                                <div class="card">
                                    <div class="card-header"><strong>Adicionar Nova Questão com Texto</strong></div>
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
                        </div>
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="cardheader"><strong>Adicionar Nova Questão com Imagens</strong></div>
                                <div class="card-body card-block">
                                    <div class="form-group"><label for="fquestao" class=" form-control-label">Texto da Questão...</label><input type="text" placeholder="Digite o texto da questão..." class="form-control" name="fquestao"></div>
                                    <div class="form-group"><input type="file" class="form-control" name="fopcao1" style="padding-bottom: 40px"></div>
                                    <div class="form-group"><input type="file" class="form-control" name="fopcao2" style="padding-bottom: 40px"></div>
                                    <div class="form-group"><input type="file" class="form-control" name="fopcao3" style="padding-bottom: 40px"></div>
                                    <div class="form-group"><input type="file" class="form-control" name="fopcao4" style="padding-bottom: 40px"></div>
                                    <div class="form-group"><label for="fresposta" class=" form-control-label">Resposta</label><input type="file" class="form-control" name="fresposta" style="padding-bottom: 45px"></div>
                                    <div class="formgroup"><input type="submit" name="enviar2" value="Adicionar Questão" class="btn btnsuccess"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabela de registros já adicionados -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Número</th>
                            <th>Questões</th>
                            <th>Opção A</th>
                            <th>Opção B</th>
                            <th>Opção C</th>
                            <th>Opção D</th>
                            <th>Editar</th>
                            <th>Apagar</th>
                        </tr>
                        <?php
                        $resultado = mysqli_query($con, "select * from questoes where categoria='$categoria_exame' order by numero_questao asc") or die(mysqli_error($con));
                        while ($row = mysqli_fetch_array($resultado)) {
                            echo "<tr>";
                            echo "<td>";
                            echo $row["numero_questao"];
                            echo "</td>";
                            echo "<td>";
                            echo $row["questao"];
                            echo "</td>";

                            // Imagem 1
                            echo "<td>";
                            if (strpos($row["opcao1"], 'opcao_imagem/') !== false) {
                        ?>
                                <img src="<?php echo $row["opcao1"]; ?>" height="50" width="50">
                            <?php
                            } else {
                                echo $row["opcao1"];
                            }
                            echo "</td>";

                            // Imagem 2
                            echo "<td>";
                            if (strpos($row["opcao2"], 'opcao_imagem/') !== false) {
                            ?>
                                <img src="<?php echo $row["opcao2"]; ?>" height="50" width="50">
                            <?php
                            } else {
                                echo $row["opcao2"];
                            }
                            echo "</td>";
                            // Imagem 3
                            echo "<td>";
                            if (strpos($row["opcao3"], 'opcao_imagem/') !== false) {
                            ?>
                                <img src="<?php echo $row["opcao3"]; ?>" height="50" width="50">
                            <?php
                            } else {
                                echo $row["opcao3"];
                            }
                            echo "</td>";

                            // Imagem 4
                            echo "<td>";
                            if (strpos($row["opcao4"], 'opcao_imagem/') !== false) {
                            ?>
                                <img src="<?php echo $row["opcao4"]; ?>" height="50" width="50">
                            <?php
                            } else {
                                echo $row["opcao4"];
                            }
                            echo "</td>";
                            // Editar
                            echo "<td>";
                            if (strpos($row["opcao4"], 'opcao_imagem/') !== false) {
                            ?>
                                <a href="editar_opcao_imagem.php?id=<?php echo $row["id"]; ?>">Editar
                                </a>
                            <?php
                            } else {
                            ?>
                                <a href="editar_opcao.php?id=<?php echo $row["id"]; ?>">Editar</a>
                            <?php
                            }
                            echo "</td>";
                            // Apagar
                            echo "<td>";
                            ?>
                            <a href="deletar_opcao.php?id=<?php echo $row["id"]; ?>">Apagar</a>
                        <?php
                            echo "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
if (isset($_POST["enviar"])) {
    $loop = 0;
    $count = 0;
    $resultado = mysqli_query($con, "select * from questoes where categoria='$categoria_exame' order by id asc") or die(mysqli_error($con));
    $count = mysqli_num_rows($resultado);
    if ($count == 0) {
        # code...
    } else {
        while ($row = mysqli_fetch_array($resultado)) {
            $loop = $loop + 1;
            mysqli_query($con, "update questoes set numero_questao='$loop' where id=$row[$id]");
        }
    }
    $loop = $loop + 1;

    mysqli_query($con, "insert into questoes values (NULL,'$loop','$_POST[questao]','$_POST[opcao1]','$_POST[opcao2]','$_POST[opcao3]','$_POST[opcao4]','$_POST[resposta]','$categoria_exame')") or die(mysqli_error($con));
?>
    <script type="text/javascript">
        alert("Questão adicionada com sucesso ")
        window.location.href = window.location.href;
    </script>
<?php
}
?>
<?php
if (isset($_POST["enviar2"])) {
    $loop = 0;
    $count = 0;
    $resultado = mysqli_query($con, "select * from questoes where categoria='$categoria_exam
   e' order by id asc") or die(mysqli_error($con));
    $count = mysqli_num_rows($resultado);
    if ($count == 0) {
        # code...
    } else {
        while ($row = mysqli_fetch_array($resultado)) {
            $loop = $loop + 1;
            mysqli_query($con, "update questoes set numero_questao='$loop' where id=$row[$id]");
        }
    }
    $loop = $loop + 1;
    $tm = md5(time());
    $fnm1 = $_FILES["fopcao1"]["name"];
    $dst1 = "./opcao_imagem/" . $tm . $fnm1;
    $dst_db1 = "opcao_imagem/" . $tm . $fnm1;
    move_uploaded_file($_FILES["fopcao1"]["tmp_name"], $dst1);
    $fnm2 = $_FILES["fopcao2"]["name"];
    $dst2 = "./opcao_imagem/" . $tm . $fnm2;
    $dst_db2 = "opcao_imagem/" . $tm . $fnm2;
    move_uploaded_file($_FILES["fopcao2"]["tmp_name"], $dst2);
    $fnm3 = $_FILES["fopcao3"]["name"];
    $dst3 = "./opcao_imagem/" . $tm . $fnm3;
    $dst_db3 = "opcao_imagem/" . $tm . $fnm3;
    move_uploaded_file($_FILES["fopcao3"]["tmp_name"], $dst3);
    $fnm4 = $_FILES["fopcao4"]["name"];
    $dst4 = "./opcao_imagem/" . $tm . $fnm4;
    $dst_db4 = "opcao_imagem/" . $tm . $fnm4;
    move_uploaded_file($_FILES["fopcao4"]["tmp_name"], $dst4);
    $fnm5 = $_FILES["fresposta"]["name"];
    $dst5 = "./opcao_imagem/" . $tm . $fnm5;
    $dst_db5 = "opcao_imagem/" . $tm . $fnm5;
    move_uploaded_file($_FILES["fresposta"]["tmp_name"], $dst5);
    mysqli_query($con, "insert into questoes values (NULL,'$loop','$_POST[fquestao]','$dst1','$dst2','$dst3','$dst4','$dst5','$categoria_exame')") or die(mysqli_error($con));
?>
    <script type="text/javascript">
        alert("Questão adicionada com sucesso ")
        window.location.href = window.location.href;
    </script>
<?php
}
?>
<?php
include "rodape.php"
?>