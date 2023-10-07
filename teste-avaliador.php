<?php

use Alura\Leilao\Model\Lance;
use Alura\Leilao\Model\Leilao;
use Alura\Leilao\Model\Usuario;
use Alura\Leilao\Service\Avaliador;

require 'vendor/autoload.php';

/*
// Arrange - Given
$leilao = new Leilao('Fiat 147 0KM');

$usuarios[] = new Usuario('Maria');
$usuarios[] = new Usuario('João');
$usuarios[] = new Usuario('Pablo');
$usuarios[] = new Usuario('Cler');
$usuarios[] = new Usuario('Junior');
$usuarios[] = new Usuario('Ana');
$usuarios[] = new Usuario('Tião');

if(is_countable($usuarios)) {
    for ($i = 0; $i < count($usuarios); $i++) {
        if ($i == 2) $leilao->recebeLance(new Lance($usuarios[$i], 2920)); //Maior valor
        else if ($i == 4) $leilao->recebeLance(new Lance($usuarios[$i], 2930)); //Maior valor
        else if ($i == 6) $leilao->recebeLance(new Lance($usuarios[$i], 3000)); //Maior valor
        else if ($i == 5) $leilao->recebeLance(new Lance($usuarios[$i], 1000)); //Menor valor
        else $leilao->recebeLance(new Lance($usuarios[$i], rand(1100,2900)));
    }
}

$leilao->getAvaliador()->avalia($leilao);

//$tresMaiores = $leilao->getAvaliador()->getTresMaiores();

var_dump($leilao);
*/
