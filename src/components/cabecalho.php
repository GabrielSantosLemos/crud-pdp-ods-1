<?php include 'conexao.php'; ?>

<?php
  $pagina_atual = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Famílias em Situação de Pobreza - ODS 1</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chartjs-chart-geo@4.1.2/build/index.umd.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
  <div class="container">
    <a class="navbar-brand" href="./index.php">Famílias em Situação de Pobreza - ODS 1</a>
    <ul class="navbar-nav flex-row gap-3">
      <li class="nav-item">
        <a class="nav-link <?= ($pagina_atual == 'index.php') ? 'active' : '' ?>" href="index.php">Dashboard</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= ($pagina_atual == 'familias.php') ? 'active' : '' ?>" href="familias.php">Famílias</a>
      </li>
    </ul>
  </div>
</nav>
<div class="pb-5"></div>
