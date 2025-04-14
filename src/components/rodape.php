<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const editarBtns = document.querySelectorAll('.btn-editar');
      editarBtns.forEach(btn => {
        btn.addEventListener('click', function () {
          document.getElementById('edit-id-familia').value = this.dataset.id;
          document.getElementById('edit-nome').value = this.dataset.nome;
          document.getElementById('edit-cpf').value = this.dataset.cpf;
          document.getElementById('edit-celular').value = this.dataset.celular;
          document.getElementById('edit-cep').value = this.dataset.cep;
          document.getElementById('edit-rua').value = this.dataset.rua;
          document.getElementById('edit-numero').value = this.dataset.numero;
          document.getElementById('edit-bairro').value = this.dataset.bairro;
          document.getElementById('edit-cidade').value = this.dataset.cidade;
          document.getElementById('edit-uf').value = this.dataset.uf;
          document.getElementById('edit-pessoas').value = this.dataset.pessoas;
          document.getElementById('edit-renda').value = this.dataset.renda;
        });
      });

      const excluirBtns = document.querySelectorAll('.btn-excluir');
      excluirBtns.forEach(btn => {
        btn.addEventListener('click', function () {
          document.getElementById('excluir-id').value = this.dataset.id;
          document.getElementById('excluir-nome').textContent = this.dataset.nome;
        });
      });
    });
  </script>
</body>
</html>
