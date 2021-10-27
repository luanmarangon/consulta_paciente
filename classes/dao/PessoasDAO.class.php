<?php

    class PessoasDAO{

        public function insert($objPessoas){
            try {
                $sql = "INSERT INTO pessoas (nome, cpf, dtnasc, mae, logradouro, numero, compl, bairro, cidade, uf, cep) VALUES (:nome, :cpf, :dtnasc, :mae, :logradouro, :numero, :compl, :bairro, :cidade, :uf, :cep)";
                $conexao = new Conexao();
                $p = $conexao->getCon()->prepare($sql);
                $p->bindValue (":nome", $objPessoas->getNome());
                $p->bindValue (":cpf", $objPessoas->getCpf());
                $p->bindValue (":dtnasc", $objPessoas->getDtnasc());
                $p->bindValue (":mae", $objPessoas->getMae());
                $p->bindValue (":logradouro", $objPessoas->getLogradouro());
                $p->bindValue (":numero", $objPessoas->getNumero());
                $p->bindValue (":compl", $objPessoas->getCompl());
                $p->bindValue (":bairro", $objPessoas->getBairro());
                $p->bindValue (":cidade", $objPessoas->getCidade());
                $p->bindValue (":uf", $objPessoas->getUf());
                $p->bindValue (":cep", $objPessoas->getCep());
                return $p->execute();
            } catch (Exception $e) {
                echo "Erro ao inserir as Informações!".$e->getMessage();
                return 0;
            }
        }
        public function consultarCodigoPessoas($id){
            try{
                $sql = "SELECT * FROM pessoas WHERE id = :id";
                $conexao = new Conexao();
                $p = $conexao->getCon()->prepare($sql);
                $p->bindValue(":id", $id);
                $p->execute();	
                return $p->fetch();
            } catch (Exception $e){
                echo "Erro ao consultar! ".$e->getMessage();
                return 0;
            }
        }
        public function consultarPessoas(){
            try{
                $sql = "SELECT * FROM pessoas";
                $conexao = new Conexao();
                $p = $conexao->getCon();
                return $p->query($sql);			
            } catch (Exception $e){
                echo "Erro ao consultar! ".$e->getMessage();
                return 0;
            }
        }
    }
?>