<?php
namespace Database\Parser\Elementos;

class CampoParametros {

    private $arrParametros;

    /**
     * Adiciona um parametro
     * @param mixed
     * @param mixed
     */
    public function addParametro($chave, $valor)
    {
        $this->arrParametros[$chave] = $valor;
        return $this;
    }
    
    /**
     * retorna um parametro
     * @param  mixed
     * @return mixed
     */
    public function getParametro($chave)
    {
        return $this->arrParametros[$chave];
    }
}