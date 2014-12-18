<?php
namespace DatabaseTest\Parser\Elementos\Tipos;

use Database\Parser\Elementos\Tipos\Tipo;

class TipoTest extends \PHPUnit_Framework_TestCase
{
    public function testGetSet()
    {
        $objTipo = $this->getMock(
            'Tipo', 
            array(
                'getResultado',
                'getChave',
                'setChave'
            )
        );

        $objTipo->expects($this->any())
            ->method('getResultado')
            ->will(
                $this->returnValue(true)
            );

        $objTipo->expects($this->any())
            ->method('getChave')
            ->will(
                $this->returnValue(1)
            );

        $objTipo->setChave(null);

        $this->assertEquals(
            1,
            $objTipo->getChave()
        );

        $this->assertTrue(
            $objTipo->getResultado()
        );
    }
}