<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Index</title>
</head>
<body>
	<p>Cadastrar</p>
	<form action="../Controller/Usuario.php" method="POST">
		Nome:
		<input type="text" name="nome" /><br>
		Endereço:
		<input type="text" name="endereco" /><br>
		E-mail:
		<input type="email" name="email" /><br>
		Senha:
		<input type="password" name="pass" /><br>
		<input type="submit" name="acao" value="Cadastrar" /><br>
	</form>
	<p>Login</p>
	<form action="../Controller/Usuario.php" method="POST">
		E-mail:
		<input type="email" name="email" /><br>
		Senha:
		<input type="password" name="pass" /><br>
		<input type="submit" name="acao" value="Login" /><br>
	</form>
</body>
</html>