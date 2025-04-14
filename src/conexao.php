<?php

// $host = 'localhost';
// $usuario = 'root';
// $senha = '';
// $banco = 'familias_db';

$host = 'localhost';    
$usuario = 'username';      
$senha = 'password';            
$banco = 'database'; 


$conexao = new mysqli($host, $usuario, $senha, $banco);

if ($conexao->connect_error) {
    die("Erro de conexão: " . $conexao->connect_error);
}
?>