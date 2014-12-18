<?php
namespace Database\Acoes;

use Database\Parser\Elementos\Tabela;

abstract class Acao {

    /**
     * obj Tabela a ser tratado
     * @var Tabela
     */
    private $objTabela;

    /**
     * Possível log de execução
     * @var string
     */
    private $log;

    /**
     * Execução abstrata
     */
    public abstract function executar();

    /**
     * Seta o objeto Tabela
     * @param Tabela $objTabela 
     */
    public function setObjTabela(Tabela $objTabela)
    {
        $this->objTabela = $objTabela;
        return $this;
    }

    /**
     * Retorna o objeto tabela
     * @return Tabela
     */
    public function getObjTabela()
    {
        return $this->objTabela;
    }

    /**
     * seta o log
     * @param string
     */
    protected function setLog($valor)
    {
        $this->log .= $valor;
        return $this;
    }

    /**
     * Retorna o log
     * @return string
     */
    public function getLog()
    {
        return $this->log;
    }
}