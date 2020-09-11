<?php

class Pessoa {

    private $id;
    private $nome;
    private $idade;
    private $endereco;
    private $cpf;
    private $telefone;

    public function __construct(int $id = -1, $nome, int $idade, $endereco, $cpf, $telefone){
        $this->id = $id;
        $this->nome = $nome;
        $this->idade = $idade;
        $this->endereco = $endereco;
        $this->cpf = $cpf;
        $this->telefone = $telefone;
    }

    public function setId(int $id) {
        $this->id= $id;
    }

    public function getId(){
        return $this->id;
    }

    public function setNome($nome) {
        $this->nome= $nome;
    }

    public function getNome() {
        return $this->nome;
    }   
    
    public function setIdade(int $idade) {
        $this->idade= $idade;
    }
    
    public function getIdade() {
        return $this->idade;
    }   

    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function setEndereco($endereco){
        $this->endereco = $endereco;
    }
    
    public function getEndereco() {
        return $this->endereco;
    } 

    public function setTelefone($telefone){
        $this->telefone = $telefone;
    }
    
    public function getTelefone() {
        return $this->telefone;
    } 
}