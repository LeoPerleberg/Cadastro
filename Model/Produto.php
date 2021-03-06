<?php

class Produto {
	private $id;
	private $produtor;
	private $nome;
	private $categoria;
	private $preco;
	private $medida;
	private $dt_adicao;
	private $dt_modif;
	private $situacao;
	
	public function __construct($produtor, $nome, $categoria, $preco, $medida) {
		$this->setProdutor($produtor);
		$this->setNome($nome);
		$this->setCategoria($categoria);
		$this->setPreco($preco);
		$this->setMedida($medida);
	}
	
	public function getId() {
		return $this->id;
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function getProdutor() {
		return $this->produtor;
	}

	public function setProdutor($produtor) {
		$this->produtor = $produtor;
	}

	public function getNome() {
		return $this->nome;
	}

	public function setNome($nome) {
		$this->nome = $nome;
	}

	public function getCategoria() {
		return $this->categoria;
	}

	public function setCategoria($categoria) {
		$this->categoria = $categoria;
	}
	
	public function getPreco() {
		return $this->preco;
	}
	
	public function setPreco($preco) {
		$this->preco = $preco;
	}
	
	public function getMedida() {
		return $this->medida;
	}
	
	public function setMedida($medida) {
		$this->medida = $medida;
	}

	public function getDt_adicao() {
		return $this->dt_adicao;
	}

	public function setDt_adicao($dt_adicao) {
		$this->dt_adicao = $dt_adicao;
	}

	public function getDt_modif() {
		return $this->dt_modif;
	}

	public function setDt_modif($dt_modif) {
		$this->dt_modif = $dt_modif;
	}
	
	public function getSituacao() {
		return $this->situacao;
	}
	
	public function setSituacao($situacao) {
		$this->situacao = $situacao;
	}




}

