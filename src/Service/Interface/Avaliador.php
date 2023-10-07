<?php

interface InterfaceAvaliador {
    public function avalia($leilao): void;
    function avaliaMaiorValor($leilao): void;
    function avaliaMenorValor($leilao): void;
    function avaliaTresMaiores($leilao): void;
}

