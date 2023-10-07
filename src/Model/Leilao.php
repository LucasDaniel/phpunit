<?php

namespace Alura\Leilao\Model;

use Alura\Leilao\Service\Factory;
use Alura\Leilao\Service\Avaliador;

class Leilao
{
    /** @var Lance[] */
    private $lances;
    /** @var Avaliador */
    private $leiloeiro;
    /** @var int[] */
    private $topTresMaior;
    /** @var int */
    private $maiorValor;
    /** @var int */
    private $menorValor;

    public function __construct()
    {
        $this->lances = [];
        $this->leiloeiro = Factory::avaliador();
        $this->topTresMaior = [-99999,-99999,-99999];
        $this->maiorValor = -99999;
        $this->menorValor = 99999;
    }

    public function recebeLance(Lance $lance)
    {
        $this->lances[] = $lance;
    }

    public function getAvaliador(): Avaliador {
        return $this->leiloeiro;
    }

    /**
     * @return Lance[]
     */
    public function getLances(): array
    {
        return $this->lances;
    }

    public function setTresMaiores($topTresMaior): void {
        $this->topTresMaior = $topTresMaior;
    }

    public function getTresMaiores(): array {
        return $this->topTresMaior;
    }

    public function setMaiorValor($maiorValor): void {
        $this->maiorValor = $maiorValor;
    }

    public function getMaiorValor(): int {
        return $this->maiorValor;
    }

    public function setMenorValor($menorValor): void {
        $this->menorValor = $menorValor;
    }

    public function getMenorValor(): int {
        return $this->menorValor;
    }

}
