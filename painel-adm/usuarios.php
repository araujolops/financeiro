<?php
/*
 *  Created on : 25 de ago. de 2022, 22:01:44
 *  Author     : Alexandre
 *  Description: Tela de Usuários.
 *  Alterado em: 28/08/2022, 19:52
 * @copyright (c) 2022, Alexandre - Ensist Sistemas
 */
require_once("../conexao.php");
require_once("verificar.php");
$pagina = 'usuarios';
require_once($pagina . "/campos.php");
?>

<div class="col-md-12 my-3">
        <a href="#" onclick="inserir()" type="button" class="btn btn-dark btn-sm">Novo Usuário</a>
</div>

<small><div class="tabela bg-light" id="listar"></div></small>

<!-- Modal form -->
<div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
                <div class="modal-content">
                        <div class="modal-header">
                                <h5 class="modal-title" id="modalLabel"><span id="tituloModal">Inserir Registro</span></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form id="form" method="post">
                                <div class="modal-body">
                                        <div class="mb-3">
                                                <label for="formControlInput" class="form-label"><?php echo $campo1 ?></label>
                                                <input type="text" class="form-control" name="<?php echo $campo1 ?>" placeholder="<?php echo $campo1 ?>" id="<?php echo $campo1 ?>" required>
                                        </div>

                                        <div class="mb-3">
                                                <label for="formControlInput" class="form-label"><?php echo $campo2 ?></label>
                                                <input type="email" class="form-control" name="<?php echo $campo2 ?>" placeholder="<?php echo $campo2 ?>" id="<?php echo $campo2 ?>" required>
                                        </div>

                                        <div class="mb-3">
                                                <label for="formControlInput" class="form-label"><?php echo $campo3 ?></label>
                                                <input type="text" class="form-control" name="<?php echo $campo3 ?>" placeholder="<?php echo $campo3 ?>" id="<?php echo $campo3 ?>" required>
                                        </div>

                                        <div class="mb-3">
                                                <label for="formControlInput" class="form-label">Nível</label>
                                                <select class="form-select" aria-label="Default select example" name="<?php echo $campo4 ?>" id="<?php echo $campo4 ?>">
                                                    <?php
                                                    $qryUsuario = $pdo->query("SELECT * FROM niveis order by nivel asc");
                                                    $resUsuario = $qryUsuario->fetchAll(PDO::FETCH_ASSOC);
                                                    for ($i = 0; $i < @count($resUsuario); $i++)
                                                    {
                                                        foreach ($resUsuario[$i] as $key => $value)
                                                        {
                                                            
                                                        }
                                                        $id_Usuario = $resUsuario[$i]['id'];
                                                        $nome_Usuario = $resUsuario[$i]['nivel'];
                                                        ?>
                                                            <option value="<?php echo $id_Usuario ?>"><?php echo $nome_Usuario ?></option>

                                                        <?php } ?>

                                                </select>
                                        </div>

                                        <small><div id="mensagem" align="center"></div></small>

                                        <input type="hidden" class="form-control" name="id" id="id">
                                </div>
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