<?php

    include("../config/Conexao.class.php");
    include("../domain/Users.class.php");
    include("../dao/UsersDAO.class.php");

    if ($_POST){
        if (isset($_POST['btnCadUsers'])){
            if ($_POST['inputSenha'] != $_POST['inputConfsenha']) {
				header('Location:../../Users.php?i=er');
			}
            elseif ($_POST['inputPerfil'] == 'SemPerfil') { 
                header('Location:../../Users.php?i=er');
            }
            else {
                    $objUsers = new Users(strtolower($_POST['inputLogin']), $_POST['inputSenha'], $_POST['inputEmail'], strtoupper($_POST['inputNome']), $_POST['inputPerfil'], $_POST['ativo']);
                    $objDAO = new UsersDAO();
                    if ($objDAO->inserir($objUsers)) {
                        header('Location:../../buscaUsers.php?i=ok');
                    } else {
                        header('Location:../../Users.php?i=er');
                    }
                }
        }
        else if (isset($_POST['btnAltUsers'])){
            if ($_POST['inputSenha'] != $_POST['inputConfsenha']) {
				header('Location:../../buscaUsers.php?a=er');
			}
            elseif ($_POST['inputPerfil'] == 'SemPerfil') {
                header('Location:../../Users.php?i=er');
            }
            else{
                $objUsers = new Users(strtolower($_POST['inputLogin']), $_POST['inputSenha'], $_POST['inputEmail'], strtoupper($_POST['inputNome']), $_POST['inputPerfil'], $_POST['ativo']);
                $objUsers->setId($_POST['id']);					
                $objDAO = new UsersDAO();
                if ($objDAO->alterar($objUsers)){
                    header('Location: ../../buscaUsers.php?a=ok');				
                } else {
                    header('Location: ../../buscaUsers.php?a=er');
                }
            }
		}
        else if (isset($_POST['btnNewSenha'])){
            if ($_POST['newpassword'] != $_POST['confnewpassword']) {
				header('Location:../../perfil.php?a=er');
			}
            else{
                $objUsers = new Users(strtolower($_POST['inputLogin']), $_POST['newpassword'], $_POST['inputEmail'], strtoupper($_POST['inputNome']), $_POST['inputPerfil'], $_POST['ativo']);
                $objUsers->setId($_POST['id']);					
                $objDAO = new UsersDAO();
                if ($objDAO->newsenha($objUsers)){
                    header('Location: ../../perfil.php?a=ok');				
                } else {
                    header('Location: ../../perfil.php?a=er');
                }
            }
        }
        else if (isset($_POST['btnCancelar'])){
            header('Location:../../buscaUsers.php');
        }
        else if (isset($_POST['btnInativarUsers'])){
            $objUsers = new Users("","", "", "","", $_POST['inativo']);
                $objUsers->setId($_POST['id']);					
                $objDAO = new UsersDAO();
                if ($objDAO->inativar($objUsers)){
                    header('Location: ../../buscaUsers.php?a=ok');				
                } else {
                    header('Location: ../../buscaUsers.php?a=er');
                }
        }
        else if (isset($_POST['btnAtivarUsers'])){
            $objUsers = new Users("","", "", "","", $_POST['ativo']);
                $objUsers->setId($_POST['id']);					
                $objDAO = new UsersDAO();
                if ($objDAO->ativar($objUsers)){
                    header('Location: ../../buscaUsers.php?a=ok');				
                } else {
                    header('Location: ../../buscaUsers.php?a=er');
                }
        }
        else if (isset($_POST['btnLogarUsers'])){
            $objUsers = new Users(strtolower($_POST['inputLogin']), $_POST['inputSenha'], $_POST['inputEmail'], $_POST['inputNome'], $_POST['inputPerfil'], $_POST['ativo']);
                $objUsers->setLogin($_POST['login']);
                $objUsers->setSenha($_POST['senha']);					
                $objDAO = new UsersDAO();
                // if ($objDAO->logarUsers($objUsers)){
                //     header('Location: ../../home.php?a=ok');				
                // } else {
                //     header('Location: ../../login.php?a=er');
                // }
        }
    }
?>