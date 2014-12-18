<?php
namespace DatabaseTest\Parser\Elementos;

use Database\Parser\Elementos\Tabela;
use DatabaseTest\Parser\DataParserTest;

class TabelaTest extends \PHPUnit_Framework_TestCase
{

    public static function mockObjTabelaTest()
    {
        $arrTabela = DataParserTest::mockArray();
        $chave = array_keys($arrTabela);
        $nome_tabela = $chave[0];

        $objTabela = new Tabela(
            $nome_tabela,
            $arrTabela[$nome_tabela]
        );

        return $objTabela;
    }

    public function testParse()
    {
        $objTabela = self::mockObjTabelaTest();

        $this->assertEquals(
            'estnc_areas',
            $objTabela->getNome()
        );

        $this->assertEquals(
            array(
                'ds_area' => "tipo_nome_field",
                'sn_ativo' => "tipo_nome_field"
            ),
            $objTabela->getArrCamposPreencher()
        );

        $this->assertEquals(
            2,
            count($objTabela->getArrObjCamposPreencher())
        );

        $this->assertEquals(
            2,
            $objTabela->getQtdRegistros()
        );

        $this->assertEquals(
            1,
            count($objTabela->getArrObjDePara())
        );

        $this->assertEquals(
            array(
                'nome_tabela' => array(
                    'origem' => 'campo',
                    'destino' => 'campo',
                    'registros' => 2,
                )
            ),
            $objTabela->getArrDePara()
        );
    }

    /**
     * @expectedException Exception     
     */
    public function testExceptionBranco()
    {
        
            new Tabela(
                'nome_tabela',
                array()
            );
        

    }

    /**
     * @expectedException Exception
     */
    public function testExceptionBrancoCampos()
    {

        new Tabela(
            'nome_tabela',
            
                array(              
                    'registros' => 2,
                    'de_para' => array(
                        'nome_tabela' => array(
                            'origem' => 'campo',
                            'destino' => 'campo',
                            'registros' => 2,
                        )
                    )
                )
            

        );
    }
}