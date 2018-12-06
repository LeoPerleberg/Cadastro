<?php

include_once "../Model/Produto.php";
include_once "../Model/ProdutoDAO.php";

@session_start();
@$id=$_POST['id'];

$produtoDAO = new ProdutoDAO();
$produto = $produtoDAO->exibeum($id);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Index</title>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>
	<?php  
		require_once 'NavBar.php';
	?>
	            <form action="../Controller/Produto.php" method="POST">
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="nome" class="col-sm-2 col-form-label">Nome</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="categoria" class="col-sm-2 col-form-label">Categoria</label>
                        <div class="col-sm-10">
                        	<select class="form-control" name="categoria" id="categoria">
								<option>Categoria</option>
								<option>Fruta</option>
								<option>Verdura</option>
								<option>Legume</option>
								<option>!</option>
								<option>?</option>
								<option>.</option>
							</select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="preco" class="col-sm-2 col-form-label">Preço</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="preco" id="preco" placeholder="Preço"/>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-success" name="acao" value="Cadastrar">Cadastrar</button>
                </div>
            </form>
</body>
</html>
