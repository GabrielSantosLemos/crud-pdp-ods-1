<?php
include 'conexao.php'; // ou ajuste o caminho para a conexão correta

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=familias_backup.csv');

$output = fopen('php://output', 'w');

// Cabeçalhos das colunas
fputcsv($output, ['ID', 'Responsável', 'CPF', 'Celular', 'CEP', 'Rua', 'Número', 'Bairro', 'Cidade', 'UF', 'Pessoas', 'Renda']);

// Buscar dados do banco
$resultado = $conexao->query("SELECT * FROM familias");

while ($familia = $resultado->fetch_assoc()) {
    fputcsv($output, [
        $familia['id'],
        $familia['nome_responsavel'],
        $familia['cpf'],
        $familia['celular'],
        $familia['cep'],
        $familia['rua'],
        $familia['numero'],
        $familia['bairro'],
        $familia['cidade'],
        $familia['uf'],
        $familia['num_pessoas'],
        $familia['renda']
    ]);
}

fclose($output);
exit;
