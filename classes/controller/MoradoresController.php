<?php

include("../config/Conexao.class.php");
include("../domain/Moradores.class.php");
include("../dao/MoradoresDAO.class.php");

if ($_POST) {
    if (isset($_POST['btnCadastrarMoradores'])) {
        if ($_POST['inputSenha'] != $_POST['inputConfSenha']) {
            header('Location:../../Moradores.php?i=er');
        }
        else{
            $objMoradores = new Moradores(mb_strtoupper($_POST['inputNome'], "utf-8"), $_POST['inputCpf'], $_POST['inputTelefone'], $_POST['inputCelular'], $_POST['inputEmail'], $_POST['inputSenha'], $_POST['ativo']);
            $objDAO = new MoradoresDAO();
            if ($objDAO->inserir($objMoradores)) {
                header('Location:../../buscaMorador.php?i=ok');
            } else {
                header('Location:../../Moradores.php?i=er');
            }
        }
    }//Finalizar e pensar na senha
    else if (isset($_POST['btnAltMoradores'])) {
        $objMoradores = new Moradores(mb_strtoupper($_POST['inputNome'], "utf-8"), $_POST['inputCpf'], $_POST['inputTelefone'], $_POST['inputCelular'], $_POST['inputEmail'], $_POST['inputSenha'], $_POST['ativo']);
        $objMoradores->setId($_POST['id']);		
        $objDAO = new MoradoresDAO();
        if ($objDAO->alterar($objMoradores)) {
            // var_dump($objMoradores);
            header('Location:../../buscaMorador.php?i=ok-alterar');
        } else {
            header('Location:../../Moradores.php?i=er');
        }
       
    }
    else if (isset($_POST['btnRedefinir'])) {
        $objMoradores = new Moradores("", "","","", $_POST['inputEmail'],"","");
        $objDAO = new MoradoresDAO();
        if ($objDAO->redefinirMoradores($objMoradores)) {
            header('Location:../../teste.php?i=ok');
        } else {
            header('Location:../../Moradores.php?i=er');
        }    

    }
    else if (isset($_POST['btnCancelar'])){
        header('Location:../../buscaMorador.php');
    }

}

?>