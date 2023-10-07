<?php

namespace Alura\Leilao\Service;

use Alura\Leilao\Errors\LeilaoSemLancesException;

class Avaliador
{

    public function avalia($leilao): void {

        if (empty($leilao->getLances())) {
            throw new LeilaoSemLancesException();
        }

        self::avaliaMaiorValor($leilao);
        self::avaliaMenorValor($leilao);
        self::avaliaTresMaiores($leilao);
    }

    function avaliaMaiorValor($leilao): void {
        foreach($leilao->getLances() as $lance) {
            if ($lance->getValor() > $leilao->getMaiorValor()) {
                $leilao->setMaiorValor($lance->getValor());
            }
        }
    }

    function avaliaMenorValor($leilao): void {
        foreach($leilao->getLances() as $lance) {
            if ($lance->getValor() < $leilao->getMenorValor()) {
                $leilao->setMenorValor($lance->getValor());
            }
        }
    }

    function avaliaTresMaiores($leilao): void {
        $lances = $leilao->getLances();
        usort($lances, 
            function ($lance1, $lance2) {
                if ($lance1->getValor() == $lance2->getValor()) {
                    return 0;
                }
                return ($lance1->getValor() > $lance2->getValor()) ? -1 : 1;
            }
        );
        $leilao->setTresMaiores(array_slice($lances,0,3));
    }
}
