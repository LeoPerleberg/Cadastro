<?php

use Model\UsuarioDAO;

include_once "../Model/Usuario.php";
include_once "../Model/UsuarioDAO.php";

@$nome=$_POST['nome'];
@$sobrenome=$_POST['sobrenome'];
@$whatsapp=$_POST['whatsapp'];
@$celular=$_POST['celular'];
@$endereco=$_POST['endereco'];
@$cidade=$_POST['cidade'];
@$estado=$_POST['estado'];
@$email=$_POST['email'];
@$pass=md5($_POST['pass']);

$usuario = new Usuario($nome, $sobrenome, $whatsapp, $celular, $endereco, $cidade, $estado, $email);
$usuario->setPass($pass);

$usuarioDAO = new UsuarioDAO();

if ($_POST['acao'] == NULL) {
	header('Location: ../View/Index.php');
}

switch ($_POST['acao']) {
	case "Cadastrar":
		try {
			$usuarioDAO->salvar($usuario);
			echo("Usuario inserido com sucesso");
			header('Location: ../View/Index.php');
		} catch (\Exception $e) {
			echo"Erro ao inserir usuario" . $e->getMessage();
		}
		break;
	case "Editar":
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
	case "Deletar perfil":
		try {
			$usuarioDAO->deletar();
			$usuarioDAO->deslogar();
			header('Location: ../View/Index.php');
		} catch (Exception $e) {
			echo"Erro ao tentar deslogar" . $e->getMessage();
		}
		break;
}