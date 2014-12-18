<?php
namespace DatabaseTest\Parser\Elementos;

use Database\Parser\Elementos\CampoParametros;

class CampoParametrosTest extends \PHPUnit_Framework_TestCase
{

    public function testGetArrParametros()
    {
        $objCampoParametros = new CampoParametros();
        $objCampoParametros->addParametro(
            'parametro',
            'valor1'
        );

        $this->assertEquals(
            'valor1',
            $objCampoParametros->getParametro(
                'parametro'
            )
        );
    }
}