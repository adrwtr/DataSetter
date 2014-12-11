<?php
namespace Database\Parser\Elementos;

use Database\Parser\Elementos\CampoPreencher;

class Tabela {

    const CAMPOS_PREENCHER = 'campos_preencher';
    const QTD_REGISTROS = 'registros';
    const DE_PARA = 'de_para';

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
     * quantidade de registros a serem criados
     * @var int
     */
    private $qtd_registros;
    
    /**
     * array de campos a preencher
     * @var array of CampoPreencher
     */
    private $arrObjCampoPreencher;

    /**
     * array de depara - as foreingkeys
     * @var array of DePara
     */
    private $arrObjDePara;


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
        $this->setQtdRegistros(
            $arrValores[self::QTD_REGISTROS]
        );
        
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

    /**
     * Retorna a quantidade de registros
     * @return int
     */
    public function getQtdRegistros()
    {
        return $this->qtd_registros;
    }

    /**
     * Seta a quantidade de registros
     * @param int
     * @return self
     */
    public function setQtdRegistros($valor)
    {
        $this->qtd_registros = $valor;
        return $this;
    }

    /**
     * retorna o array de de para - foreingkeys
     * @return array of DePara
     */
    public function getArrObjDePara()
    {
        return $this->arrObjDePara;
    }
        
}