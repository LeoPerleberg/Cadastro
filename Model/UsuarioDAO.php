<?php

namespace Model;

use PDO;

include_once 'BD_Connection.php';
include_once 'Usuario.php';

class UsuarioDAO extends \BD_Connection {
	public function __construct() {
	}
	
	public function salvar(\Usuario $usuario) {
		$nome = $usuario->getNome();
		$sobrenome = $usuario->getSobrenome();
		$whatsapp = $usuario->getWhatsapp();
		$celular = $usuario->getCelular();
		$endereco = $usuario->getEndereco();
		$cidade = $usuario->getCidade();
		$estado = $usuario->getEstado();
		$email = $usuario->getEmail();
		$pass = $usuario->getPass();
		
		try {
			$sql = "INSERT INTO usuario (nome, sobrenome, whatsapp, celular, endereco, cidade, estado, email, pass, situacao)
					VALUES (:nome, :sobrenome, :whatsapp, :celular, :endereco, :cidade, :estado, :email, :pass, TRUE)";
			$stmt = parent::getConnection()->prepare($sql);
			$stmt->bindValue(':nome', $nome);
			$stmt->bindValue(':sobrenome', $sobrenome);
			$stmt->bindValue(':whatsapp', $whatsapp);
			$stmt->bindValue(':celular', $celular);
			$stmt->bindValue(':endereco', $endereco);
			$stmt->bindValue(':cidade', $cidade);
			$stmt->bindValue(':estado', $estado);
			$stmt->bindValue(':email', $email);
			$stmt->bindValue(':pass', $pass);
			$stmt->execute();
			$usuarioDAO = new UsuarioDAO();
			$usuarioDAO->logar($usuario);
		} catch (\Exception $e) {
			echo "Não foi possivel inserir. Erro:" . $e->getMessage();
		}
	}
	
	public function editar(\Usuario $usuario) {
		@session_start();
		$id = $_SESSION['id'];
		$nome = $usuario->getNome();
		$sobrenome = $usuario->getSobrenome();
		$whatsapp = $usuario->getWhatsapp();
		$celular = $usuario->getCelular();
		$endereco = $usuario->getEndereco();
		$cidade = $usuario->getCidade();
		$estado = $usuario->getEstado();
		$email = $usuario->getEmail();
		$pass = $usuario->getPass();
		
		try {
			$sql = "UPDATE usuario SET nome = :nome, sobrenome = :sobrenome, whatsapp = :whatsapp, celular = :celular, endereco = :endereco, cidade = :cidade, estado = :estado, email = :email, pass = :pass WHERE id = :id";
			$stmt = parent::getConnection()->prepare($sql);
			$stmt->bindValue(':nome', $nome);
			$stmt->bindValue(':sobrenome', $sobrenome);
			$stmt->bindValue(':whatsapp', $whatsapp);
			$stmt->bindValue(':celular', $celular);
			$stmt->bindValue(':endereco', $endereco);
			$stmt->bindValue(':cidade', $cidade);
			$stmt->bindValue(':estado', $estado);
			$stmt->bindValue(':email', $email);
			$stmt->bindValue(':pass', $pass);
			$stmt->bindValue(':id', $id);
			$stmt->execute();
		} catch (\Exception $e) {
			echo "Não foi possivel atualizar. Erro:" . $e->getMessage();
		}
	}
	
	public function deletar() {
		@session_start();
		$id = $_SESSION['id'];
		try {
			$sql = "UPDATE usuario SET situacao = FALSE WHERE id = :id";
			$stmt = parent::getConnection()->prepare($sql);
			$stmt->bindValue(':id', $id);
			$stmt->execute();
			
		} catch (\Exception $e) {
			echo "Não foi possivel excluir. Erro:" . $e->getMessage();
		}
	}
	
	public function logar(\Usuario $usuario) {
		session_start();
		$email = $usuario->getEmail();
		$pass = $usuario->getPass();
		
		try {
			$sql = "SELECT * FROM usuario WHERE email = :email AND pass = :pass AND situacao = TRUE";
			$stmt = parent::getConnection()->prepare($sql);
			$stmt->bindValue(':email', $email);
			$stmt->bindValue(':pass', $pass);
			$stmt->execute();
			if ($stmt->rowCount() > 0) {
				$registro=$stmt->fetch();
				$_SESSION['id'] = $registro['id'];
				$_SESSION['nome'] = $registro['nome'];
			} else {
				return false;
			}
		} catch (\Exception $e) {
			echo "Não foi possivel logar. Erro:" . $e->getMessage();
		}	
	}
	
	Public function deslogar() {
		@session_start();
		unset($_SESSION['id']);
		unset($_SESSION['nome']);
		session_destroy();
	}
	
	public function exibe() {
		@session_start();
		$id = $_SESSION['id'];
		try {
			$sql = "SELECT * FROM usuario WHERE id = :id";
			$stmt = parent::getConnection()->prepare($sql);
			$stmt->bindValue(':id', $id);
			$stmt->execute();
			if ($stmt->rowCount() > 0) {
				$registro=$stmt->fetch(PDO::FETCH_OBJ);

				return $registro;
			} else {
				return FALSE;
			}
		} catch (\Exception $e) {
			echo "Não foi possivel exibir. Erro:" . $e->getMessage();
		}
	}
}

