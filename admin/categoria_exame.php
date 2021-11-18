<?php
include "cabecalho.php";
include "../conexao.php";
?>
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Adicionar Exame</h1>
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
                                    <div class="card-header"><strong>Adicionar Exame</strong></div>
                                    <div class="card-body card-block">
                                        <div class="form-group"><label for="nome_exame" class=" form-control-label">Nova Categoria de Exame</label><input type="text" placeholder="Adicionar Categoria do Exame" class="form-control" name="nome_exame"></div>
                                        <div class="form-group"><label for="tempo_exame" class=" form-control-label">Tempo do Exame em Minutos</label><input type="text" placeholder="Tempo do Exame em Minutos" class="form-control" name="tempo_exame"></div>
                                        <div class="form-group"><input type="submit" name="enviar" value="Acionar Exame" class="btn btn-success"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <strong class="card-title">Categoria do Exame</strong>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Nome</th>
                                                    <th scope="col">Tempo</th>
                                                    <th scope="col">Editar</th>
                                                    <th scope="col">Deletar</a></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $count=0;
                                                $res = mysqli_query($con, "select * from categoria_exame");
                                                while ($row = mysqli_fetch_array($res)) 
                                                {
                                                $count = $count+1;
                                                ?>
                                                    <tr>
                                                        <th scope="row"><?php echo $count; ?></th>
                                                        <td><?php echo $row["categoria"]; ?></td>
                                                        <td><?php echo $row["tempo_em_minutos"]; ?></td>
                                                        <td><a href="editar_exame.php?id=<?php echo $row["id"]; ?>">Editar</a></td>
                                                        <td><a href="deletar.php?id=<?php echo $row["id"]; ?>">Deletar</a></td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
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
        mysqli_query($con, "insert into categoria_exame values(NULL, '$_POST[nome_exame]','$_POST[tempo_exame]')") or die(mysqli_error($con));
    ?>
        <script type="text/javascript">
            alert("Exame adicionado com sucesso 📝✍️🤩")
            window.location.href=window.location.href;
        </script>
    <?php

    }
    ?>

    <?php
    include "rodape.php"
    ?>