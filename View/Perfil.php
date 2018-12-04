<?php
	use Model\UsuarioDAO;
	include_once "../Model/UsuarioDAO.php";
	@session_start();
	if (@$_SESSION['id'] == NULL) {
		header('Location: ../View/Index.php');
	}
	 
	$usuarioDAO = new UsuarioDAO();
	$usuario = $usuarioDAO->exibe();


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Exibe</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>
	<?php
		require_once 'NavBar.php';
	?>
	<div class="row mx-lg-n5">
		<div class="col-12 col-md-3 border bg-light">
			<div class="text-center">
				<h1><?php echo "$usuario->nome $usuario->sobrenome"; ?></h1>
				<img src="imagens_sistema/Logo.png" class="img-thumbnail">
			</div>
		</div>
		<div class="col-12 col-sm-6 col-md-9 border bg-light">
			<table class="table">
				<tbody>
					<tr>
						<td>Nome</td> <td><?php echo "$usuario->nome"; ?></td>
					</tr>
					<tr>
						<td>Sobrenome</td> <td><?php echo "$usuario->sobrenome"; ?></td>
					</tr>
					<tr>
						<td>WhatsApp</td> <td><?php echo "$usuario->whatsapp"; ?></td>
					</tr>
					<tr>
						<td>Celular</td> <td><?php echo "$usuario->celular"; ?></td>
					</tr>
					<tr>
						<td>Endereço</td> <td><?php echo "$usuario->endereco"; ?></td>
					</tr>
					<tr>
						<td>Cidade</td> <td><?php echo "$usuario->cidade"; ?></td>
					</tr>
					<tr>
						<td>Estado</td> <td><?php echo "$usuario->estado"; ?></td>
					</tr>
					<tr>
						<td>Email</td> <td><?php echo "$usuario->email"; ?></td>
					</tr>
					<tr>
						<td>
							<form action="../Controller/Usuario.php" method="POST">
							<input type="submit" class="btn btn-danger" name="acao" value="Deletar perfil" />
							</form>
						</td>
						<td><a href="Editar_Perfil.php" class="btn btn-primary">Editar perfil</a></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>

</body>
</html>