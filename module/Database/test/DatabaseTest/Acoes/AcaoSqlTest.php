<?php
namespace DatabaseTest\Acoes;

use Database\Acoes\AcaoSql;

class AcaoSqlTest extends \PHPUnit_Framework_TestCase
{
    public function testExecutar()
    {
        $objAcaoSql = new AcaoSql();
        $objAcaoSql->executar();

        $this->assertEquals(
            null,
            $objAcaoSql->getLog()
        );
    }
}