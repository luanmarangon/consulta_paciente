<?php

include("../config/Conexao.class.php");
include("../domain/Enderecos.class.php");
include("../dao/EnderecosDAO.class.php");
include("../domain/Moradores.class.php");
include("../domain/Condominios.class.php");

if ($_POST) {
    if (isset($_POST['btnEnderecoMorador'])) {
        $objMoradores = new Moradores("", "", "", "", "", "", "");
        $objMoradores->setID($_POST['morador']);
        $objCondominios = new Condominios("", "", "", "", "", '', '');
        $objCondominios->setId($_POST['inputCondominio']);	
        $objEnderecos = new Enderecos($_POST['inputGRamal'], $_POST['inputEndereco'], $_POST['inputNumero'], $_POST['inputComplemento'], $_POST['inputCidade'], $objMoradores, $objCondominios) ;
        $objEnderecos->setMoradoresid($objMoradores);
        $objEnderecos->setCondominiosid($objCondominios);        
        $objDAO = new EnderecosDAO();
        if ($objDAO->inserir($objEnderecos)) {
            header('Location:../../buscaMorador.php?i=ok');
        } else {
            header('Location:../../buscaMorador.php?i=er');
        }
    } //Finalizar e pensar na senha
    else if (isset($_POST['btnAltEnderecoMorador'])) {
        $objMoradores = new Moradores($_POST['inputNome'], $_POST['inputCpf'], $_POST['inputTelefone'], $_POST['inputCelular'], $_POST['inputEmail'], $_POST['inputSenha'], $_POST['ativo']);
        $objDAO = new MoradoresDAO();
        if ($objDAO->inserir($objMoradores)) {
            header('Location:../../Moradores.php?i=ok');
        } else {
            header('Location:../../Moradores.php?i=er');
        }
    }
}


?>