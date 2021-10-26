<?php

    class MoradoresDAO{

        public function inserir($objMoradores){
            try {
                $sql = "INSERT INTO moradores (nome, cpf, telefone, celular, email, senha, ativo) VALUES (:nome, :cpf, :telefone, :celular, :email, :senha, :ativo)";
                $conexao = new Conexao();
                $p = $conexao->getCon()->prepare($sql);
                $p->bindValue (":nome", $objMoradores->getNome());
                $p->bindValue (":cpf", $objMoradores->getCpf());
                $p->bindValue (":telefone", $objMoradores->getTelefone());
                $p->bindValue (":celular", $objMoradores->getCelular());
                $p->bindValue (":email", $objMoradores->getEmail());
                $p->bindValue (":senha", $objMoradores->getSenha());
                $p->bindValue (":ativo", $objMoradores->getAtivo());
                return $p->execute();
            } catch (Exception $e) {
                echo "Erro ao inserir as Informações!".$e->getMessage();
                return 0;
            }
        }

        public function alterar($objMoradores){
            try {
                $sql = "UPDATE moradores set nome = :nome, cpf = :cpf, telefone = :telefone, celular = :celular, email = :email, senha = :senha, ativo = :ativo WHERE id = :id";
                $conexao = new Conexao();
                $p = $conexao->getCon()->prepare($sql);
                $p->bindValue (":nome", $objMoradores->getNome());
                $p->bindValue (":cpf", $objMoradores->getCpf());
                $p->bindValue (":telefone", $objMoradores->getTelefone());
                $p->bindValue (":celular", $objMoradores->getCelular());
                $p->bindValue (":email", $objMoradores->getEmail());
                $p->bindValue (":senha", $objMoradores->getSenha());
                $p->bindValue (":ativo", $objMoradores->getAtivo());
                $p->bindValue(":id", $objMoradores->getId());
                return $p->execute();
            } catch (Exception $e) {
                echo "Erro ao inserir as Informações!".$e->getMessage();
                return 0;
            }
        }

        public function consultarCodigoMoradores($id){
            try{
                $sql = "SELECT * FROM moradores WHERE id = :id";
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
    
        public function consultarMoradores(){
            try{
                $sql = "SELECT * FROM moradores";
                $conexao = new Conexao();
                $p = $conexao->getCon();
                return $p->query($sql);			
            } catch (Exception $e){
                echo "Erro ao consultar! ".$e->getMessage();
                return 0;
            }
        }

        
        public function consultarNomeMorador($id){
            try{
                $sql = "SELECT m.nome 
                            FROM moradores m, endereco e
                            WHERE m.id = e.moradores_id and e.grupo = :id";
                $conexao = new Conexao();
                $p = $conexao->getCon();
                return $p->query($sql);			
            } catch (Exception $e){
                echo "Erro ao consultar! ".$e->getMessage();
                return 0;
            }
        }

        // public function redefinirMoradores($email){
        //     try{
        //         $sql = "SELECT nome, email, senha FROM moradores WHERE email = :email";
        //         $conexao = new Conexao();
        //         $p = $conexao->getCon()->prepare($sql);
        //         $p->bindValue(":email", $email);      
        //         $p->execute();	
        //         return $p->fetch();
        //     } catch (Exception $e){
        //         echo "Erro ao consultar! ".$e->getMessage();
        //         return 0;
        //    }
        // }
        
        //Select para contar os Moradores Ativos
        public function MoradoresAtivo(){
            try{
                $sql = "SELECT COUNT(*) as ativo FROM moradores
                        WHERE ativo = 'S'";
                $conexao = new Conexao();
                $p = $conexao->getCon();
                return $p->query($sql);			
            } catch (Exception $e){
                echo "Erro ao consultar! ".$e->getMessage();
                return 0;
            }
        }

        //Select para contar os Moradores Inativos
        public function MoradoresInativo(){
            try{
                $sql = "SELECT COUNT(*) as ativo FROM moradores
                        WHERE ativo = 'N'";
                $conexao = new Conexao();
                $p = $conexao->getCon();
                return $p->query($sql);			
            } catch (Exception $e){
                echo "Erro ao consultar! ".$e->getMessage();
                return 0;
            }
        }

        public function redefinirMoradores($email){
            try{
                $sql = "SELECT * FROM moradores WHERE email = :email";
                $conexao = new Conexao();
                $p = $conexao->getCon()->prepare($sql);
                $p->bindValue(":email", $email);
                $p->execute();	
                return $p->fetch();
            } catch (Exception $e){
                echo "Erro ao consultar! ".$e->getMessage();
                return 0;
            }
        }
    }



?>