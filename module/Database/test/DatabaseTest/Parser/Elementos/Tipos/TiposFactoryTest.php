<?php
namespace DatabaseTest\Parser\Elementos\Tipos;

use Database\Parser\Elementos\Tipos\TiposFactory;

class TiposFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testCriarTipo()
    {
        $objTipo = TiposFactory::criarTipo(
            'tipo_nome_proprio'
        );

        $this->assertEquals(
            'Database\Parser\Elementos\Tipos\Tipo',
            get_parent_class($objTipo) 
        );
    }

    /**
     * @expectedException Exception
     */
    public function testCriarTipoErro()
    {
        $objTipo = TiposFactory::criarTipo(
            'tipo_NAO_EXISTE'
        );

        $this->assertEquals(
            'Database\Parser\Elementos\Tipos\Tipo',
            get_parent_class($objTipo) 
        );
    }
}