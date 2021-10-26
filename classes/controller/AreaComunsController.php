<?php

include("../config/Conexao.class.php");
include("../domain/AreaComuns.class.php");
include("../dao/AreaComunsDAO.class.php");

if ($_POST) {
    if (isset($_POST['btnCadAreaComun'])) {
        $objAreaComuns = new AreasComuns($_POST['inputRamal'], $_POST['inputSenha'], $_POST['inputLocal'], $_POST['id']);
        $objDAO = new AreacomunsDAO();
        if ($objDAO->inserir($objAreaComuns)) {
            header('Location:../../buscaCondominio.php?i=ok');              
        } else {
            header('Location:../../buscaCondominio.php?i=er');
        }
    }
}
?>