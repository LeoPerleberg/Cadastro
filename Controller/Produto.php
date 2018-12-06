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
$produto->setId($id);

$produtoDAO = new ProdutoDAO();


switch ($_POST['acao']) {
	case "Cadastrar":
		try {
			$limitar_ext="sim";
			$extensoes_validas=array(".gif",".jpg",".jpeg",".bmp",".GIF",".JPG",".JPEG",".BMP",);
			$caminho="../view/imagens";
			$limitar_tamanho="sim";
			$tamanho_bytes="200000";
			$sobrescrever="não";
			
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
			
				if (move_uploaded_file($arquivo_temporario, "../view/imagens/$nome_arquivo")) {
					echo " Upload do arquivo: ". $nome_arquivo." foi concluído com sucesso";
				} else {
					echo "Arquivo não pode ser copiado para o servidor.";
				}
			} else {
				die("Selecione o arquivo a ser enviado");
			}
			$produto->setImagem($nome_arquivo);
			
			$produtoDAO->salvar($produto);
			header('Location: ../View/Exibe.php');
		} catch (\Exception $e) {
			echo"Erro ao inserir produto" . $e->getMessage();
		}
		break;
	case "Editar":
		try {
			$produtoDAO->editar($produto);
			header('Location: ../View/Exibe.php');
		} catch (\Exception $e) {
			echo"Erro ao alterar usuario" . $e->getMessage();
		}
		break;
	case "Excluir":
		try {
			$produtoDAO->deletar($produto);
			header('Location: ../View/Exibe.php');
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