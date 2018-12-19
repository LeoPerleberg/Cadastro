<?php
	use Model\UsuarioDAO;
	include_once "../Model/UsuarioDAO.php";
	@session_start();
	if (@$_SESSION['id'] == NULL) {
		header('Location: ../View/Index.php');
	}
	 
	$usuarioDAO = new UsuarioDAO();
	$usuario = $usuarioDAO->exibe();
	$id = $_SESSION['id'];

?>
<!DOCTYPE html>
<html>
<head>
    <title>Exibe</title>
    <?php include_once "config.php"; ?>
</head>
<body>
	<?php
		require_once 'NavBar.php';
	?>
	<div class="row mx-lg-n5">
		<div class="col-12 col-md-3 border bg-light">
			<div class="text-center">
				<h1><?php echo "$usuario->nome $usuario->sobrenome"; ?></h1>
				<form action="../Controller/Usuario.php" method="POST" enctype="multipart/form-data">
					<img src="imagens_perfil/<?php echo "$id"; ?>.jpg" class="img-thumbnail">
					<label for="arquivo">Selecione a imagem</label>
					<input type="file" class="form-control-file" name="arquivo">
	                <input type="submit" class="btn btn-success" name="acao" value="Adcionar imagem" />
				</form>
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