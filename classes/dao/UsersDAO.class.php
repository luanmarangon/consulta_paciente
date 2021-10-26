<?php

    class UsersDAO{

        public function inserir($objUsers){
            try {
                $sql = "INSERT INTO users (login, senha, email, nome, perfil, ativo) VALUES (:login, :senha, :email, :nome, :perfil, :ativo)";
                $conexao = new Conexao();
                $p = $conexao->getCon()->prepare($sql);
                $p->bindValue (":login", $objUsers->getLogin());
                $p->bindValue (":senha", md5($objUsers->getSenha()));
                $p->bindValue (":email", $objUsers->getEmail());
                $p->bindValue (":nome", $objUsers->getNome());
                $p->bindValue (":perfil", $objUsers->getPerfil());
                $p->bindValue (":ativo", $objUsers->getAtivo());
                return $p->execute();
            } catch (Exception $e) {
                echo "Erro ao inserir as Informações!".$e->getMessage();
                return 0;
            }
        }

        public function alterar($objUsers){
            try{
                $sql = "UPDATE users set login = :login, senha = :senha, email = :email, perfil = :perfil WHERE id = :id";
                $conexao = new Conexao();
                $p = $conexao->getCon()->prepare($sql);
                $p->bindValue(":login", $objUsers->getLogin());
                $p->bindValue(":senha", $objUsers->getSenha());
                $p->bindValue(":email", $objUsers->getEmail());
                $p->bindValue(":perfil", $objUsers->getPerfil());
                $p->bindValue(":id", $objUsers->getId());
                return $p->execute();			
            } catch (Exception $e){
                echo "Erro ao alterar! ".$e->getMessage();
                return 0;
            }
        }

        public function newsenha($objUsers){
            try{
                $sql = "UPDATE users set senha = :senha WHERE id = :id";
                $conexao = new Conexao();
                $p = $conexao->getCon()->prepare($sql);
                $p->bindValue(":senha", $objUsers->getSenha());
                $p->bindValue(":id", $objUsers->getId());
                return $p->execute();			
            } catch (Exception $e){
                echo "Erro ao alterar! ".$e->getMessage();
                return 0;
            }
        }

        public function inativar($objUsers){
            try{
                $sql = "UPDATE users set ativo = :ativo WHERE id = :id";
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
        public function ativar($objUsers){
            try{
                $sql = "UPDATE users set ativo = :ativo WHERE id = :id";
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

        public function consultarCodigoUsers($id){
            try{
                $sql = "SELECT * FROM users WHERE id = :id";
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
    
        public function consultarUsers(){
            try{
                $sql = "SELECT * FROM users";
                $conexao = new Conexao();
                $p = $conexao->getCon();
                return $p->query($sql);			
            } catch (Exception $e){
                echo "Erro ao consultar! ".$e->getMessage();
                return 0;
            }
        }

        public function logarUsers($login, $senha){
            try{
                $sql = "SELECT * FROM users WHERE login = :login AND senha = :senha";
                $conexao = new Conexao();
                $p = $conexao->getCon()->prepare($sql);
                $p->bindValue(":login", $login);
                $p->bindValue(":senha", md5($senha));
                $p->execute();		
            } catch (Exception $e){
                echo "Erro ao consultar! ".$e->getMessage();
                return 0;
            }
        }



        // public function logarUsers($login, $senha){
        //     try{
        //         $sql = "SELECT * FROM users WHERE login = :login AND senha = :senha";
        //         $conexao = new Conexao();
        //         $p = $conexao->getCon()->prepare($sql);
        //         $p->bindValue(":login", $login);
        //         $p->bindValue(":senha", md5($senha));
        //         $p->execute();	

        //         if ($p->rowCount() > 0) {
        //             $dado = $p->fetch();

        //             $_SESSION['iduser'] = $dado['id'];

        //             return true;
        //         }
        //         else{
        //             return false; 
        //         }



        //         return $p->fetch();
        //     } catch (Exception $e){
        //         echo "Erro ao consultar! ".$e->getMessage();
        //         return 0;
        //     }
        // }

 
    }
?>