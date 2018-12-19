<?php
	@session_start();
	if (@$_SESSION['id'] == NULL) {
		$logado = 0;
	} else {
		$logado = 1;
	}
?>
<nav class="navbar navbar-expand-md navbar-dark bg-dark sidebarNavigation" data-sidebarClass="navbar-dark bg-dark">
    <div class="container-fluid">
    	<img class="navbar-brand" src="imagens_sistema/Logo.png" height="40px">
    	<a class="navbar-brand" href="Perfil.php"> <?php if ($logado == 1) {echo $_SESSION['nome'];} ?> </a>
        <button class="navbar-toggler leftNavbarToggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="nav navbar-nav nav-flex-icons ml-auto">
                <li class="nav-item">
                    <a class="btn btn-dark" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-dark" href="Contate.php">Fale conosco</a>
                </li>
                <?php if (@$logado == 0) {
                	echo '
	                    <li class="nav-item">
							<button type="button" class="btn btn-dark" data-toggle="modal" data-target="#modalLogin">
							    Login
							</button>
	                    </li>
	                    <li class="nav-item">
							<button type="button" class="btn btn-dark" data-toggle="modal" data-target="#modalCadastro">
							    Cadastro
							</button>
	                    </li>
                	';
                	require_once 'Login.php';
                	require_once 'Cadastro.php';
                }
                if (@$logado == 1) {
	            	echo '
	                    <li class="nav-item">
	                        <a class="btn btn-dark" href="Perfil.php">Perfil</a>
	                    </li>
	                    <li class="nav-item">
	                        <a class="btn btn-dark" href="Exibe.php">Meus Produtos</a>
	                    </li>
	                    <li class="nav-item">
							<button type="button" class="btn btn-dark" data-toggle="modal" data-target="#modalCadastraProduto">
							    Cadastro de produtos
							</button>
	                    </li>
						<li class="nav-item">
							<form action="../Controller/Usuario.php" method="POST">
								<button class="btn btn-outline-danger" type="submit" name="acao" value="Logout">Logout</button>
							</form>
						</li>
                	';
                	require_once 'CadastraProduto.php';
	            } ?>

            </ul>
        </div>
    </div>
</nav>