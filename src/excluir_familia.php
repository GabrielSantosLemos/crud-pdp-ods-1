<?php
include 'conexao.php';

$id = $_POST['id_familia'];
$stmt = $conexao->prepare("DELETE FROM familias WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

header("Location: familias.php");
?>