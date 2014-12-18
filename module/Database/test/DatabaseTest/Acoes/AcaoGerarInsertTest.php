<?php
namespace DatabaseTest\Acoes;

use Database\Acoes\AcaoGerarInsert;
use Database\Parser\Elementos\Tabela;

use DatabaseTest\Parser\Elementos\TabelaTest;

class AcaoGerarInsertTest extends \PHPUnit_Framework_TestCase
{    
    public function testExecutar()
    {
        $objTabela = TabelaTest::mockObjTabelaTest();

        $objAcaoSql = new AcaoGerarInsert($objTabela);
        //$objAcaoSql->setObjTabela($objTabela);
        $objAcaoSql->executar();

        $this->assertEquals(
            "insert into estnc_areas ( ds_area, sn_ativo ) values ('ds_area', 'sn_ativo'), ('ds_area', 'sn_ativo');<BR>",
            $objAcaoSql->getLog()
        );
    }

    public function testGetValores()
    {
        $objTabela = TabelaTest::mockObjTabelaTest();

        $objAcaoSql = new AcaoGerarInsert($objTabela);
        // $objAcaoSql->setObjTabela($objTabela);
        $objAcaoSql->executar();

        $str = $objAcaoSql->getValores();

        $this->assertEquals(
            '(\'ds_area\', \'sn_ativo\'), (\'ds_area\', \'sn_ativo\')',
            $str
        );
    }

    /**
     * Teste de campos em branco
     */
    public function testBranco()
    {
        $arrTabela = array(
            'campos_preencher' => array(
            ),
            'registros' => 0
        );

        $objAcaoSql = new AcaoGerarInsert(
            new Tabela('tabela', $arrTabela )
        );        
        $objAcaoSql->executar();
        
        $str = $objAcaoSql->getValores();

        $this->assertEquals(
            null,
            $str
        );
    }
}