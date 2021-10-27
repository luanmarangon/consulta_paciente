<?php

    class PlanosDAO{

        public function insert($objPlanos){
            try {
                $sql = "INSERT INTO planos (carteirinha, plano, Pessoas_id) VALUES (:carteirinha, :plano, :pessoasid)";
                $conexao = new Conexao();
                $p = $conexao->getCon()->prepare($sql);
                $p->bindValue (":carteirinha", $objPlanos->getCarteirinha());
                $p->bindValue (":plano", $objPlanos->getPlano());
                $p->bindValue (":pessoasid", $objPlanos->getPessoasid()->getId());
                return $p->execute();
            } catch (Exception $e) {
                echo "Erro ao inserir as Informações!".$e->getMessage();
                return 0;
            }
        }
        public function consultarCodigoPlano($id){
            try{
                $sql = "SELECT * FROM planos WHERE Pessoas_id = :id";
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