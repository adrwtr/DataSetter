<?php
namespace DatabaseTest\Parser;

use Database\Parser\DataParser;

class DataParserTest extends \PHPUnit_Framework_TestCase
{
    public static function mockCamposPreencher()
    {
        return array(
            'campos_preencher' => array(
                'ds_area' => 'tipo_nome_field',
                'sn_ativo' => 'tipo_nome_field'
            )
        );
            
    }

    public static function mockDePara()
    {
        return array(
            'de_para' => array(
                'nome_tabela' => array(
                    'origem' => 'campo',
                    'destino' => 'campo',
                    'registros' => 2,
                )
            )
        );          
    }

    public static function mockArray()
    {
        return array(
            'estnc_areas' => array(
                'campos_preencher' => array(
                    'ds_area' => 'tipo_nome_field',
                    'sn_ativo' => 'tipo_nome_field'
                ),
                'registros' => 2,
                'de_para' => array(
                    'nome_tabela' => array(
                        'origem' => 'campo',
                        'destino' => 'campo',
                        'registros' => 2,
                    )
                )
            ),

            'estnc_valores' => array(
                'campos_preencher' => array(
                    'ds_area' => 'tipo_nome_field',
                    'sn_ativo' => 'tipo_nome_field'
                ),
                'registros' => 2,
                'de_para' => array(
                    'nome_tabela' => array(
                        'origem' => 'campo',
                        'destino' => 'campo',
                        'registros' => 2,
                    )
                )
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