<?php
include "../conexao.php";

$id=$_GET["id"];
$id1 = $_GET["id1"];

mysqli_query($con,"delete from questoes where id=$id");

?>
<script type="text/javascript">
    window.location = "adc_edit_questoes.php?id=<?php echo $id1 ?>";
</script>
