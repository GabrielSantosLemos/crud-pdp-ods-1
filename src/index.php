<?php include 'components/cabecalho.php'; ?>

  <div class="container mt-4">
    <h2>Resumo Geral</h2>
    <p>Resumo geral dos dados coletados no sistema de cadastro de famílias</p>
    
    <div class="row">
      <div class="col-md-6">
        <h4>Familias por UF </h4>
        <canvas id="familiasPorUF"></canvas>
      </div>
      <div class="col-md-6">
        <h4>Pessoas por cidade </h4>
        <canvas id="pessoasPorCidade"></canvas>
      </div>
    </div>
  </div>

  <?php
    // Relatório 1: Famílias por UF
    $result1 = $conexao->query("SELECT uf, COUNT(*) as total, AVG(renda) as renda_media FROM familias GROUP BY uf");
    $ufs = [];
    $totais = [];
    $rendas_medias = [];
    while($row = $result1->fetch_assoc()) {
      $ufs[] = $row['uf'];
      $totais[] = $row['total'];
      $rendas_medias[] = round($row['renda_media'], 2);
    }

    // Relatório 2: Pessoas por cidade
    $result2 = $conexao->query("SELECT cidade, SUM(num_pessoas) as total FROM familias GROUP BY cidade LIMIT 5");
    $cidades = [];
    $pessoas = [];
    while($row = $result2->fetch_assoc()) {
      $cidades[] = $row['cidade'];
      $pessoas[] = $row['total'];
    }
  ?>

  <script>
    const familiasPorUF = document.getElementById('familiasPorUF');
    new Chart(familiasPorUF, {
      type: 'bar',
      data: {
        labels: <?= json_encode($ufs) ?>,
        datasets: [
          {
            label: 'Famílias por UF',
            data: <?= json_encode($totais) ?>,
            backgroundColor: 'rgba(54, 162, 235, 0.7)',
            borderWidth: 1,
            yAxisID: 'y',
          },
          {
            label: 'Renda Média (R$)',
            data: <?= json_encode($rendas_medias) ?>,
            type: 'line',
            borderColor: 'rgba(255, 99, 132, 1)',
            backgroundColor: 'rgba(255, 99, 132, 0.3)',
            yAxisID: 'y1',
            tension: 0.3,
            fill: true
          }
        ]
      },
      options: {
        responsive: true,
        interaction: {
          mode: 'index',
          intersect: false
        },
        stacked: false,
        scales: {
          y: {
            type: 'linear',
            display: true,
            position: 'left',
            title: { display: true, text: 'Famílias' }
          },
          y1: {
            type: 'linear',
            display: true,
            position: 'right',
            title: { display: true, text: 'Renda Média (R$)' },
            grid: { drawOnChartArea: false }
          }
        }
      }
    });

    const pessoasPorCidade = document.getElementById('pessoasPorCidade');
    new Chart(pessoasPorCidade, {
      type: 'pie',
      data: {
        labels: <?= json_encode($cidades) ?>,
        datasets: [{
          label: 'Pessoas por Cidade',
          data: <?= json_encode($pessoas) ?>,
          borderWidth: 1
        }]
      }
    });
  </script>

<?php include 'components/rodape.php'; ?>