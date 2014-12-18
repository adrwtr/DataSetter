<?php
namespace DatabaseTest\Parser\Elementos;

use Database\Parser\Elementos\DePara;

class DeParaTest extends \PHPUnit_Framework_TestCase
{
    public function testGetSet()
    {
        $objDePara = new DePara(
            'nome_tabela',
            'origem',
            'destino',
            'registros'
        );
        
        $this->assertEquals(
            'nome_tabela',
            $objDePara->getNomeTabela()
        );

        $this->assertEquals(
            'origem',
            $objDePara->getCampoOrigem()
        );

        $this->assertEquals(
            'destino',
            $objDePara->getCampoDestino()
        );

        $this->assertEquals(
            'registros',
            $objDePara->getQtdRegistros()
        );

    }
}