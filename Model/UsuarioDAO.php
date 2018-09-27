<?php

namespace Model;

include_once 'BD_Connection.php';
include_once 'Usuario.php';

class UsuarioDAO extends \BD_Connection {
	public function __construct() {
	}
	
	public function salvar(\Usuario $usuario) {
		$nome = $usuario->getNome();
		$endereco = $usuario->getEndereco();
		$email = $usuario->getEmail();
		$pass = $usuario->getPass();
		
		try {
			$sql = "INSERT INTO usuario (nome, endereco, email, pass) VALUES (:nome, :endereco, :email, :pass)";
			$stmt = parent::getConnection()->prepare($sql);
			$stmt->bindValue(':nome', $nome);
			$stmt->bindValue(':endereco', $endereco);
			$stmt->bindValue(':email', $email);
			$stmt->bindValue(':pass', $pass);
			$stmt->execute();
		} catch (\Exception $e) {
			echo "Não foi possivel inserir. Erro:" . $e->getMessage();
		}
	}
	
	public function editar(\Usuario $usuario) {
		@session_start();
		$id = $_SESSION['id'];
		$nome = $usuario->getNome();
		$endereco = $usuario->getEndereco();
		$email = $usuario->getEmail();
		$pass = $usuario->getPass();
		
		try {
			$sql = "UPDATE usuario SET nome = :nome, endereco = :endereco, email = :email, pass = :pass WHERE id = :id";
			$stmt = parent::getConnection()->prepare($sql);
			$stmt->bindValue(':nome', $nome);
			$stmt->bindValue(':endereco', $endereco);
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
			$sql = "DELETE FROM usuario WHERE id = :id";
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
			$sql = "SELECT * FROM usuario WHERE email = :email AND pass = :pass";
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
				$registro=$stmt->fetch();
				$nome = $registro['nome'];
				$endereco = $registro['endereco'];
				$email = $registro['email'];
				$pass = $registro['pass'];
				$usuario = new \Usuario($nome, $endereco, $email);
				$usuario->setId($id);
				$usuario->setPass($pass);
				return $usuario;
			} else {
				return FALSE;
			}
		} catch (\Exception $e) {
			echo "Não foi possivel exibir. Erro:" . $e->getMessage();
		}
	}
}

