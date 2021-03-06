<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar de Exames</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>



</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <br>
                <?php
                    include("classes/config/Conexao.class.php");
                    include("classes/dao/PessoasDAO.class.php");
                    $objDAO = new PessoasDAO();
                    $consulta = $objDAO->consultarCodigoPessoas($_GET['id']);
                    include("classes/dao/PlanosDAO.class.php");
                    $objDAO2 = new PlanosDAO();
                    $consulta2 = $objDAO2->consultarCodigoPlano($consulta['id']);
                ?>
                <h3 style="text-align: center;">Lista de Exames</h3>
                <a href="javascript:history.back()"> <small>Voltar</small> </a>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <label for="">Nome: </label>
                <input type="text" disabled class="form-control" value="<?php echo $consulta['nome']; ?>">
            </div>
            <div class="col-2">
                <label for="">CPF: </label>
                <input type="text" disabled class="form-control" value="<?php echo $consulta['cpf']; ?>">
            </div>
            <div class="col-2">
                <label for="">Carteirinha: </label>
                <input type="text" disabled class="form-control" value="<?php echo $consulta2['carteirinha']; ?>">
            </div>
            <div class="col-2">
                <label for="">Plano: </label>
                <input type="text" disabled class="form-control" value="<?php echo $consulta2['plano']; ?>">
            </div>
            <div class="col-3">
                <label for="">M??e: </label>
                <input type="text" disabled class="form-control" value="<?php echo $consulta['mae']; ?>">
            </div>
        </div>
        <div class="row">
        <div class="col-3">
                <label for="">Endere??o:</label>
                <input type="text" disabled class="form-control" value="<?php echo $consulta['logradouro']; ?>">
            </div>
            <div class="col-1">
                <label for="">Numero:</label>
                <input type="text" disabled class="form-control" value="<?php echo $consulta['numero']; ?>">
            </div>
            <div class="col-2">
                <label for="">Compl.:</label>
                <input type="text" disabled class="form-control" value="<?php echo $consulta['compl']; ?>">
            </div>
            <div class="col-2">
                <label for="">Bairro:</label>
                <input type="text" disabled class="form-control" value="<?php echo $consulta['bairro']; ?>">
            </div>
            <div class="col-2">
                <label for="">Cidade:</label>
                <input type="text" disabled class="form-control" value="<?php echo $consulta['cidade']; ?>-<?php echo $consulta['uf'] ?>">
            </div>
            <div class="col-2">
                <label for="">C.E.P:</label>
                <input type="text" disabled class="form-control" value="<?php echo $consulta['cep']; ?>">
            </div>
            

        </div>
        <br>
        <div class="row">
            <div class="col">
                <table id="tabela" class="table table-hover">
                    <thead>
                        <th style="width: 15%;">Data</th>
                        <th style="width: 20%;">Exame</th>
                        <th style="width: 20%;">M??dico</th>
                        <th style="width: 20%;">Laborat??rio</th>
                    </thead>
                    <tbody>
                        <?php
                        include("classes/dao/ExamesDAO.class.php");
                        $objDAO = new ExamesDAO();
                        $consulta = $objDAO->consultarCodigoExame($consulta['id']);
                        foreach ($consulta as $consul) {
                            echo "  <tr>
                        			<td>" . $consul['data'] . "</td>
                        			<td>{$consul['exame']}</td>
                        			<td>{$consul['medico']}</td>
                        			<td>{$consul['laboratorio']}</td>
                                   
                        		</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#tabela').DataTable({
                    "oLanguage": {
                        "sEmptyTable": "Nenhum registro encontrado",
                        "sInfo": "Mostrando de _START_ at?? _END_ de _TOTAL_ registros",
                        "sInfoEmpty": "Mostrando 0 at?? 0 de 0 registros",
                        "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                        "sInfoPostFix": "",
                        "sInfoThousands": ".",
                        "sLengthMenu": "_MENU_ resultados por p??gina",
                        "sLoadingRecords": "Carregando...",
                        "sProcessing": "Processando...",
                        "sZeroRecords": "Nenhum registro encontrado",
                        "sSearch": "Pesquisar",
                        "oPaginate": {
                            "sNext": "Pr??ximo",
                            "sPrevious": "Anterior",
                            "sFirst": "Primeiro",
                            "sLast": "??ltimo"
                        },
                        "oAria": {
                            "sSortAscending": ": Ordenar colunas de forma ascendente",
                            "sSortDescending": ": Ordenar colunas de forma descendente"
                        },
                        "select": {
                            "rows": {
                                "_": "Selecionado %d linhas",
                                "0": "Nenhuma linha selecionada",
                                "1": "Selecionado 1 linha"
                            }
                        }
                    }
                });
            });
        </script>
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