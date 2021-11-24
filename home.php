<?php
    include 'db_connect.php';
   include 'auth.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('header.php') ?>
    <title>Início | TCC Gamificação Fatec Mogi Mirim</title>
</head>
<body>
    <?php 
    include 'nav_bar.php';
    ?>
    <div class="container-fluid admin">
        <div class="card col-md-5 offset-2">
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <th>Nome</th>
                        <th>Perguntas</th>
                        <?php if($_SESSION['login_user_type'] == 3): ?>
                        <th style="text-align: center">Estado</th>
                        <?php else: ?>
                        <th>Já Fizeram</th>
                        <?php endif; ?>
                    </thead>
                    <tbody>
                        <?php 
                            $where = '';
                            if($_SESSION['login_user_type'] == 2){
                                $where = " where u.id = ".$_SESSION['login_id']." ";
                            }
                            if($_SESSION['login_user_type'] == 3){
                                $where = " where q.id in (SELECT quiz_id from quiz_student_list where user_id = '".$_SESSION['login_id']."') ";
                            }
                            $qry = $conn->query("SELECT q.*,u.name as fname from quiz_list q left join users u on q.user_id = u.id ".$where." order by q.title asc ");
                                while($row= $qry->fetch_assoc()){
                                    $items = $conn->query("SELECT count(id) as item_count from questions where qid = '".$row['id']."' ")->fetch_array()['item_count'];
                                    $swhere ='';
                                     if($_SESSION['login_user_type'] == 3)
                                        $swhere= ' and user_id = '.$_SESSION['login_id'].' ';

                                    $taken = $conn->query("SELECT count(id) as item_count from answers where quiz_id = '".$row['id']."'  ".$swhere )->fetch_array()['item_count'];
                        ?>
                        <tr>
                        <td><?php echo $row['title'] ?></td>
                        <td class='text-center'><?php echo $items ?></td>
                        <?php if($_SESSION['login_user_type'] == 3): ?>
                        <td class='text-center'><?php echo $taken > 1 ? 'Feito' : 'Á fazer' ?></td>
                        <?php else: ?>
                        <td class='text-center'><?php echo $taken ?></td>
                        <?php endif; ?>
                        </tr>
                        <?php
                        }

                        ?>
                    </tbody>  
                </table>
            </div>
        </div>
       </div>
</body>
</html>