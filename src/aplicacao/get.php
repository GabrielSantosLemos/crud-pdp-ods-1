<?php
$familias = [
  [
    'id' => 1,
    'nomeResponsavel' => 'Maria Silva',
    'endereco' => 'Rua das Flores, 123',
    'rendaTotal' => 1200.00,
    'dataCadastro' => '2025-04-01'
  ],
  [
    'id' => 2,
    'nomeResponsavel' => 'João Souza',
    'endereco' => 'Av. Brasil, 456',
    'rendaTotal' => 900.00,
    'dataCadastro' => '2025-04-03'
  ]
];

// Verifica se a requisição é GET
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  // Exibe os dados como JSON se for uma chamada via fetch/AJAX
  if (isset($_GET['api']) && $_GET['api'] === 'true') {
    header('Content-Type: application/json');
    echo json_encode($familias);
    exit;
  }
}
?>