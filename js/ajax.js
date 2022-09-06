/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Other/javascript.js to edit this template
 */
/* 
 * Todas as páginas tem que ter esse script 
 */
$(document).ready(function () {
listar();
        });
        function excluir(id, nome) {
        $('#id-excluir').val(id);
                $('#nome-excluido').text(nome);
                var myModal = new bootstrap.Modal(document.getElementById('modalExcluir'), {});
                myModal.show();
                $('#mensagem-excluir').text(''); /*  Aula 56  sobre limpar variável */
                }

function inserir() {
$('#mensagem').text('');
        $('#tituloModal').text('Inserir Registro');
        var myModal = new bootstrap.Modal(document.getElementById('modalForm'), {});
        myModal.show();
        limparCampos();
        }

/* 
* Ajax para inserir ou editar dados 
*/
$("#form").submit(function () {
        event.preventDefault();
        /* 
         * Não Atualiza a página 
         */
        var formData = new FormData(this); /* Recebe os dados do Formulário */

        $.ajax({
        url: pag + "/inserir.php",
                type: 'POST',
                data: formData,
                success: function (mensagem) {
                $('#mensagem').text('');
                        $('#mensagem').removeClass();
                        if (mensagem.trim() == "Salvo com Sucesso!") {
                $('#btn-fechar').click();
                        listar();
                } else {
                $('#mensagem').addClass('text-danger');
                        $('#mensagem').text(mensagem);
                }
                },
                cache: false,
                contentType: false,
                processData: false
        });
});

function listar() {
        $.ajax({
        url: pag + "/listar.php",
                method: 'POST',
                data: $('#form').serialize(),
                dataType: "html",
                success: function (result) {
                $("#listar").html(result);
                }
        });
}

/* 
* Ajax para excluir dados 
*/
$("#form-excluir").submit(function () {
        event.preventDefault();
        /* 
         * Não Atualiza a página 
         */
        var formData = new FormData(this); /* Recebe os dados do Formulário */

        $.ajax({
        url: pag + "/excluir.php",
                type: 'POST',
                data: formData,
                success: function (mensagem) {
                $('#mensagem-excluir').text('');
                        $('#mensagem-excluir').removeClass();
                        if (mensagem.trim() == "Excluído com Sucesso!") {
                $('#btn-fechar-excluir').click();
                        listar();
                } else {
                $('#mensagem-excluir').addClass('text-danger');
                        $('#mensagem-excluir').text(mensagem);
                }
                },
                cache: false,
                contentType: false,
                processData: false
        });
});