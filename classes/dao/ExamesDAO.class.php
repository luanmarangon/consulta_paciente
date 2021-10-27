<?php

    class ExamesDAO{

        public function insert($objExames){
            try {
                $sql = "INSERT INTO exames (data, exame, medico, laboratorio, Pessoas_id) VALUES (:data, :exame, :medico, :laboratorio, :pessoasid)";
                $conexao = new Conexao();
                $p = $conexao->getCon()->prepare($sql);
                $p->bindValue (":data", $objExames->getData());
                $p->bindValue (":exame", $objExames->getExame());
                $p->bindValue (":medico", $objExames->getMedico());
                $p->bindValue (":laboratorio", $objExames->getLaboratorio());
                $p->bindValue (":pessoasid", $objExames->getPessoasid()->getId());
                return $p->execute();
            } catch (Exception $e) {
                echo "Erro ao inserir as Informações!".$e->getMessage();
                return 0;
            }
        }
        public function consultarCodigoExame($id){
            try{
                $sql = "SELECT * FROM exames WHERE Pessoas_id = :id";
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