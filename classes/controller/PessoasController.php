<?php

include("../config/Conexao.class.php");
include("../domain/Pessoas.class.php");
include("../dao/PessoasDAO.class.php");

if ($_POST) {
    if (isset($_POST['btnCadastrarPaciente'])) {
        $objPessoas = new Pessoas($_POST['inputNome'], $_POST['inputCPF'], $_POST['inputNascimento'], $_POST['inputMae'], $_POST['inputLogradouro'], $_POST['inputNumero'], $_POST['inputComplemento'], $_POST['inputBairro'], $_POST['inputCidade'], $_POST['inputUF'], $_POST['inputCEP']);
        $objDAO = new PessoasDAO();
        if ($objDAO->insert($objPessoas)) {
            header('Location:../../cadastro.php?i=ok');
        } else {
            header('Location:../../cadastro.php?i=erro');
        }
    }else if (isset($_POST['btnCancelar'])){
        header('Location:../../busca.php');
    }
}

?>