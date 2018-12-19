	<?php
	  if ($produtos == NULL) {
	    echo "Você não possui produtos cadastrados";
	  } else {
	    foreach ($produtos as $produto) {
	?>


    <div class="col-md-4 text-center col-sm-6 col-xs-12">
        <div class="thumbnail product-box">
            <img src="imagens/<?php echo $produto->id; ?>.jpg" alt="website template image" />
            <div class="caption">
                <h3><a href="#"><?php echo $produto->nome; ?></a></h3>
                <p>Preço :<strong><?php echo $produto->preco; ?></strong></p>
                <p>Categoria :<strong><?php echo $produto->categoria; ?></strong></p>
                <p><a href="#">Ptional dismiss button</a></p>
                <p>Ptional dismiss button in tional dismiss button in</p>
                <p>
                    <a href="#" class="btn btn-success">Add To Cart</a>
                    <a href="#" class="btn btn-primary">See Details</a></p>
            </div>
        </div>
    </div>
	<?php
	    }         
	  }
	?>