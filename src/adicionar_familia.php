<?php
include 'conexao.php';

$nome_responsavel = $_POST['nome_responsavel'];
$cpf = $_POST['cpf'];
$celular = $_POST['celular'];
$cep = $_POST['cep'];
$rua = $_POST['rua'];
$numero = $_POST['numero'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$uf = $_POST['uf'];
$pessoas = $_POST['pessoas'];
$renda = $_POST['renda'];

$sql = "INSERT INTO familias 
  (nome_responsavel, cpf, celular, cep, rua, numero, bairro, cidade, uf, num_pessoas, renda)
  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conexao->prepare($sql);
$stmt->bind_param("sssssssssid", 
  $nome_responsavel, $cpf, $celular, $cep, $rua, $numero, 
  $bairro, $cidade, $uf, $pessoas, $renda
);

$stmt->execute();
header("Location: familias.php");
?>
