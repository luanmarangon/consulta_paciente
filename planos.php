<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Plano</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>



</head>

<body>
    <div class="container">
        <form action="classes/controller/PlanosController.php" method="POST">
            <div class="row">
                <div class="col">
                    <br>
                    <h2 style="text-align: center;">Cadastro de Planos </h2>
                    <?php
                    include("classes/config/Conexao.class.php");
                    include("classes/dao/PessoasDAO.class.php");
                    $objDAO = new PessoasDAO();
                    $consulta = $objDAO->consultarCodigoPessoas($_GET['id']);
                    ?>
                    <hr>
                </div>
                <div class="row">
                <div class="col-4">
                    <label for="">Paciente:</label>
                    <input type="hidden" name="inputPaciente" value="<?php echo $consulta['id']; ?>" />
                    <input type="text" value="<?php echo $consulta['nome']; ?>" class="form-control" disabled>
                </div>
                <div class="col-4">
                    <label for="">Carteirinha:</label>
                    <input type="text" class="form-control" name="inputCarteirinha">
                </div>
                <div class="col-4">
                    <label for="">Plano:</label>
                    <input type="text" class="form-control" name="inputPlano">
                </div>
            </div>
           
            <div class="row">
                <div class="col">
                <hr>
                    <input type="submit" class="btn btn-success" value="Cadastrar" name="btnCadastrarPlano">
                    <input type="submit" class="btn btn-danger" value="Cancelar" name="btnCancelar">
                </div>
            </div>
        </form>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>

<script type="text/javascript">
    $("#telefone").mask("(00) 0000-0000");
    $("#celular").mask("(00) 00000-0000");
    $("#cpf").mask("000.000.000-00");
</script>


</html>