<?php

require_once 'Produto.php';
require_once 'BD_Connection.php';

class ProdutoDAO extends \BD_Connection {
	public function __construct() {
	}
	
	public function salvar(Produto $produto) {
		$produtor = $produto->getProdutor();
		$nome = $produto->getNome();
		$categoria = $produto->getCategoria();
		$preco = $produto->getPreco();
		$imagem = $produto->getImagem();
		
		try {
			$sql = "INSERT INTO produto (produtor, nome, categoria, preco, dt_adicao, dt_modif, situacao, imagem)
					VALUES (:produtor, :nome, :categoria, :preco, NOW(), NOW(), TRUE, :imagem)";
			$stmt = parent::getConnection()->prepare($sql);
			$stmt->bindValue(':produtor', $produtor);
			$stmt->bindValue(':nome', $nome);
			$stmt->bindValue(':categoria', $categoria);
			$stmt->bindValue(':preco', $preco);
			$stmt->bindValue(':imagem', $imagem);
			$stmt->execute();
		} catch (\Exception $e) {
			echo "Não foi possivel inserir. Erro:" . $e->getMessage();
		}
	}
	
	public function editar(Produto $produto) {
		$id = $produto->getId();
		$nome = $produto->getNome();
		$categoria = $produto->getCategoria();
		$preco = $produto->getPreco();
		
		try {
			$sql = "UPDATE produto SET nome = :nome, categoria = :categoria, preco = :preco, dt_modif = NOW() WHERE id = :id";
			$stmt = parent::getConnection()->prepare($sql);
			$stmt->bindValue(':nome', $nome);
			$stmt->bindValue(':categoria', $categoria);
			$stmt->bindValue(':preco', $preco);
			$stmt->bindValue(':id', $id);
			$stmt->execute();
		} catch (\Exception $e) {
			echo "Não foi possivel atualizar. Erro:" . $e->getMessage();
		}
	}
	
	public function deletar(Produto $produto) {
		$id = $produto->getId();
		try {
			$sql = "UPDATE produto SET dt_modif = NOW(), situacao = FALSE WHERE id = :id";
			$stmt = parent::getConnection()->prepare($sql);
			$stmt->bindValue(':id', $id);
			$stmt->execute();
			
		} catch (\Exception $e) {
			echo "Não foi possivel excluir. Erro:" . $e->getMessage();
		}
	}
	
	public function exibe($id) {
		try {
			if ($id > 0) {
				$sql = "SELECT * FROM produto WHERE produtor = :iduser AND situacao = TRUE ORDER BY dt_modif DESC";
			} else {
				$sql = "SELECT * FROM produto WHERE situacao = TRUE ORDER BY dt_modif DESC";
			}
			$stmt = parent::getConnection()->prepare($sql);
			$stmt->bindValue(':iduser', $id);
			$stmt->execute();
			if ($stmt->rowCount() > 0) {
				$registro=$stmt->fetchAll(PDO::FETCH_OBJ);
				return $registro;
			} else {
				return FALSE;
			}
		} catch (\Exception $e) {
			echo "Não foi possivel exibir. Erro:" . $e->getMessage();
		}
	}
	
	public function exibeum($id) {
		try {
			$sql = "SELECT * FROM produto WHERE id = :id AND situacao = TRUE";
			$stmt = parent::getConnection()->prepare($sql);
			$stmt->bindValue(':id', $id);
			$stmt->execute();
			if ($stmt->rowCount() > 0) {
				$registro=$stmt->fetch();
				return $registro;
			} else {
				return FALSE;
			}
		} catch (\Exception $e) {
			echo "Não foi possivel exibir. Erro:" . $e->getMessage();
		}
	}
}

