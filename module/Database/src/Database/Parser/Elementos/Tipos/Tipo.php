<?php
namespace Database\Parser\Elementos\Tipos;

abstract class Tipo {
    
    /**
     * chave do tipo
     * @var string
     */
    private $chave;

    /**
     * [getResultado description]
     * @return [type] [description]
     */
    public abstract function getResultado();

    /**
     * Seta a Chave
     * @param  string $valor
     * @return self
     */
    public function setChave($valor)
    {
        $this->chave = $valor;
        return $this;
    }

    /**
     * Retorna a chave
     * @return string
     */
    public function getChave()
    {
        return $this->chave;
    }
}