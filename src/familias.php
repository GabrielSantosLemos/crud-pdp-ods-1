<?php include 'components/cabecalho.php'; ?>

  <div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <div>
        <h3>Lista de Famílias</h3>
        <p>Listagem completa das famílias cadastradas no sistema</p>
      </div>

      <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAdicionar">Adicionar Família</button>
    </div>
    <div class="table-responsive">
      <table class="table table-bordered table-striped align-middle text-nowrap">
        <thead class="table-light">
          <tr>
            <th>ID</th>
            <th>Responsável</th>
            <th>CPF</th>
            <th>Celular</th>
            <th>Endereço</th>
            <th>UF</th>
            <th>Pessoas</th>
            <th>Renda</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
          <?php 
            $resultado = $conexao->query("SELECT * FROM familias");
            while($familia = $resultado->fetch_assoc()):
          ?>
          <tr>
            <td><?= $familia['id'] ?></td>
            <td><?= $familia['nome_responsavel'] ?></td>
            <td><?= $familia['cpf'] ?></td>
            <td><?= $familia['celular'] ?></td>
            <td><?= $familia['rua'] . ', ' . $familia['numero'] . ', ' . $familia['bairro'] . ' - ' . $familia['cidade'] ?></td>
            <td><?= $familia['uf'] ?></td>
            <td><?= $familia['num_pessoas'] ?></td>
            <td><?= $familia['renda'] ?></td>
            <td>
              <div style="display: flex; gap: 8px;">
                <button class="btn btn-sm btn-warning btn-editar" 
                  data-id="<?= $familia['id'] ?>"
                  data-nome="<?= $familia['nome_responsavel'] ?>"
                  data-cpf="<?= $familia['cpf'] ?>"
                  data-celular="<?= $familia['celular'] ?>"
                  data-cep="<?= $familia['cep'] ?>"
                  data-rua="<?= $familia['rua'] ?>"
                  data-numero="<?= $familia['numero'] ?>"
                  data-bairro="<?= $familia['bairro'] ?>"
                  data-cidade="<?= $familia['cidade'] ?>"
                  data-uf="<?= $familia['uf'] ?>"
                  data-pessoas="<?= $familia['num_pessoas'] ?>"
                  data-renda="<?= $familia['renda'] ?>"
                  data-bs-toggle="modal" data-bs-target="#modalEditar">Editar</button>
                <button class="btn btn-sm btn-danger btn-excluir" 
                  data-id="<?= $familia['id'] ?>" 
                  data-nome="<?= $familia['nome_responsavel'] ?>" 
                  data-bs-toggle="modal" data-bs-target="#modalExcluir">Excluir</button>
              </div>
            </td>
          </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>

  <div class="modal fade" id="modalAdicionar" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form method="post" action="adicionar_familia.php">
          <div class="modal-header">
            <h5 class="modal-title">Adicionar Família</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <div class="mb-2">
              <label for="cpf" class="form-label">CPF</label>
              <input type="text" id="cpf" name="cpf" class="form-control" required>
            </div>

            <div class="mb-2">
              <label for="celular" class="form-label">Celular</label>
              <input type="text" id="celular" name="celular" class="form-control" required>
            </div>

            <div class="row">
              <div class="col-md-6 mb-2">
                <label for="cep" class="form-label">CEP</label>
                <input type="text" id="cep" name="cep" class="form-control" required>
              </div>
              <div class="col-md-6 mb-2">
                <label for="numero" class="form-label">Número</label>
                <input type="text" id="numero" name="numero" class="form-control" required>
              </div>
            </div>

            <div class="mb-2">
              <label for="rua" class="form-label">Rua</label>
              <input type="text" id="rua" name="rua" class="form-control" required>
            </div>

            <div class="mb-2">
              <label for="bairro" class="form-label">Bairro</label>
              <input type="text" id="bairro" name="bairro" class="form-control" required>
            </div>

            <div class="row">
              <div class="col-md-8 mb-2">
                <label for="cidade" class="form-label">Cidade</label>
                <input type="text" id="cidade" name="cidade" class="form-control" required>
              </div>
              <div class="col-md-4 mb-2">
                <label for="uf" class="form-label">UF</label>
                <input type="text" id="uf" name="uf" class="form-control" maxlength="2" required>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 mb-2">
                <label for="pessoas" class="form-label">Número de pessoas na família</label>
                <input type="number" id="pessoas" name="pessoas" class="form-control" required>
              </div>
              <div class="col-md-6 mb-3">
                <label for="renda" class="form-label">Renda familiar mensal</label>
                <input type="number" id="renda" name="renda" class="form-control" required>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Salvar</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modalEditar" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form method="post" action="editar_familia.php">
          <div class="modal-header">
            <h5 class="modal-title">Editar Família</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
          <input type="hidden" name="id_familia" id="edit-id-familia">
            <div class="mb-2">
              <label for="edit-nome" class="form-label">Nome do responsável</label>
              <input type="text" name="nome_responsavel" id="edit-nome" class="form-control" required>
            </div>

            <div class="mb-2">
              <label for="edit-cpf" class="form-label">CPF</label>
              <input type="text" name="cpf" id="edit-cpf" class="form-control" required>
            </div>

            <div class="mb-2">
              <label for="edit-celular" class="form-label">Celular</label>
              <input type="text" name="celular" id="edit-celular" class="form-control" required>
            </div>

            <div class="row">
              <div class="col-md-6 mb-2">
                <label for="edit-cep" class="form-label">CEP</label>
                <input type="text" name="cep" id="edit-cep" class="form-control" required>
              </div>
              <div class="col-md-6 mb-2">
                <label for="edit-numero" class="form-label">Número</label>
                <input type="text" name="numero" id="edit-numero" class="form-control" required>
              </div>
            </div>

            <div class="mb-2">
              <label for="edit-rua" class="form-label">Rua</label>
              <input type="text" name="rua" id="edit-rua" class="form-control" required>
            </div>

            <div class="mb-2">
              <label for="edit-bairro" class="form-label">Bairro</label>
              <input type="text" name="bairro" id="edit-bairro" class="form-control" required>
            </div>

            <div class="row">
              <div class="col-md-8 mb-2">
                <label for="edit-cidade" class="form-label">Cidade</label>
                <input type="text" name="cidade" id="edit-cidade" class="form-control" required>
              </div>
              <div class="col-md-4 mb-2">
                <label for="edit-uf" class="form-label">UF</label>
                <input type="text" name="uf" id="edit-uf" class="form-control" maxlength="2" required>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 mb-2">
                <label for="edit-pessoas" class="form-label">Número de pessoas na família</label>
                <input type="number" name="pessoas" id="edit-pessoas" class="form-control" required>
              </div>
              <div class="col-md-6 mb-3">
                <label for="edit-renda" class="form-label">Renda familiar mensal</label>
                <input type="number" name="renda" id="edit-renda" class="form-control" required>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-warning">Atualizar</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modalExcluir" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form method="post" action="excluir_familia.php">
          <div class="modal-header">
            <h5 class="modal-title">Confirmar Exclusão</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <p>Tem certeza que deseja excluir a família <strong id="excluir-nome"></strong>?</p>
            <input type="hidden" name="id_familia" id="excluir-id">
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-danger">Excluir</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          </div>
        </form>
      </div>
    </div>
  </div>

<?php include 'components/rodape.php'; ?>
