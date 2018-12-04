<?php

include_once "../Model/Produto.php";
include_once "../Model/ProdutoDAO.php";

@session_start();
@$id=$_POST['id'];
@$nome=$_POST['nome'];
@$categoria=$_POST['categoria'];
@$preco=$_POST['preco'];
@$produtor=$_SESSION['id'];

$produto = new Produto($produtor, $nome, $categoria, $preco);

$produtoDAO = new ProdutoDAO();


switch ($_POST['acao']) {
	case "Cadastrar":
		try {
			$produtoDAO->salvar($produto);
			header('Location: ../View/Index.php');
		} catch (\Exception $e) {
			echo"Erro ao inserir produto" . $e->getMessage();
		}
		break;
	case "Editar":
		try {
			$produtoDAO->editar($pduto);
			header('Location: ../View/Index.php');
		} catch (\Exception $e) {
			echo"Erro ao alterar usuario" . $e->getMessage();
		}
		break;
	case "Solicitar":
		try {
			$produtoDAO->exibeum($id);
		} catch (\Exception $e) {
			echo"Erro ao alterar usuario" . $e->getMessage();
		}
		break;

}

/*	case "Editar":
		try {
			$usuarioDAO->editar($usuario);
			header('Location: ../View/Index.php');
		} catch (\Exception $e) {
			echo"Erro ao alterar usuario" . $e->getMessage();
		}
		break;
	case "Login":
		try {
			$usuarioDAO->logar($usuario);
			header('Location: ../View/Index.php');
		} catch (Exception $e) {
			echo"Erro ao tentar logar";
		}
		break;
	case "Logout":
		try {
			$usuarioDAO->deslogar($usuario);
			header('Location: ../View/Index.php');
		} catch (Exception $e) {
			echo"Erro ao tentar deslogar" . $e->getMessage();
		}
		break;
	case "Deletar":
		try {
			$usuarioDAO->deletar();
			$usuarioDAO->deslogar();
			header('Location: ../View/Index.php');
		} catch (Exception $e) {
			echo"Erro ao tentar deslogar" . $e->getMessage();
		}
		break;*/