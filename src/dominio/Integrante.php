<?php

class Integrante
{
  public string $nome;
  public string $sobrenome;
  public int $idade;
  public string $genero;
  public string $familiaridade;

  public function __construct(
    string $nome,
    string $sobrenome,
    int $idade,
    string $genero,
    string $familiaridade
  ) {
    $this->nome = $nome;
    $this->sobrenome = $sobrenome;
    $this->idade = $idade;
    $this->genero = $genero;
    $this->familiaridade = $familiaridade;
  }
}
