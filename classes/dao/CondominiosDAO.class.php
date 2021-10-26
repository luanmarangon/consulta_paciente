<?php

    class CondominiosDAO{

        public function inserir($objCondominios){
            try {
                $sql = "INSERT INTO condominios (nome, prefixo, contato, telefone, celular, anexo, ativo) VALUES (:nome, :prefixo, :contato, :telefone, :celular, :anexo, :ativo)";
                $conexao = new Conexao();
                $p = $conexao->getCon()->prepare($sql);
                $p->bindValue (":nome", $objCondominios->getNome());
                $p->bindValue (":prefixo", $objCondominios->getPrefixo());
                $p->bindValue (":contato", $objCondominios->getContato());
                $p->bindValue (":telefone", $objCondominios->getTelefone());
                $p->bindValue (":celular", $objCondominios->getCelular());
                $p->bindValue (":anexo", $objCondominios->getAnexo());
                $p->bindValue (":ativo", $objCondominios->getAtivo());
                return $p->execute();
            } catch (Exception $e) {
                echo "Erro ao inserir as Informações!".$e->getMessage();
                return 0;
            }
        }

        public function alterar($objCondominios){
            try{
                $sql = "UPDATE condominios set nome = :nome, prefixo = :prefixo, contato = :contato, telefone = :telefone, celular = :celular, anexo = :anexo WHERE id = :id";
                $conexao = new Conexao();
                $p = $conexao->getCon()->prepare($sql);
                $p->bindValue(":nome", $objCondominios->getNome());
                $p->bindValue(":prefixo", $objCondominios->getPrefixo());
                $p->bindValue(":contato", $objCondominios->getContato());
                $p->bindValue(":telefone", $objCondominios->getTelefone());
                $p->bindValue(":celular", $objCondominios->getCelular());
                $p->bindValue(":anexo", $objCondominios->getAnexo());
                // $p->bindValue(":ativo", $objCondominios->getAtivo());
                $p->bindValue(":id", $objCondominios->getId());
                return $p->execute();			
            } catch (Exception $e){
                echo "Erro ao alterar! ".$e->getMessage();
                return 0;
            }
        }

        public function condominioativo($objUsers){
            try{
                $sql = "UPDATE condominios set ativo = :ativo WHERE id = :id";
                $conexao = new Conexao();
                $p = $conexao->getCon()->prepare($sql);
                $p->bindValue(":ativo", $objUsers->getAtivo());
                $p->bindValue(":id", $objUsers->getId());
                return $p->execute();			
            } catch (Exception $e){
                echo "Erro ao alterar! ".$e->getMessage();
                return 0;
            }
        }

        public function consultarCodigoCondominios($id){
            try{
                $sql = "SELECT * FROM condominios WHERE id = :id";
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
    
        public function consultarCondominios(){
            try{
                $sql = "SELECT * FROM condominios";
                $conexao = new Conexao();
                $p = $conexao->getCon();
                return $p->query($sql);			
            } catch (Exception $e){
                echo "Erro ao consultar! ".$e->getMessage();
                return 0;
            }
        }
        //contar endereços condominios
        public function totalRamais($id){
            try{
                $sql = "SELECT COUNT(condominios_id) FROM endereco WHERE condominios_id = :id";
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
        //Select para retornar a quantidade de Ramais por condominos
        public function ramaisCondominios(){
            try {
                $sql = "SELECT COUNT(r.endereco_grupo) as ramais, c.nome FROM ramais r, endereco e, condominios c WHERE r.endereco_grupo = e.grupo and e.condominios_id = c.id GROUP BY c.nome";
                $conexao = new Conexao();
                $p = $conexao->getCon()->prepare($sql);
                $p->execute();
                return $p->fetch();
            } catch (Exception $e) {
                echo "Erro ao consultar! ".$e->getMessage();
                return 0;
            }
        }
        public function consultarCond($condnome){
            try{
                $sql = "SELECT * from condominios WHERE nome != :condnome";
                $conexao = new Conexao();
                $p = $conexao->getCon()->prepare($sql);
                $p->bindValue(":condnome", $condnome);
                $p->execute();	
                return $p->fetch();
            } catch (Exception $e){
                echo "Erro ao consultar! ".$e->getMessage();
                return 0;
            }
        }
        public function consultaPrefixo(){
            try {
                $sql = "SELECT * FROM condominios WHERE prefixo=(SELECT max(prefixo) FROM condominios)";
                $conexao = new Conexao();
                $p = $conexao->getCon()->prepare($sql);
                $p->execute();
                return $p->fetch();
            } catch (Exception $e) {
                echo "Erro ao consultar! ".$e->getMessage();
                return 0;
            }
        }
        //Condominios Ativos 
        public function CondominiosAtivo(){
            try{
                $sql = "SELECT COUNT(*) as ativo FROM condominios
                        WHERE ativo = 'S'";
                $conexao = new Conexao();
                $p = $conexao->getCon();
                return $p->query($sql);			
            } catch (Exception $e){
                echo "Erro ao consultar! ".$e->getMessage();
                return 0;
            }
        }
        //Condominios Inativos 
        public function CondominiosInativo(){
            try{
                $sql = "SELECT COUNT(*) as ativo FROM condominios
                        WHERE ativo = 'N'";
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