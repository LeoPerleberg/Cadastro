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
@session_start();


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
	case "Adcionar imagem":
		try {
			$limitar_ext="sim";
			$extensoes_validas=array(".gif",".jpg",".jpeg",".bmp",".GIF",".JPG",".JPEG",".BMP",);
			$caminho="../view/imagens_perfil";
			$limitar_tamanho="sim";
			$tamanho_bytes="10000000";
			$sobrescrever="sim";
			
			$nome_arquivo=$_FILES['arquivo']['name'];
			$tamanho_arquivo=$_FILES['arquivo']['size'];
			$arquivo_temporario=$_FILES['arquivo']['tmp_name'];
			
			if (!empty($nome_arquivo)) {
				if($sobrescrever=="não" && file_exists("$caminho/$nome_arquivo"))
					die("Arquivo já existe");
	
				if($limitar_tamanho=="sim" && ($tamanho_arquivo > $tamanho_bytes))
					die("Arquivo deve ter o no máximo $tamanho_bytes bytes");
		
				$ext = strrchr($nome_arquivo,'.');
				if (($limitar_ext == "sim") && !in_array($ext,$extensoes_validas))
					die("Extensão de arquivo inválida para upload");
			
				$novo_nome = @$_SESSION['id'];
					
				if (move_uploaded_file($arquivo_temporario, "../view/imagens_perfil/$novo_nome.jpg")) {
					echo " Upload do arquivo: ". $nome_arquivo." foi concluído com sucesso";
				} else {
					echo "Arquivo não pode ser copiado para o servidor.";
				}
			} else {
				die("Selecione o arquivo a ser enviado");
			}
			header('Location: ../View/Perfil.php');
		} catch (Exception $e) {
			echo"Erro ao tentar carregar a imagem" . $e->getMessage();
		}
		break;
}