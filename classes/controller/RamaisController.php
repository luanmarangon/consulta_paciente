<?php

    include("../config/Conexao.class.php");
    include("../domain/Ramais.class.php");
    include("../dao/RamaisDAO.class.php");
    include("../domain/Enderecos.class.php");
    include("../dao/EnderecosDAO.class.php");


    if ($_POST) {
        if (isset($_POST['btnCadastrarRamal'])) {
            $objEnderecos = new Enderecos("", "", "", "", "", "", "");
            $objEnderecos->setGrupo($_POST['grupo']);
            $objRamais = new Ramais($_POST['inputRamal'], $_POST['inputSenha'], $_POST['inputAlocado'], $objEnderecos);
            $objRamais->setEnderecogrupo($objEnderecos);
            $objDAO = new RamaisDAO();
            if ($objDAO->inserir($objRamais)) {
                header('Location:../../buscaMorador.php?i=ok');              
            } else {
                header('Location:../../buscaMorador.php?i=er');
            }
        }
    }

    // Não lembro pra que estava testando isso

    // $ramais = $conexao->execute(
    //     'SELECT COUNT(*) as ramais 
    //     FROM ramais'
    //     )->fetchAll('assoc');
    // $this->set(compact('ramais'));
?>