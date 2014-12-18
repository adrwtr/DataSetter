<?php
namespace DatabaseTest\Parser\Elementos\Tipos;

use Database\Parser\Elementos\Tipos\TipoNomeField;
use Database\Parser\Elementos\CampoPreencher;

class TipoNomeFieldTest extends \PHPUnit_Framework_TestCase
{
    public function testGetSet()
    {
        $objTipoNomeField = new TipoNomeField(
            new CampoPreencher('nome_do_campo', 'tipo_nome_field')
        );

        $this->assertEquals(
            '\'nome_do_campo\'',
            $objTipoNomeField->getResultado()
        );
    }
}