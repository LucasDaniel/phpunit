<?php

namespace Alura\Leilao\Service;

use Alura\Leilao\Model\Lance;
use Alura\Leilao\Model\Leilao;
use Alura\Leilao\Model\Usuario;

class Factory
{

    public static function avaliador(): Avaliador {
        return new Avaliador();
    }

    public static function leilao(string $name): Leilao {
        return new Leilao($name);
    }

    public static function user(string $name): Usuario {
        return new Usuario($name);
    }

    public static function lance(Usuario $user, int $value): Lance {
        return new Lance($user, $value);
    }

}