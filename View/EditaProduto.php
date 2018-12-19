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
    <title>Index</title>
    <?php include_once "config.php"; ?>
</head>
<body>
	<?php  
		require_once 'NavBar.php';
	?>
	        <form action="../Controller/Produto.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value='<?php echo $produto["id"]; ?>'>
                <div class="container">
                    <div class="form-group row">
                        <label for="nome" class="col-sm-2 col-form-label">Nome</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nome" id="nome" value='<?php echo $produto["nome"]; ?>' placeholder="Nome"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="categoria" class="col-sm-2 col-form-label">Categoria</label>
                        <div class="col-sm-10">
                        	<select class="form-control" name="categoria" id="categoria">
								<option><?php echo $produto["categoria"]; ?></option>
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
                            <input type="text" class="form-control" name="preco" id="preco" value='<?php echo $produto["preco"]; ?>' placeholder="Preço"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="arquivo">Imagem</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control-file" name="arquivo">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="acao" class="col-sm-2 col-form-label">-></label>
                        <div class="col-sm-10">
                            <input type="submit" class="btn btn-success" name="acao" value="Editar" />
                        </div>
                    </div>
                        
                </div>
            </form>
</body>
</html>
