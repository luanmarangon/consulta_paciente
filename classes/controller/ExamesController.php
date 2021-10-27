<?php

include("../config/Conexao.class.php");
include("../domain/Exames.class.php");
include("../dao/ExamesDAO.class.php");

if ($_POST) {
    if (isset($_POST['btnCadastrarExame'])) {
        $objExames = new Exames($_POST['inputDtExame'], $_POST['inputExame'], $_POST['inputMedico'], $_POST['inputLaboratorio'], $_POST['inputPaciente']);
        $objDAO = new ExamesDAO();
        if ($objDAO->insert($objExames)) {
            header('Location:../../exames.php?i=ok');
        } else {
            header('Location:../../exames.php?i=erro');
        }
    }else if (isset($_POST['btnCancelar'])){
        header('Location:../../busca.php');
    }
}

?>