<?php
	use Model\UsuarioDAO;

	include_once "../Model/ProdutoDAO.php";
	include_once "../Model/UsuarioDAO.php";

	$produtoDAO = new ProdutoDAO();
	$usuarioDAO = new UsuarioDAO();

	$id = 0;
	$produtos = $produtoDAO->exibe($id);
	
?>
<!DOCTYPE html>
<html>
<head>
    <title>Index</title>
    <?php include_once "config.php"; ?>
	<style type="text/css">
		.square{
		    width: 100%;
		    height: 0; /* A mágica está aqui */
		    padding-bottom: 100%; /* ... e está aqui */
		    float: left;
		    position: relative;
		}
		.block{
		  position: absolute;
		  text-align: center;
		  width: 100%;
		  height: 100%;
		}
		 
		.block:before {
		  content: '';
		  display: inline-block;
		  height: 100%; 
		  vertical-align: middle;
		  margin-right: -0.25em;
		}
		 
		.centered {
		  display: inline-block;
		  vertical-align: middle;
		  width: 80%;
		}

		.footer {
		    background: #000;
		}
	</style>
</head>
<body>
	<?php  
		require_once 'NavBar.php';
	?>


<div class="row mx-lg-n5">
	<?php
	  if ($produtos == NULL) {
	    echo "Você não possui produtos cadastrados";
	  } else {
	    foreach ($produtos as $produto) {
	?>
    <div class="text-center col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 border bg-light">
		<div class="square">
			<img src="imagens_produtos/<?php echo $produto->id; ?>.jpg" class="centered"/>
		</div>

        <a href="#"><?php echo $produto->nome; ?></a><br>
        Preço: <strong><?php echo $produto->preco; ?>R$ por <?php echo $produto->medida; ?></strong><br>
        Categoria: <strong><?php echo $produto->categoria; ?></strong><br>
        Vendedor: <strong><?php echo $usuarioDAO->exibeNome($produto->produtor); ?></strong><br>
        
        <a href="#" class="btn btn-success">Comprar</a>

    </div>
	<?php
	    }         
	  }
	?>
</div>




	<div class="footer">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
				<p class="h6">&copy All right Reversed. DiretoHortifruti</p>
			</div>
		</div>	
	</div>


</body>
</html>





