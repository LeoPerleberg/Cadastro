<?php

class Usuario {
	private $id = null;
	private $nome;
	private $sobrenome;
	private $whatsapp;
	private $celular;
	private $endereco;
	private $cidade;
	private $estado;
	private $email;
	private $pass;
	private $situacao;
	
	public function __construct($nome, $sobrenome, $whatsapp, $celular, $endereco, $cidade, $estado, $email) {
		$this->setNome($nome);
		$this->setSobrenome($sobrenome);
		$this->setWhatsapp($whatsapp);
		$this->setCelular($celular);
		$this->setEndereco($endereco);
		$this->setCidade($cidade);
		$this->setEstado($estado);
		$this->setEmail($email);
		
	}
	public function getId() {
		return $this->id;
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function getNome() {
		return $this->nome;
	}

	public function setNome($nome) {
		$this->nome = $nome;
	}

	public function getSobrenome() {
		return $this->sobrenome;
	}

	public function setSobrenome($sobrenome) {
		$this->sobrenome = $sobrenome;
	}

	public function getWhatsapp() {
		return $this->whatsapp;
	}

	public function setWhatsapp($whatsapp) {
		$this->whatsapp = $whatsapp;
	}

	public function getCelular() {
		return $this->celular;
	}

	public function setCelular($celular) {
		$this->celular = $celular;
	}

	public function getEndereco() {
		return $this->endereco;
	}

	public function setEndereco($endereco) {
		$this->endereco = $endereco;
	}

	public function getCidade() {
		return $this->cidade;
	}

	public function setCidade($cidade) {
		$this->cidade = $cidade;
	}

	public function getEstado() {
		return $this->estado;
	}

	public function setEstado($estado) {
		$this->estado = $estado;
	}

	public function getEmail() {
		return $this->email;
	}

	public function setEmail($email) {
		$this->email = $email;
	}

	public function getPass() {
		return $this->pass;
	}

	public function setPass($pass) {
		$this->pass = $pass;
	}
	
	public function getSituacao() {
		return $this->situacao;
	}

	public function setSituacao($situacao) {
		$this->situacao = $situacao;
	}


}

