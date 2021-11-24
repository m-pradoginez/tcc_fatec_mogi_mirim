<!DOCTYPE html>
<html lang="en">
<head>
	</head>
	<?php include('header.php') ?>
	<?php include('auth.php') ?>
	<?php include('db_connect.php') ?>
	<title>Student List</title>
</head>
<body>
	<?php include('nav_bar.php') ?>
	
	<div class="container-fluid admin">
		<div class="col-md-12 alert alert-primary">Lista de Alunos</div>
		<button class="btn btn-primary bt-sm" id="new_student"><i class="fa fa-plus"></i>	Novo</button>
		<br>
		<br>
		<div class="card">
			<div class="card-body">
				<table class="table table-bordered" id='table'>
					<colgroup>
						<col width="10%">
						<col width="40%">
						<col width="30%">
						<col width="20%">
					</colgroup>
					<thead>
						<tr>
							<th>#</th>
							<th>Nome</th>
							<th>Turma</th>
							<th style="text-align: center">Gerenciar</th>
						</tr>
					</thead>
					<tbody>
					<?php
					$qry = $conn->query("SELECT s.*,u.name from students s left join users u  on s.user_id = u.id order by u.name asc ");
					$i = 1;
					if($qry->num_rows > 0){
						while($row= $qry->fetch_assoc()){
						?>
					<tr>
						<td><?php echo $i++ ?></td>
						<td><?php echo $row['name'] ?></td>
						<td><?php echo $row['level_section'] ?></td>
						<td>
							<center>
							 <button class="btn btn-sm btn-outline-primary edit_student" data-id="<?php echo $row['id']?>" type="button"><i class="fa fa-edit"></i> Editar</button>
							<button class="btn btn-sm btn-outline-danger remove_student" data-id="<?php echo $row['id']?>" type="button"><i class="fa fa-trash"></i> Deletar</button>
							</center>
						</td>
					</tr>
					<?php
					}
					}
					?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="modal fade" id="manage_student" tabindex="-1" role="dialog" >
				<div class="modal-dialog modal-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							
							<h4 class="modal-title" id="myModallabel">Adicionar Novo Estudante</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>
						<form id='student-frm'>
							<div class ="modal-body">
								<div id="msg"></div>
								<div class="form-group">
									<label>Nome</label>
									<input type="hidden" name="id" />
									<input type="hidden" name="uid" />
									<input type="hidden" name="user_type" value = '3' />
									<input type="text" name="name" required="required" class="form-control" />
								</div>
								<div class="form-group">
									<label>Turma</label>
									<input type="text" name ="level_section" required="" class="form-control" />
								</div>
								<div class="form-group">
									<label>Nome de Usuário</label>
									<input type="text" name ="username" required="" class="form-control" />
								</div>
								<div class="form-group">
									<label>Senha</label>
									<input type="password" name="password" required="required" class="form-control" />
								</div>
							</div>
							<div class="modal-footer">
								<button  class="btn btn-primary" name="save"><span class="glyphicon glyphicon-save"></span> Salvar</button>
							</div>
						</form>
					</div>
				</div>
			</div>
</body>
<script>
	$(document).ready(function(){
		$('#table').DataTable();
		$('#new_student').click(function(){
			$('#msg').html('')
			$('#manage_student .modal-title').html('Adicionar Novo Aluno')
			$('#manage_student #student-frm').get(0).reset()
			$('#manage_student').modal('show')
		})
		$('.edit_student').click(function(){
			var id = $(this).attr('data-id')
			$.ajax({
				url:'./get_student.php?id='+id,
				error:err=>console.log(err),
				success:function(resp){
					if(typeof resp != undefined){
						resp = JSON.parse(resp)
						$('[name="id"]').val(resp.id)
						$('[name="uid"]').val(resp.uid)
						$('[name="name"]').val(resp.name)
						$('[name="level_section"]').val(resp.level_section)
						$('[name="username"]').val(resp.username)
						$('[name="password"]').val(resp.password)
						$('#manage_student .modal-title').html('Editar Aluno')
						$('#manage_student').modal('show')

					}
				}
			})

		})
		$('.remove_student').click(function(){
			var id = $(this).attr('data-id')
			var conf = confirm('Tem certeza que deseja excluir esse aluno?');
			if(conf == true){
				$.ajax({
				url:'./delete_student.php?id='+id,
				error:err=>console.log(err),
				success:function(resp){
					if(resp == true)
						location.reload()
				}
			})
			}
		})
		$('#student-frm').submit(function(e){
			e.preventDefault();
			$('#student-frm [name="submit"]').attr('disabled',true)
			$('#student-frm [name="submit"]').html('Saving...')
			$('#msg').html('')

			$.ajax({
				url:'./save_student.php',
				method:'POST',
				data:$(this).serialize(),
				error:err=>{
					console.log(err)
					alert('An error occured')
					$('#student-frm [name="submit"]').removeAttr('disabled')
					$('#student-frm [name="submit"]').html('Save')
				},
				success:function(resp){
					if(typeof resp != undefined){
						resp = JSON.parse(resp)
						if(resp.status == 1){
							alert('Aluno inserido com sucesso!🧑‍🎓');
							location.reload()
						}else{
						$('#msg').html('<div class="alert alert-danger">'+resp.msg+'</div>')

						}
					}
				}
			})
		})
	})
</script>
</html>