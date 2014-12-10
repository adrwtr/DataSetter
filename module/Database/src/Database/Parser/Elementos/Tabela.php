<?php
namespace Database\Parser\Elementos;

use Database\Parser\Elementos\CampoPreencher;

class Tabela {

    const CAMPOS_PREENCHER = 'campos_preencher';

    /**
     * nome da tabela
     * @var string
     */
    private $nome;

    /**
     * Campos a serem preenchidos da tabela
     * @var array
     */
    private $arrCamposPreencher;
    
    /**
     * array de campos a preencher
     * @var [type]
     */
    private $arrObjCampoPreencher;


    public function __construct($nome_tabela, $arrValores)
    {
        $this->setNome($nome_tabela);
        $this->parse($arrValores);
    }

    /**
     * Retorna o nome da tabela
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Seta o nome da tabela
     *
     * @param string $nome
     * @return self
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    /**
     * Realiza o parse da tabela
     * @param  array $arrValores 
     * @return self
     */
    public function parse($arrValores)
    {
        $this->arrCamposPreencher = $arrValores[self::CAMPOS_PREENCHER];
        $this->parseCamposPreencher();

        return $this;
    }

    /**
     * Realiza o parse dos campos
     * @param  array $arrValores campos
     * @return self
     */
    private function parseCamposPreencher()
    {
        if (count($this->getArrCamposPreencher()) > 0) {
            foreach ($this->getArrCamposPreencher() as $campo => $tipo) {
                $this->arrObjCampoPreencher[] = new CampoPreencher($campo, $tipo);
            }
        }

        return $this;
    }

    /**
     * retorna os campos em modo array
     * @return array
     */
    public function getArrCamposPreencher()
    {
        return $this->arrCamposPreencher;
    }

    /**
     * Retorna os objetos campos
     * @return array of CamposPreencher
     */
    public function getArrObjCamposPreencher()
    {
        return $this->arrObjCampoPreencher;
    }
        
}