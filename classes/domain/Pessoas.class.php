<?php

    class Pessoas{
        
        private $id;
        private $nome;
        private $cpf;
        private $dtnasc;
        private $mae;
        private $logradouro;
        private $numero;
        private $compl;
        private $bairro;
        private $cidade;
        private $uf;
        private $cep;

        public function __construct($nome, $cpf, $dtnasc, $mae, $logradouro, $numero, $compl, $bairro, $cidade, $uf, $cep)
        {
            $this->nome = $nome;
            $this->cpf = $cpf;
            $this->dtnasc = $dtnasc;
            $this->mae = $mae;
            $this->logradouro = $logradouro;
            $this->numero = $numero;
            $this->compl = $compl;
            $this->bairro = $bairro;
            $this->cidade = $cidade;
            $this->uf = $uf;
            $this->cep = $cep;
        }
        
        public function getId(){
            return $this->id;
        }
        public function setID($id){
            $this->id = $id;
        }
        public function getNome(){
            return $this->nome;
        }
        public function setNome($nome){
            $this->nome = $nome;
        }
        public function getCpf(){
            return $this->cpf;
        }
        public function setCpf($cpf){
            $this->cpf = $cpf;
        }
        public function getDtnasc(){
            return $this->dtnasc;
        }
        public function setDtnasc($dtnasc){
            $this->dtnasc = $dtnasc;
        }
        public function getMae(){
            return $this->mae;
        }
        public function setMae($mae){
            $this->mae = $mae;
        }
        public function getLogradouro(){
            return $this->logradouro;
        }
        public function setLogradouro($logradouro){
            $this->logradouro = $logradouro;
        }
        public function getNumero(){
            return $this->numero;
        }
        public function setNumero($numero){
            $this->numero = $numero;
        }
        public function getCompl(){
            return $this->compl;
        }
        public function setCompl($compl){
            $this->compl = $compl;
        }
        public function getBairro(){
            return $this->bairro;
        }
        public function setBairro($bairro){
            $this->bairro = $bairro;
        }
        public function getCidade(){
            return $this->cidade;
        }
        public function setCidade($cidade){
            $this->cidade = $cidade;
        }
        public function getUf(){
            return $this->uf;
        }
        public function setUf($uf){
            $this->uf = $uf;
        }
        public function getCep(){
            return $this->cep;
        }
        public function setCep($cep){
            $this->cep = $cep;
            }
}
