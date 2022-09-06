<?php
/*
 *  Created on : 29 de ago. de 2022, 11:35:44
 *  Author     : Alexandre
 *  Description: Tela de Pessoas.
 *  Alterado em: 30/08/2022, 11:35
 *  Observação: Aulas 2/3/4/5/6/7/8/9/10/11/12/13/14/15/16 - Curso Arquitetura de Sistema
 *  Aula 10 explica como mudar a mascara do CPF/CNPJ
 * @copyright (c) 2022, Alexandre - Ensist Sistemas
 */
require_once("../conexao.php");
require_once("verificar.php");
$pagina = 'pessoas';
require_once($pagina . "/campos.php");
?>

<div class="col-md-12 my-3">
        <a href="#" onclick="inserir()" type="button" class="btn btn-dark btn-sm">Novo Cliente</a>
</div>

<small><div class="tabela bg-light" id="listar"></div></small>

<!-- Modal form -->
<div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <!-- Adicionar modal-lg -> devido a quantidade de campos --> 
        <div class="modal-dialog modal-lg modal-xl">
                <div class="modal-content">
                        <div class="modal-header">
                                <h5 class="modal-title" id="modalLabel"><span id="tituloModal">Inserir Registro</span></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form id="form" method="post">
                                <div class="modal-body">

                                        <!-- Formulário com Abas - Ref.: https://getbootstrap.com/docs/5.2/components/navs-tabs/ -->
                                        <nav>
                                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#dados" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Dados Pessoais</button>
                                                        <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#contas" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Dados Bancários</button>
                                                </div>
                                        </nav>

                                        <hr> <!-- Epaçamento entre linhas -->

                                        <!-- Recebe conteúdo que está em data-bs-target -->
                                        <div class="tab-content" id="nav-tabContent">

                                                <!-- Tab Dados Pessoais -->
                                                <div class="tab-pane fade show active" id="dados" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">

                                                        <!-- Primeiro Bloco de linhas -->
                                                        <div class='row'>
                                                                <div class='col-md-6 col-sm-12'>
                                                                        <div class="mb-3">
                                                                                <label for="formControlInput" class="form-label"><?php echo $cmp_Nome1 ?></label>
                                                                                <input type="text" class="form-control" name="<?php echo $cmp_Nome1 ?>" placeholder="<?php echo $cmp_Nome1 ?>" id="<?php echo $cmp_Nome1 ?>" required>
                                                                        </div>
                                                                </div>

                                                                <div class='col-md-2 m-12'>
                                                                        <div class="mb-3">
                                                                                <label for="formControlInput" class="form-label">Tipo Pessoa</label>

                                                                                <select class="form-select" aria-label="tipo_fj" name="<?php echo $cmp_TipoFJ2 ?>" id="<?php echo $cmp_TipoFJ2 ?>">
                                                                                        <option value="F">Física</option>
                                                                                        <option value="J">Jurídica</option>
                                                                                        <option value="E">Estrangeiro</option>
                                                                                </select>
                                                                        </div>
                                                                </div>

                                                                <div class='col-md-2 m-12'>
                                                                        <div class="mb-3">
                                                                                <label for="formControlInput" class="form-label">CPF/CNPJ</label>
                                                                                <input type="text" class="form-control" name="<?php echo $cmp_CpfCnpj3 ?>"  id="<?php echo $cmp_CpfCnpj3 ?>" required>
                                                                        </div>
                                                                </div>

                                                                <div class='col-md-2 m-12'>
                                                                        <div class="mb-3">
                                                                                <label for="FormControlInput" class="form-label"><?php echo $cmp_Ativo4 ?></label>
                                                                                <select class="form-select" aria-label="ativo" name="<?php echo $cmp_Ativo4 ?>" id="<?php echo $cmp_Ativo4 ?>">
                                                                                        <option value="S">Sim</option>
                                                                                        <option value="N">Não</option>
                                                                                </select>
                                                                        </div>
                                                                </div>

                                                        </div>

                                                        <!-- Segundo Bloco de linhas -->
                                                        <div class='row'>
                                                                <div class='col-md-2 m-12'>
                                                                        <div class="mb-3">
                                                                                <label for="formControlInput" class="form-label"><?php echo $cmp_Fone5 ?></label>
                                                                                <input type="text" class="form-control" name="<?php echo $cmp_Fone5 ?>" placeholder="<?php echo $cmp_Fone5 ?>" id="<?php echo $cmp_Fone5 ?>" required>
                                                                        </div>
                                                                </div>

                                                                <div class='col-md-8 m-12'>
                                                                        <div class="mb-3">
                                                                                <div class="mb-3">
                                                                                        <label for="formControlInput" class="form-label"><?php echo $cmp_Endereco6 ?></label>
                                                                                        <input type="text" class="form-control" name="<?php echo $cmp_Endereco6 ?>" placeholder="<?php echo $cmp_Endereco6 ?>" id="<?php echo $cmp_Endereco6 ?>" required>
                                                                                </div>
                                                                        </div>
                                                                </div>

                                                                <div class='col-md-2 m-12'>
                                                                        <div class="mb-3">
                                                                                <label for="formControlInput" class="form-label">Nr.</label>
                                                                                <input type="text" class="form-control" name="<?php echo $cmp_EndNro7 ?>" placeholder="Nr. do endereço" id="<?php echo $cmp_EndNro7 ?>" required>
                                                                        </div>
                                                                </div>
                                                        </div>

                                                        <div class='row'>
                                                                <!-- Campo de Observação -->
                                                                <div class='col-md-12 m-12'>
                                                                        <div class="mb-3">
                                                                                <label for="formControlInput" class="form-label">Observações</label>
                                                                                <textarea maxlength="100" class="form-control" name="<?php echo $cmp_Obs8 ?>"  id="<?php echo $cmp_Obs8 ?>"></textarea>
                                                                        </div>
                                                                </div>
                                                        </div>

                                                        <div class='row'>
                                                                <div class='col-md-2 m-12'>
                                                                        <div class="mb-3">
                                                                                <label for="formControlInput" class="form-label"><?php echo $cmp_Data9 ?></label>
                                                                                <input type="date" class="form-control" name="<?php echo $cmp_Data9 ?>" placeholder="dd/mm/yyyy" id="<?php echo $cmp_Data9 ?>" readonly="">
                                                                        </div>
                                                                </div>

                                                                <div class='col-md-6 m-12'>
                                                                        <div class="mb-3">
                                                                                <label for="formControlInput" class="form-label"><?php echo $cmp_Email13 ?></label>
                                                                                <input type="text" class="form-control" name="<?php echo $cmp_Email13 ?>" placeholder="<?php echo $cmp_Email13 ?>" id="<?php echo $cmp_Email13 ?>" required>
                                                                        </div>
                                                                </div>

                                                        </div>

                                                </div>

                                        </div>

                                        <!-- Tab Contas -->
                                        <div class="tab-pane fade" id="contas" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">

                                                <!-- Primeiro Bloco de linhas -->
                                                <div class='row'>
                                                        <div class='col-md-4 col-sm-12'>
                                                                <div class="mb-3">

                                                                        <label for="formControlInput" class="form-label">Banco</label>
                                                                        <select class="form-select" aria-label="Default select example" name="<?php echo $cmp_Banco10 ?>" id="<?php echo $cmp_Banco10 ?>">
                                                                            <?php
                                                                            $qryBanco = $pdo->query("SELECT * FROM bancos ORDER BY nome ASC");
                                                                            $resBanco = $qryBanco->fetchAll(PDO::FETCH_ASSOC);
                                                                            for ($i = 0; $i < @count($resBanco); $i++)
                                                                            {
                                                                                foreach ($resBanco[$i] as $key => $value)
                                                                                {
                                                                                    
                                                                                }
                                                                                $id_Banco = $resBanco[$i]['id'];
                                                                                $nome_Banco = $resBanco[$i]['nome'];
                                                                                ?>
                                                                                    <option value="<?php echo $id_Banco ?>"><?php echo $nome_Banco ?></option>
                                                                                <?php } ?>
                                                                        </select>

                                                                </div>
                                                        </div>

                                                        <div class='col-md-2 m-12'>
                                                                <div class="mb-3">
                                                                        <label for="formControlInput" class="form-label">Agência</label>
                                                                        <input type="text" class="form-control" name="<?php echo $cmp_Agencia11 ?>" placeholder="Agência" id="<?php echo $cmp_Agencia11 ?>">
                                                                </div>
                                                        </div>

                                                        <div class='col-md-2 m-12'>
                                                                <div class="mb-3">
                                                                        <label for="formControlInput" class="form-label">Nr. Conta</label>
                                                                        <input type="text" class="form-control" name="<?php echo $cmp_Conta12 ?>" placeholder="Nr. Conta" id="<?php echo $cmp_Conta12 ?>">
                                                                </div>
                                                        </div>

                                                </div>

                                        </div>

                                </div>

                                <small><div id="mensagem" align="center"></div></small>

                                <input type="hidden" class="form-control" name="id" id="id">

                                <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btn-fechar">Fechar</button>
                                        <button type="submit" class="btn btn-primary">Salvar</button>
                                </div>
                        </form>
                </div>
        </div>
</div>

<!-- modalExcluir -->
<div class="modal fade" id="modalExcluir" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
                <div class="modal-content">
                        <div class="modal-header">
                                <h5 class="modal-title" id="modalLabel"><span id="tituloModal">Excluir Registro</span></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form id="form-excluir" method="post">
                                <div class="modal-body">
                                        Deseja Realmente excluir este Registro: <span id="nome-excluido"></span>?
                                        <hr><small><div id="mensagem-excluir" align="center"></div></small>

                                        <input type="hidden" class="form-control" name="id-excluir" id="id-excluir">
                                </div>
                                <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btn-fechar-excluir">Fechar</button>
                                        <button type="submit" class="btn btn-danger">Excluir</button>
                                </div>
                        </form>
                </div>
        </div>
</div>

<script type="text/javascript">var pag = "<?= $pagina ?>"</script>
<script src="../js/ajax.js"></script>

<script>
    $(document).ready(function () {
        $('#<?= $cmp_CpfCnpj3 ?>').mask('000.000.000-00');
        $('#<?= $cmp_CpfCnpj3 ?>').attr('placeholder', 'CPF');

        $('#<?= $cmp_TipoFJ2 ?>').change(function () {
            if ($(this).val() == 'F') {
                $('#<?= $cmp_CpfCnpj3 ?>').mask('000.000.000-00');
                $('#<?= $cmp_CpfCnpj3 ?>').attr('placeholder', 'CPF');
            } else {
                $('#<?= $cmp_CpfCnpj3 ?>').mask('00.000.000/0000-00');
                $('#<?= $cmp_CpfCnpj3 ?>').attr('placeholder', 'CNPJ');
            }
        });

    });

</script>