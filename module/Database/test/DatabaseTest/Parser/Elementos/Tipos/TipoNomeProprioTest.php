<?php
namespace DatabaseTest\Parser\Elementos\Tipos;

use Database\Parser\Elementos\Tipos\TipoNomeProprio;

class TipoNomeProprioTest extends \PHPUnit_Framework_TestCase
{
    public function testGetSet()
    {
        $objTipoNomeProprio = new TipoNomeProprio();

        $this->assertTrue(            
            count($objTipoNomeProprio->getResultado(0)) > 0
        );
    }
}