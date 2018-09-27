<?php

class Usuario {
	private $id = null;
	private $nome;
	private $endereco;
	private $email;
	private $pass;
	
	public function __construct($nome, $endereco, $email) {
		$this->setNome($nome);
		$this->setEndereco($endereco);
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

	public function getEndereco() {
		return $this->endereco;
	}

	public function setEndereco($endereco) {
		$this->endereco = $endereco;
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


}

