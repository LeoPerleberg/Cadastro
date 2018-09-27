<?php

use Model\UsuarioDAO;

include_once "../Model/Usuario.php";
include_once "../Model/UsuarioDAO.php";

@$id=$_POST['id'];
@$nome=$_POST['nome'];
@$endereco=$_POST['endereco'];
@$email=$_POST['email'];
@$pass=md5($_POST['pass']);

$usuario = new Usuario($nome, $endereco, $email);
$usuario->setId($id);
$usuario->setPass($pass);

$usuarioDAO = new UsuarioDAO();


switch ($_POST['acao']) {
	case "Cadastrar":
		try {
			$usuarioDAO->salvar($usuario);
			echo("Usuario inserido com sucesso");
		} catch (\Exception $e) {
			echo"Erro ao inserir usuario" . $e->getMessage();
		}
		break;
	case "Editar":
		try {
			$usuarioDAO->editar($usuario);
			header('Location: ../View/Exibe.php');
		} catch (\Exception $e) {
			echo"Erro ao alterar usuario" . $e->getMessage();
		}
		break;
	case "Login":
		try {
			$usuarioDAO->logar($usuario);
			header('Location: ../View/Exibe.php');
		} catch (Exception $e) {
			echo"Erro ao tentar logar" . $e->getMessage();
		}
		break;
	case "Logout":
		try {
			$usuarioDAO->deslogar($usuario);
			header('Location: ../View/index.php');
		} catch (Exception $e) {
			echo"Erro ao tentar deslogar" . $e->getMessage();
		}
		break;
	case "Deletar":
		try {
			$usuarioDAO->deletar();
			$usuarioDAO->deslogar();
			header('Location: ../View/index.php');
		} catch (Exception $e) {
			echo"Erro ao tentar deslogar" . $e->getMessage();
		}
		break;
}