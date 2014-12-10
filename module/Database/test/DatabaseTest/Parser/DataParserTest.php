<?php
namespace DatabaseTest\Parser;

use Database\Parser\DataParser;

class DataParserTest extends \PHPUnit_Framework_TestCase
{
    public static function mockCamposPreencher()
    {
        return array(
            'campos_preencher' => array(
                'ds_area' => 'tipo_nomes',
                'sn_ativo' => 'tipo_bool'
            )
        );
            
    }
    public static function mockArray()
    {
        return array(
            'estnc_areas' => array(
                'campos_preencher' => array(
                    'ds_area' => 'tipo_nomes',
                    'sn_ativo' => 'tipo_bool'
                ),
                'registros' => 10
            ),

            'estnc_valores' => array(
                'campos_preencher' => array(
                    'ds_area' => 'tipo_nomes',
                    'sn_ativo' => 'tipo_bool'
                ),
                'registros' => 10
            ),
        );
    }


    public function testParseTabelas()
    {
        $objDataParser = new DataParser(
            $this->mockArray()
        );       

        $objDataParser->parseTabelas();
        $arrObjTabelas = $objDataParser->getArrObjTabelas();

        $this->assertTrue(
            is_a(
                $arrObjTabelas[0], 
                'Database\Parser\Elementos\Tabela'
            )            
        ); 
    }
}