<?php

namespace Alura\Leilao\Model;

class Lance
{
    /** @var Usuario */
    private $usuario;
    /** @var int */
    private $valor;

    public function __construct(Usuario $usuario, int $valor)
    {
        $this->usuario = $usuario;
        $this->valor = $valor;
    }

    public function getUsuario(): Usuario
    {
        return $this->usuario;
    }

    public function getValor(): int
    {
        return $this->valor;
    }
}
