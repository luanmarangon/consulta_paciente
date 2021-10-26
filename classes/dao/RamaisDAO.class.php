<?php

    class RamaisDAO{
        
        public function inserir($objRamais){
            try {
                $sql = "INSERT INTO ramais (ramal, senha, alocado, endereco_grupo) VALUES (:ramal, :senha, :alocado, :enderecogrupo)";
                $conexao = new Conexao();
                $p = $conexao->getCon()->prepare($sql);
                $p->bindValue (":ramal", $objRamais->getRamal());
                $p->bindValue (":senha", $objRamais->getSenha());
                $p->bindValue (":alocado", $objRamais->getAlocado());
                $p->bindValue(":enderecogrupo", $objRamais->getEnderecogrupo()->getGrupo());
                // $p->bindValue (":enderecogrupo", $objRamais->getEnderecogrupo());
                return $p->execute();
            } catch (Exception $e) {
                echo "Erro ao inserir as Informações!".$e->getMessage();
                return 0;
            }
        }

        public function alterar($objRamais){
            try{
                $sql = "UPDATE ramais set ramal = :ramal, senha = :senha, alocado = :alocado, endereco_grupo = :enderecogrupo WHERE id = :id";
                $conexao = new Conexao();
                $p = $conexao->getCon()->prepare($sql);
                $p->bindValue(":ramal", $objRamais->getNome());
                $p->bindValue(":senha", $objRamais->getPrefixo());
                $p->bindValue(":alocado", $objRamais->getContato());
                $p->bindValue(":enderecogrupo", $objRamais->getTelefone());
                $p->bindValue(":id", $objRamais->getId());
                return $p->execute();			
            } catch (Exception $e){
                echo "Erro ao alterar! ".$e->getMessage();
                return 0;
            }
        }

        public function totalRamais(){
            try{
                $sql = "SELECT COUNT(*) as ramais FROM ramais";
                $conexao = new Conexao();
                $p = $conexao->getCon();
                return $p->query($sql);			
            } catch (Exception $e){
                echo "Erro ao consultar! ".$e->getMessage();
                return 0;
            }
        }

        public function consultarCodigoRamais($id){
            try{
                $sql = "SELECT * FROM ramais r, endereco e, moradores m
                        WHERE r.endereco_grupo = e.grupo and e.moradores_id = m.id and m.id = :id";
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

        public function consultarRamais(){
            try{
                $sql = "SELECT * FROM Ramais";
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