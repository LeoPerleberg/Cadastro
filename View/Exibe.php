<?php
	include_once "../Model/ProdutoDAO.php";
	@session_start();
	if (@$_SESSION['id'] == NULL) {
		header('Location: ../View/Index.php');
	}

	$produtoDAO = new ProdutoDAO();


	$produtos = $produtoDAO->exibe(@$_SESSION['id']);
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
	<table class="table">
	<thead>
	  <tr>
	    <th scope="col">id</th>
	    <th scope="col">Produtor</th>
	    <th scope="col">Nome</th>
	    <th scope="col">Categoria</th>
	    <th scope="col">Preço</th>
	    <th scope="col">Data de adição</th>
	    <th scope="col">Data de modificação</th>
	    <th scope="col">Imagem</th>
	    <th scope="col">Editar</th>
	    <th scope="col">Excluir</th>
	  </tr>
	</thead>
	<?php
	  if ($produtos == NULL) {
	    echo "Você não possui produtos cadastrados";
	  } else {
	    foreach ($produtos as $produto) {
	?>
	      <tbody>
	        <tr>
	          <th scope='row'><?php echo $produto->id; ?></th>
	          <td><?php echo $produto->produtor; ?></td>
	          <td><?php echo $produto->nome; ?></td>
	          <td><?php echo $produto->categoria; ?></td>
	          <td><?php echo $produto->preco; ?></td>
	          <td><?php echo $produto->dt_adicao; ?></td>
	          <td><?php echo $produto->dt_modif; ?></td>
	          <td><img src="imagens/<?php echo $produto->imagem; ?>" height="30px"></td>
	          <form method="POST" action="EditaProduto.php">
	            <input type="hidden" name="id" id="id" value="<?php echo $produto->id; ?>">
	            <td><input type="submit" class="btn btn-success" name="acao" value="Editar" /></td>
	          </form>
	          <form method="POST" action="../Controller/Produto.php">
	            <td><input type="submit" class="btn btn-danger" name="acao" value="Excluir" /></td>
	          </form>
	        </tr>
	      </tbody>
	<?php
	    }         
	  }
	?>
	</table>
</body>
</html>