<?php
include 'conexao.php';

$id = $_POST['id_familia'];
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

$stmt = $conexao->prepare("UPDATE familias SET 
  nome_responsavel = ?, cpf = ?, celular = ?, cep = ?, rua = ?, numero = ?, 
  bairro = ?, cidade = ?, uf = ?, num_pessoas = ?, renda = ?
  WHERE id = ?");

$stmt->bind_param("ssssssssssdi",
  $nome_responsavel, $cpf, $celular, $cep, $rua, $numero,
  $bairro, $cidade, $uf, $pessoas, $renda, $id
);

$stmt->execute();
header("Location: familias.php");
?>
