<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
      <a class="navbar-brand" href="#">ODS 1</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Familias</a>
          </li>
      </div>
    </div>
  </nav>
  <div class="container">
    <div style="display: flex; justify-content: end">
      <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Incluir
      </button>
    </div>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nome</th>
          <th scope="col">Endereço</th>
          <th scope="col">Renda</th>
          <th scope="col">Opções</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <td>Mark</td>
          <td>Otto</td>
          <td>@mdo</td>
          <td>
            <button class="btn"><i class="bi bi-pencil"></i></button>
            <button class="btn"><i class="bi bi-trash"></i></button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Incluir</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <form>
            <div class="form-floating mb-3">
              <input type="text" class="form-control" placeholder="Nome:">
              <label for="form-label">Indique seu nome:</label>

            </div>

            <div class="form-floating mb-3">
              <input type="text" class="form-control" placeholder=" Endereço:">
              <label for="form-label">Indique seu endereço:</label>
            </div>

            <div class="form-floating mb-3">
              <input type="text" class="form-control" placeholder=" Renda familiar:">
              <label for="form-label">Indique sua renda familiar:</label>
            </div>
          </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
          <button type="button" class="btn btn-primary">Salvar</button>
        </div>
      </div>
    </div>
  </div>

  <div id="familias-container">Carregando...</div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
    crossorigin="anonymous"></script>

  <script>
    // Fazendo uma chamada GET via fetch
    fetch('get.php?api=true')
      .then(response => response.json())
      .then(data => {
        const container = document.getElementById('familias-container');
        container.innerHTML = '';

        if (data.length === 0) {
          container.innerHTML = '<p>Nenhuma família cadastrada.</p>';
          return;
        }

        const list = document.createElement('ul');

        data.forEach(familia => {
          const item = document.createElement('li');
          item.textContent = `Responsável: ${familia.nomeResponsavel} | Endereço: ${familia.endereco} | Renda: R$ ${familia.rendaTotal}`;
          list.appendChild(item);
        });

        container.appendChild(list);
      })
      .catch(error => {
        console.error('Erro ao carregar dados:', error);
        document.getElementById('familias-container').innerHTML = 'Erro ao carregar dados.';
      });

    const teste = "";
  </script>
</body>

</html>

<?php
?>