<?php
namespace DatabaseTest\Parser\Elementos;

use Database\Parser\Elementos\CampoPreencher;
use DatabaseTest\Parser\DataParserTest;

class CampoPreencherTest extends \PHPUnit_Framework_TestCase
{
    public function testGetSet()
    {
        $objCampoPreencher = new CampoPreencher(
            'nome',
            'tipo_nome_field'
        );
        
        $this->assertEquals(
            'nome',
            $objCampoPreencher->getNome()
        );

        $this->assertEquals(
            'tipo_nome_field',
            $objCampoPreencher->getTipo()
        );
    }

    public function testParse()
    {
        $objCampoPreencher = new CampoPreencher(
            'nome',
            'tipo_nome_field'
        );
        $objCampoPreencher->parse();

        $this->assertEquals(
            'Database\Parser\Elementos\Tipos\TipoNomeField',
            get_class($objCampoPreencher->getObjTipo())
        );
    }
}