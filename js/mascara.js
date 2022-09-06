/*
 *  Created on : 29 de ago. de 2022, 15:21:44
 *  Author     : Alexandre
 *  Description: Arquivos de Máscaras.
 *  Alterado em: 29/08/2022, 15:21
 * @copyright (c) 2022, Alexandre - Ensist Sistemas
 */

/*
 *  Formatar CPF/CNPJ
 */
$(document).ready(function () {
    $('#Telefone').mask('(00) 00000-0000');
    $('#Cpf').mask('000.000.000-00');
    $('#Cep').mask('00000-000');
    $('#Cnpj').mask('00.000.000/0000-00');
});
