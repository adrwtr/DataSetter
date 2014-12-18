<?php
namespace DatabaseTest\Parser\Elementos\Tipos;

use Database\Parser\Elementos\Tipos\TipoBool;

class TipoBoolTest extends \PHPUnit_Framework_TestCase
{
    public function testGetSet()
    {
        $objTipoBool = new TipoBool();
        $result = $objTipoBool->getResultado();
        $result = ( $result == 1 || $result == 0 ? true : false );

        $this->assertTrue(            
            $result
        );
    }
}