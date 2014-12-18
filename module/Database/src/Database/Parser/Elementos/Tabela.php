<?php
namespace Database\Parser\Elementos;

use Database\Parser\Elementos\CampoPreencher;
use Database\Parser\Elementos\DePara;

class Tabela {

    const CAMPOS_PREENCHER = 'campos_preencher';
    const QTD_REGISTROS = 'registros';
    const DE_PARA = 'de_para';
    const ORIGEM = 'origem';
    const DESTINO = 'destino';
    const REGISTROS = 'registros';


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

    /**
     * array com o valor depara
     * @var array
     */
    private $arrDePara;


    public function __construct($nome_tabela, $arrValores)
    {
        $this->setNome($nome_tabela);
        $this->verificaArrValores($arrValores);
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

        if ( array_key_exists(self::DE_PARA, $arrValores) == true ) {
            $this->arrDePara = $arrValores[self::DE_PARA];
        }
                
        $this->parseDePara();

        return $this;
    }

    /**
     * Realiza o parse dos campos
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

    public function getArrDePara()
    {
        return $this->arrDePara;
    }

    /**
     * Realiza o parse dos de-para
     * @return self
     */
    private function parseDePara()
    {
        if (count($this->getArrDePara()) > 0) {
            foreach ($this->getArrDePara() as $nome_tabela => $array) {

                $this->arrObjDePara[] = new DePara(
                    $nome_tabela,
                    $array[self::ORIGEM],
                    $array[self::DESTINO],
                    $array[self::REGISTROS]
                );
            }
        }

        return $this;
    }

    /**
     * Realiza o teste para verificar se a tabela está bem formada
     * @param  array
     */
    private function verificaArrValores($arrValores)
    {
        if ( array_key_exists(self::QTD_REGISTROS, $arrValores) == false ) {
            throw new \Exception('A chave '. self::QTD_REGISTROS . ' não existe. Favor criar no YAML.');
        }
        
        if ( array_key_exists(self::CAMPOS_PREENCHER, $arrValores) == false ) {
            throw new \Exception('A chave '. self::CAMPOS_PREENCHER . ' não existe. Favor criar no YAML.');
        }
    }
}