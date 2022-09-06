<?php
/*
 *  Created on : 28 de ago. de 2022, 17:15:31
 *  Author     : Alexandre
 *  Description: Listar niveis
 *  Alterado em: 28/08/2022, 19:52
 *  Observação: Não Identar essa página.
** @copyright (c) 2022, Alexandre - Ensist Sistemas
 */

require_once("../../conexao.php");
require_once("campos.php");

echo <<<HTML
<table id="formListar_{$pagina}" class="table table-striped table-light table-hover my-4">
<thead>
<tr>
<th>{$campo1}</th>
<th>Ações</th>
</tr>
</thead>
<tbody>
HTML;

$query = $pdo->query("SELECT * FROM $pagina ORDER BY id DESC ");
$result = $query->fetchAll(PDO::FETCH_ASSOC);
for($i=0; $i < @count($result); $i++){
    foreach ($result[$i] as $key => $value){}

    $id = $result[$i]['id'];
    $cp1 = $result[$i]['nivel'];

    echo <<<HTML
        <tr>
         <!-- Passar dentro de uma instrução -->
        <td>{$cp1}</td>
            <td>
                <!-- -Ícones do bootstrap -->
                <a href="#" onclick="editar('{$id}', 
                                            '{$cp1}')" title="Editar registro..">
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

    function editar(id, nivel) {
        $('#id').val(id);
        $('#<?=$campo1?>').val(nivel);
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
        $('#<?=$campo1?>').val('');

        $('#mensagem').text('');
    }
</script>