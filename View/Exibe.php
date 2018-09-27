<?php
use Model\UsuarioDAO;
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>exibe</title>
</head>
<body>
<pre>
	<?php
		include_once "../Model/UsuarioDAO.php";
		session_start();
		if ($_SESSION['id'] == NULL) {
			header('Location: ../View/index.php');
		} else {
			echo $_SESSION['nome'];
			$usuarioDAO = new UsuarioDAO();
			$usuario = $usuarioDAO->exibe();
			print_r($usuario);
		}
	?>
	</pre>
	<a href="Editar_Perfil.php">Editar Perfil</a>
	<form action="../Controller/Usuario.php" method="POST">
		<input type="submit" name="acao" value="Logout" /><br>
		<input type="submit" name="acao" value="Deletar" /><br>
	</form>
</body>
</html>