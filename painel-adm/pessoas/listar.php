<?php
/*
 *  Created on : 23 de ago. de 2022, 26:13:31
 *  Author     : Alexandre
 *  Description: Listar usuários
 *  Alterado em: 28/08/2022, 19:52
 *  Observação: Não Identar essa página.
* @copyright (c) 2022, Alexandre - Ensist Sistemas
 */

require_once("../../conexao.php");
require_once("campos.php");

echo <<<HTML
<table id="formListar_{$pagina}" class="table table-striped table-light table-hover my-4">
<thead>
<tr>
<th>{$cmp_Nome1}</th>
<th>{$cmp_TipoFJ2}</th>
<th>{$cmp_CpfCnpj3}</th>
<th>{$cmp_Fone5}</th>
<th>{$cmp_Email13}</th>
<th>Ações</th>
</tr>
</thead>
<tbody>
HTML;

$query = $pdo->query("SELECT * FROM $pagina WHERE ecliente = 'S' ORDER BY id DESC ");
$result = $query->fetchAll(PDO::FETCH_ASSOC);
for($i=0; $i < @count($result); $i++){
    foreach ($result[$i] as $key => $value){}

    $id = $result[$i]['id'];
    $cp1 = $result[$i]['nome'];
    $cp2 = $result[$i]['tipo_FJ'];
    $cp3 = $result[$i]['doc'];
    $cp4 = $result[$i]['ativo'];
    $cp5 = $result[$i]['telefone'];
    $cp6 = $result[$i]['endereco'];
    $cp7 = $result[$i]['endereco_nr'];
    $cp8 = $result[$i]['obs'];
    $cp9 = $result[$i]['data'];
    $cp10 = $result[$i]['banco_fk'];
    $cp11 = $result[$i]['agencia'];
    $cp12 = $result[$i]['conta_bancaria'];
    $cp13 = $result[$i]['email'];

    echo <<<HTML
        <tr>
         <!-- Passar dentro de uma instrução -->
        <td>{$cp1}</td>
        <td>{$cp2}</td>
        <td>{$cp3}</td>
        <td>{$cp5}</td>
        <td>{$cp13}</td>
        <td>
                <!-- -Ícones do bootstrap -->
                <a href="#" onclick="editar('{$id}', 
                                            '{$cp1}', 
                                            '{$cp2}',
                                            '{$cp3}',
                                            '{$cp4}',
                                            '{$cp5}',
                                            '{$cp6}',
                                            '{$cp7}',
                                            '{$cp8}',
                                            '{$cp9}',
                                            '{$cp10}',
                                            '{$cp11}',
                                            '{$cp12}',
                                            '{$cp13}')" title="Editar registro..">
                        <i class="bi bi-pencil-square text-primary"></i>
                </a>
                <a href="#" onclick="excluir('{$id}', '{$cp1}')" title="Excluir registro..">
                        <i class="bi bi-trash text-danger"></i>
                </a>
            </td>
    </tr>
    HTML;
}
echo <<<HTML
  </tbody>
 HTML;

?>

<script>
    $(document).ready(function() {
        /* Alexandre mudei o nome do id Procurar por table id="formListar_{$pagina} */
        $('#formListar_<?php echo $pagina ?>').DataTable({   
            "ordering": false,
            
        "language": {
               "search": "Pesquisar:",
               "lengthMenu": "Mostrar _MENU_ registros p/ pág.",
               "info": "Página _PAGE_ de _PAGES_",
               "zeroRecords": "Não existe registros Cadastrados....",
               "infoEmpty": "Sem registros....",
               "infoFiltered": "(filtrado de _MAX_ registros totais)",
        "paginate": {
               "previous": "Anterior",
               "next": "Próxima"
           }
       }
            
        });
    });

    function editar(id, cp1, cp2, cp3, cp4, cp5, cp6, cp7, cp8, cp9, cp10, cp11, cp12, cp13) {
        $('#id').val(id);
        $('#<?=$cmp_Nome1?>').val(cp1);
        $('#<?=$cmp_TipoFJ2?>').val(cp2);
        $('#<?=$cmp_CpfCnpj3?>').val(cp3);
        $('#<?=$cmp_Ativo4?>').val(cp4);
        $('#<?=$cmp_Fone5?>').val(cp5);
        $('#<?=$cmp_Endereco6?>').val(cp6);
        $('#<?=$cmp_EndNro7?>').val(cp7);
        $('#<?=$cmp_Obs8?>').val(cp8);
        $('#<?=$cmp_Data9?>').val(cp9);
        $('#<?=$cmp_Banco10?>').val(cp10);
        $('#<?=$cmp_Agencia11?>').val(cp11);
        $('#<?=$cmp_Conta12?>').val(cp12);
        $('#<?=$cmp_Email13?>').val(cp13);
        $('#tituloModal').text('Editar Registro');
        var myModal = new bootstrap.Modal(document.getElementById('modalForm'), {});
        myModal.show();
        /*
         *  Verificar a necessidade de ter este evento
         *  Limpa a variável 
         */
        $('#mensagem').text('');
    }

    function limparCampos() {
        $('#id').val('');
        $('#<?=$cmp_Nome1?>').val('');
        $('#<?=$cmp_TipoFJ2?>').val('');
        $('#<?=$cmp_CpfCnpj3?>').val('');
        $('#<?=$cmp_Fone5?>').val('');
        $('#<?=$cmp_Endereco6?>').val('');
        $('#<?=$cmp_EndNro7?>').val('');
        $('#<?=$cmp_Obs8?>').val('');
        $('#<?=$cmp_Data9?>').val('');
        $('#<?=$cmp_Banco10?>').val('');
        $('#<?=$cmp_Agencia11?>').val('');
        $('#<?=$cmp_Conta12?>').val('');
        $('#<?=$cmp_Email13?>').val('');

        $('#mensagem').text('');
    }
</script>