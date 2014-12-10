<?php
namespace DatabaseTest\Parser\Elementos;

use Database\Parser\Elementos\Tabela;
use DatabaseTest\Parser\DataParserTest;

class TabelaTest extends \PHPUnit_Framework_TestCase
{
    public function testParse()
    {
        $arrTabela = DataParserTest::mockArray();
        $chave = array_keys($arrTabela);
        $nome_tabela = $chave[0];

        $objTabela = new Tabela(
            $nome_tabela,
            $arrTabela[$nome_tabela]
        );

        $this->assertEquals(
            'estnc_areas',
            $objTabela->getNome()
        );

        $this->assertEquals(
            array(
                'ds_area' => "tipo_nomes",
                'sn_ativo' => "tipo_bool"
            ),
            $objTabela->getArrCamposPreencher()
        );

        $this->assertEquals(
            2,
            count($objTabela->getArrObjCamposPreencher())
        );
    }
}