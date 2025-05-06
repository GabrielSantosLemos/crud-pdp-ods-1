<?php

class Familia
{
    public int $id;
    public string $nomeResponsavel;
    public string $endereco;
    public float $rendaTotal;
    public string $dataCadastro;

    public function __construct(
        string $nomeResponsavel,
        string $endereco,
        float $rendaTotal,
        string $dataCadastro,
    ) {
        $this->nomeResponsavel = $nomeResponsavel;
        $this->endereco = $endereco;
        $this->rendaTotal = $rendaTotal;
        $this->dataCadastro = $dataCadastro;
    }
}
