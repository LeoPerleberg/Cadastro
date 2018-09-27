<?php
use Model\UsuarioDAO;
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Editar</title>
</head>
<body>
	<?php
		include_once "../Model/UsuarioDAO.php";
		session_start();
		if ($_SESSION['id'] == NULL) {
			header('Location: ../View/index.php');
		}
		$usuarioDAO = new UsuarioDAO();
		$usuario = $usuarioDAO->exibe();
	?>
	<form action="../Controller/Usuario.php" method="POST">
		Nome:
		<input type="text" value="<?php echo $usuario->getNome(); ?>" name="nome" /><br>
		Endereço:
		<input type="text" value="<?php echo $usuario->getEndereco(); ?>" name="endereco" /><br>
		E-mail:
		<input type="email" value="<?php echo $usuario->getEmail(); ?>" name="email" /><br>
		Senha:
		<input type="password" name="pass" /><br>
		<input type="submit" name="acao" value="Editar" /><br>
	</form>
</body>
</html>