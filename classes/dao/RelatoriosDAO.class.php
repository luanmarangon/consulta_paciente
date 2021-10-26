<?php

    class RelatoriosDAO{

        //  Select para retornar os Ramais de Determinado Condomino;
        public function relcondominio($id){
            try{
                $sql =  "SELECT r.ramal, r.alocado, e.logradouro, e.numero, e.cidade, c.nome, m.nome, m.celular 
                FROM ramais r, endereco e, condominios c, moradores m 
                WHERE e.condominios_id = c.id and c.id = :cond and m.id = e.moradores_id and r.endereco_grupo = e.grupo";
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
        //  Select para retornar Morador com os endereços, ativos.
        public function relClientes(){
            try {
                $sql = "SELECT m.nome, m.celular, e.grupo, c.nome AS Condominio 
                        FROM condominios c, endereco e, moradores m 
                        WHERE m.ativo = 'S' and m.id = e.moradores_id and e.condominios_id = c.id 
                        ORDER BY m.nome";
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
