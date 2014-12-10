<?php
namespace Database\Parser\Elementos;

class CampoPreencher {
    
    /**
     * Nome do campo
     * @var string
     */
    private $nome;

    /**
     * Tipo do campo em string
     * @var string
     */
    private $tipo;

    /**
     * Tipo do campo
     * @var Tipo
     */
    private $objTipo;

    public function __construct($nome, $tipo)
    {
        $this->setNome($nome);
        $this->setTipo($tipo);
    }

    public function parse()
    {
        return true;
    }


    /**
     * Recupera nome do campo
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Seta o nome do campo
     *
     * @param string $nome the nome
     * @return self
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    /**
     * Retorna o tipo do campo no formato string
     * @return mixed
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Seta o tipo do campo
     * @param string $tipo the tipo
     * @return self
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
        return $this;
    }


    /**
     * pega o objeto Tipo do campo.
     * @return Tipo
     */
    public function getObjTipo()
    {
        return $this->objTipo;
    }

    /**
     * Seta o Tipo do campo.
     *
     * @param Tipo $objTipo the obj tipo
     * @return self
     */
    public function setObjTipo(Tipo $objTipo)
    {
        $this->objTipo = $objTipo;
        return $this;
    }
}