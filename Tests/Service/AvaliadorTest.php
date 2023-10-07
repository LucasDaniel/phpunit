<?php

namespace Alura\Leilao\Tests\Service;

use Alura\Leilao\Errors\LeilaoSemLancesException;
use Alura\Leilao\Model\Leilao;
use Alura\Leilao\Service\Factory;
use PHPUnit\Framework\TestCase;

class AvaliadorTest extends TestCase{

    public static function setUpBeforeClass(): void {

    }
    public function setUp(): void {
        
    }
    public function tearDown(): void {
        
    }
    public static function tearDownAfterClass(): void {
        
    }
    
    private function leilaoTeste() {
        
        $leilao = Factory::leilao('Fiat 147 0KM');

        for ($i = 0; $i < 100; $i++) {
            $usuarios[] = Factory::user('Usuario'.$i);
            if ($i == 12) $leilao->recebeLance(Factory::lance($usuarios[$i], 2920)); //Maior valor 3
            else if ($i == 41) $leilao->recebeLance(Factory::lance($usuarios[$i], 2930)); //Maior valor 2
            else if ($i == 61) $leilao->recebeLance(Factory::lance($usuarios[$i], 3000)); //Maior valor 1
            else if ($i == 51) $leilao->recebeLance(Factory::lance($usuarios[$i], 1000)); //Menor valor
            else $leilao->recebeLance(Factory::lance($usuarios[$i], rand(1100,2900)));
        }

        return $leilao;

    }

    /**
     * @dataProvider entregaLeiloes
     */
    public function testMaiorValor(Leilao $leilao) {
        
        $leilao->getAvaliador()->avalia($leilao);

        $maiorValor = $leilao->getMaiorValor();

        self::assertEquals(3000,$maiorValor);
        
    }

    /**
     * @dataProvider entregaLeiloes
     */
    public function testMenorValor(Leilao $leilao) {

        $leilao->getAvaliador()->avalia($leilao);

        $menorValor = $leilao->getMenorValor();

        self::assertEquals(1000,$menorValor);
                
    }

    /**
     * @dataProvider entregaLeiloes
     */
    public function testTresMaioresValores(Leilao $leilao) {

        $leilao->getAvaliador()->avalia($leilao);

        $tresMaiores = $leilao->getTresMaiores();

        //Verifica se tem 3 maiores valores
        self::assertCount(3,$tresMaiores);

        //Verifica se tem 3 maiores valores
        self::assertEquals(3000,$tresMaiores[0]->getValor());
        self::assertEquals(2930,$tresMaiores[1]->getValor());
        self::assertEquals(2920,$tresMaiores[2]->getValor());

    }
    
    public function testLeilaoSemLances() {
        $this->expectException(LeilaoSemLancesException::class);
        $leilao = Factory::leilao("Fusca");
        $leilao->getAvaliador()->avalia($leilao);
    }

    public function entregaLeiloes() {
        return [
            'Leilão teste' => [self::leilaoTeste()]
        ];
    }

}