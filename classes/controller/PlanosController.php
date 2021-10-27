<?php

include("../config/Conexao.class.php");
include("../domain/Planos.class.php");
include("../dao/PlanosDAO.class.php");

if ($_POST) {
    if (isset($_POST['btnCadastrarPlano'])) {
        $objPlanos = new Planos($_POST['inputCarteirinha'], $_POST['inputPlano'], $_POST['inputPaciente']);
        $objDAO = new PlanosDAO();
        if ($objDAO->insert($objPlanos)) {
            header('Location:../../busca.php?i=ok');
        } else {
            header('Location:../../busca.php?i=erro');
        }
    }else if (isset($_POST['btnCancelar'])){
        header('Location:../../busca.php');
    }
}

?>