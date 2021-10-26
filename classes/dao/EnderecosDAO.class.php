<?php

    class EnderecosDAO{

        public function inserir($objEnderecos){
            try {
                $sql = "INSERT INTO endereco ( grupo, logradouro, numero, complemento, cidade, moradores_id, condominios_id) VALUES (:grupo, :logradouro, :numero, :complemento, :cidade, :moradores_id, :condominios_id)";
                $conexao = new Conexao();
                $p = $conexao->getCon()->prepare($sql);
                $p->bindValue(":grupo", $objEnderecos->getGrupo());
                $p->bindValue(":logradouro", $objEnderecos->getLogradouro());
                $p->bindValue(":numero", $objEnderecos->getNumero());
                $p->bindValue(":complemento", $objEnderecos->getComplemento());
                $p->bindValue(":cidade", $objEnderecos->getCidade());
                $p->bindValue(":moradores_id", $objEnderecos->getMoradoresid()->getId());
                $p->bindValue(":condominios_id", $objEnderecos->getCondominiosid()->getId());
                return $p->execute();
            } catch (Exception $e) {
                echo "Erro ao inserir as Informações!".$e->getMessage();
                return 0;
            }
        }

        public function consultarCodigoEndereços($id){
            try{
                $sql = "SELECT * FROM endereco WHERE moradores_id = :id";
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

        public function consultarMoradorEndereco($id){
            try{
                $sql = "SELECT e.grupo, e.logradouro, e.numero, e.complemento, e.cidade, c.nome AS Condominio FROM endereco e, condominios c WHERE c.id = e.condominios_id and moradores_id = :id";
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

        public function qtdEndereco($id){
            try{
                $sql = "SELECT COUNT(*) as grupo FROM endereco WHERE moradores_id = :id";
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

        public function consultarEnderecos(){
            try{
                $sql = "SELECT * FROM Endereco";
                $conexao = new Conexao();
                $p = $conexao->getCon();
                return $p->query($sql);			
            } catch (Exception $e){
                echo "Erro ao consultar! ".$e->getMessage();
                return 0;
            }
        }
        
        public function consultarDadosEndereco($id){
            try{
                $sql = "SELECT m.nome AS Morador, e.logradouro AS Logradouro, e.numero AS Numero, e.complemento AS Complemento, e.cidade AS Cidade, e.grupo AS Grupo, c.nome AS Condominio
                        FROM moradores m, endereco e, condominios c
                        WHERE m.id = e.moradores_id and c.id = e.condominios_id and e.grupo = :id";
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
        // public function consultarNomeMorador($id){
        //     try{
        //         $sql = "SELECT m.nome, e.grupo 
        //                     FROM moradores m, endereco e
        //                     WHERE m.id = e.moradores_id and e.grupo = :id";
        //         $conexao = new Conexao();
        //         $p = $conexao->getCon();
        //         return $p->query($sql);			
        //     } catch (Exception $e){
        //         echo "Erro ao consultar! ".$e->getMessage();
        //         return 0;
        //     }
        // }


    }



?>