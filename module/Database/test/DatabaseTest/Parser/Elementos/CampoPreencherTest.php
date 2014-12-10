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
            'tipo'
        );
        
        $this->assertEquals(
            'nome',
            $objCampoPreencher->getNome()
        );

        $this->assertEquals(
            'tipo',
            $objCampoPreencher->getTipo()
        );
    }

    public function testParse()
    {
        $objCampoPreencher = new CampoPreencher(
            'nome',
            'valor'
        );
        $objCampoPreencher->parse();
        $this->assertTrue(true);
    }
}