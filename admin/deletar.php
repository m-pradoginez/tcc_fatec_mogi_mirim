<?php
include "../conexao.php";
$id = $_GET["id"];
mysqli_query($con, "delete from categoria_exame where id=$id");
?>

<script type="text/javascript">
    window.location = "categoria_exame.php"
</script>;