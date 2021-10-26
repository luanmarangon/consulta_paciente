<?php

    class AreacomunsDAO{

        public function inserir($objAreaComuns){
            try {
                $sql = "INSERT INTO areacomuns (ramal, senha, areacomum, condominios_id) VALUES (:ramal, :senha, :areacomum, :condominiosid)";
                $conexao = new Conexao();
                $p = $conexao->getCon()->prepare($sql);
                $p->bindValue (":ramal", $objAreaComuns->getRamal());
                $p->bindValue (":senha", $objAreaComuns->getSenha());
                $p->bindValue (":areacomum", $objAreaComuns->getAreacomum());
                $p->bindValue (":condominiosid", $objAreaComuns->getCondominiosid());
                return $p->execute();
            } catch (Exception $e) {
                echo "Erro ao inserir as Informações!".$e->getMessage();
                return 0;
            }
        }

        public function portarias(){
            try{
                $sql = "SELECT a.areacomum, a.ramal, c.nome FROM areacomuns a, condominios c WHERE a.areacomum LIKE 'Portaria%' and c.id = a.condominios_id";
                // $sql = "SELECT * FROM areacomuns WHERE areacomum LIKE 'Portaria%'";
                $conexao = new Conexao();
                $p = $conexao->getCon();
                return $p->query($sql);			
            } catch (Exception $e){
                echo "Erro ao consultar! ".$e->getMessage();
                return 0;
            }
        }
        public function areacomum($id){
            try{
                $sql = "SELECT * FROM areacomuns where condominios_id = :id";
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

        
    }



?>