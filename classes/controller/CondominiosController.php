<?php

include("../config/Conexao.class.php");
include("../domain/Condominios.class.php");
include("../dao/CondominiosDAO.class.php");

if ($_POST) {
    if (isset($_POST['btnCadastrarCondominio'])) {
        $objCondominios = new Condominios(mb_strtoupper($_POST['inputCondominio'], "UTF-8"), $_POST['inputPrefixo'], $_POST['inputContato'], $_POST['inputTelefone'], $_POST['inputCelular'], 'Anexo','S');
        $objDAO = new CondominiosDAO();
        if ($objDAO->inserir($objCondominios)) {
            header('Location:../../buscaCondominio.php?i=ok');
        } else {
            header('Location:../../Condominios.php?i=er');
        }
    }
    else if (isset($_POST['btnAltCondominio'])){
        $objCondominios = new Condominios(mb_strtoupper($_POST['inputCondominio'], "UTF-8"), $_POST['inputPrefixo'], $_POST['inputContato'], $_POST['inputTelefone'], $_POST['inputCelular'], 'Anexo', '');
        $objCondominios->setId($_POST['id']);					
        $objDAO = new CondominiosDAO();
        if ($objDAO->alterar($objCondominios)){
            header('Location: ../../buscaCondominio.php?a=ok');				
        } else {
            header('Location: ../../buscaCondominio.php?a=er');
        }
    }
    else if (isset($_POST['btnCancelar'])){
        header('Location:../../buscaCondominio.php');
    }
    else if (isset($_POST['btnAltRetornar'])){
        header('Location:../../buscaCondominio.php');
        // header("Location: ".$_SERVER['HTTP_REFERER']."");
    }
    else if (isset($_POST['btnInativarCondominios'])){
        $objCondominios = new Condominios("","", "", "", "", "", 'N');
        $objCondominios->setId($_POST['id']);					
        $objDAO = new CondominiosDAO();
        if ($objDAO->condominioativo($objCondominios)){
            header('Location: ../../buscaCondominio.php?a=ok');				
        } else {
            header('Location: ../../buscaCondominio.php?a=er');
        }
    }
    else if (isset($_POST['btnAtivarCondominios'])){
        $objUsers = new Condominios("","", "", "", "", "", 'S');
            $objUsers->setId($_POST['id']);					
            $objDAO = new CondominiosDAO();
            if ($objDAO->condominioativo($objUsers)){
                header('Location: ../../buscaCondominio.php?a=ok');				
            } else {
                header('Location: ../../buscaCondominio.php?a=er');
            }
    }   
}
?>
