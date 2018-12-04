<?php
	use Model\UsuarioDAO;
	include_once "../Model/UsuarioDAO.php";
	include_once "../Model/ProdutoDAO.php";
	@session_start();
	if (@$_SESSION['id'] == NULL) {
		header('Location: ../View/Index.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Exibe</title>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>
	<?php 
		require_once 'NavBar.php';
		$usuarioDAO = new UsuarioDAO();
		$usuario = $usuarioDAO->exibe();
	?>
    <div class="container-fluid">
    	<form action="../Controller/Usuario.php" method="POST">
	        <div class="form-group row">
	            <label for="nome" class="col-sm-2 col-form-label">Nome</label>
	            <div class="col-sm-10">
	                <input type="text" class="form-control" name="nome" id="nome" value="<?php echo $usuario->nome; ?>" placeholder="Nome"/>
	            </div>
	        </div>
	        <div class="form-group row">
	            <label for="sobrenome" class="col-sm-2 col-form-label">Sobrenome</label>
	            <div class="col-sm-10">
	                <input type="text" class="form-control" name="sobrenome" id="sobrenome" value="<?php echo $usuario->sobrenome; ?>" placeholder="Sobrenome"/>
	            </div>
	        </div>
	        <div class="form-group row">
	            <label for="whatsapp" class="col-sm-2 col-form-label">Whatsapp</label>
	            <div class="col-sm-10">
	                <input type="text" class="form-control" name="whatsapp" id="whatsapp" value="<?php echo $usuario->whatsapp; ?>" placeholder="WhatsApp"/>
	            </div>
	        </div>
	        <div class="form-group row">
	            <label for="celular" class="col-sm-2 col-form-label">Celular</label>
	            <div class="col-sm-10">
	                <input type="text" class="form-control" name="celular" id="celular" value="<?php echo $usuario->celular; ?>" placeholder="Celular"/>
	            </div>
	        </div>
	        <div class="form-group row">
	            <label for="endereco" class="col-sm-2 col-form-label">Endereço</label>
	            <div class="col-sm-10">
	                <input type="text" class="form-control" name="endereco" id="endereco" value="<?php echo $usuario->endereco; ?>" placeholder="Endereço"/>
	            </div>
	        </div>
	        <div class="form-group row">
	            <label for="cidade" class="col-sm-2 col-form-label">Cidade</label>
	            <div class="col-sm-10">
	                <input type="text" class="form-control" name="cidade" id="cidade" value="<?php echo $usuario->cidade; ?>" placeholder="Cidade"/>
	            </div>
	        </div>
	        <div class="form-group row">
	            <label for="estado" class="col-sm-2 col-form-label">Estado</label>
	            <div class="col-sm-10">
	                <input type="text" class="form-control" name="estado" id="estado" value="<?php echo $usuario->estado; ?>" placeholder="Estado"/>
	            </div>
	        </div>
	        <div class="form-group row">
	            <label for="email" class="col-sm-2 col-form-label">Email</label>
	            <div class="col-sm-10">
	                <input type="text" class="form-control" name="email" id="email" value="<?php echo $usuario->email; ?>" placeholder="Email"/>
	            </div>
	        </div>
	        <div class="form-group row">
	            <label for="senha" class="col-sm-2 col-form-label">Senha</label>
	            <div class="col-sm-10">
	                <input type="password" class="form-control" name="pass" id="senha" placeholder="senha"/>
	            </div>
	        </div>
	        <div class="form-group row">
	            <div class="col-sm-10">
	                <input type="submit" class="btn btn-success" name="acao" value="Editar" />
	            </div>
	        </div>
        </form>
    </div>
</body>
</html>