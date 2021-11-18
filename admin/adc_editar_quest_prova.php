<?php
include 'cabecalho.php';
include "../conexao.php";
?>
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Selecione um categoria de dicionário para gerenciar</h1>
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
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Tempo</th>
                                    <th scope="col">Selecionar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $count = 0;
                                $res = mysqli_query($con, "select * from categoria_exame");
                                while ($row = mysqli_fetch_array($res)) {
                                    $count = $count + 1;
                                ?>
                                    <tr>
                                        <th scope="row"><?php echo $count; ?></th>
                                        <td><?php echo $row["categoria"]; ?></td>
                                        <td><?php echo $row["tempo_em_minutos"]; ?></td>
                                        <td><a href="adc_edit_questoes.php?id=<?php echo $row['id']; ?>">Selecionar</a></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- .card -->
            </div>

            <!--/.col-->
        </div><!-- .animated -->
    </div><!-- .content -->

    <?php
    if (isset($_POST["enviar"])) {
        mysqli_query($con, "insert into categoria_exame values(NULL, '$_POST[nome_exame]','$_POST[tempo_exame]')") or die(mysqli_error($con));
    ?>
        <script type="text/javascript">
            alert("Exame adicionado com sucesso 📝✍️🤩")
            window.location.href = window.location.href;
        </script>
    <?php

    }
    ?>

    <?php
    include "rodape.php"
    ?>