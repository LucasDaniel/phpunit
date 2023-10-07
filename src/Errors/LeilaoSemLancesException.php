<?php

namespace Alura\Leilao\Errors;

use Exception;

class LeilaoSemLancesException extends Exception {

    public function __construct()
    {
        return new Exception("Leilão sem lances");
    }

}

