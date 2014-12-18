<?php
namespace Database\Acoes;

use Database\Acoes\Acao;
use Database\Parser\Elementos\Tabela;

/**
 * Responsavel por gerar um insert into
 */
class AcaoGerarInsert extends Acao {

    /**
     * Array com a lista de campos
     * @var array
     */
    private $arrCampos;

    /**
     * array com os valores dos campos
     * @var array
     */
    private $arrValores;

    public function __construct(Tabela $objTabela)
    {
        $this->setObjTabela($objTabela);
    }

    /**
     * Retorna os campos do insert 
     * @return array
     */
    private function getArrCampos()
    {
        return $this->arrCampos;
    }

    /**
     * Retorna a lista dupla encadeada de valores
     * @return array of array
     */
    private function getArrValores()
    {
        return $this->arrValores;
    }

    /**
     * Retorna se tem campos
     * @return bool
     */
    private function testaTemCampos()
    {
        $arrObjCampoPreencher = $this->getArrObjCamposPreencher();

        return (is_array($arrObjCampoPreencher) && count($arrObjCampoPreencher) > 0);
    }

    /**
     * Execução abstrata
     */
    public function executar()
    {
        if ( $this->testaTemCampos() == true ) {
            $this->parseCamposValores(
                $this->getArrObjCamposPreencher()
            );
        }
        
        $sql = $this->getInicioInsert();
        $sql .= $this->getValores() . ';<BR>';

        $this->setLog(
            $sql
        );
    }

    /**
     * Recupera o inicio de um sql
     * @return string
     */
    public function getInicioInsert()
    {
        $tabela = $this->getObjTabela()
            ->getNome();

        $campos = $this->getListaCampos();

        return "insert into ". $tabela . " ( "
            . $campos . ' ) values ';
    }

    /**
     * retorna a lista de campos
     * @return string
     */
    private function getListaCampos()
    {
        if ( $this->getArrCampos() != null ) {
            return implode(', ', $this->getArrCampos());
        }

        return '';
    }

    /**
     * Cria os campos e os valores
     * @param array of CampoPreencher
     * @return self
     */
    private function parseCamposValores($arrObjCampoPreencher)
    {
        foreach ($arrObjCampoPreencher as $objCampoPreencher) {
            $this->arrCampos[] = $objCampoPreencher->getNome();
            $this->parseValores($objCampoPreencher);
        }

        return $this;
    }


    /**
     * Retorna os valores de todos os registros a serem gerados
     * @return string
     */
    public function getValores()
    {
        $str = '';
        $arrValores = null;

        if ( is_array($this->getArrValores()) == true ) {
            foreach ($this->getArrValores() as $arrValor) {
                $str = '('
                     . implode(', ', $arrValor)
                     . ')';
                $arrValores[] = $str;
            }

            return implode(', ', $arrValores);
        }

        return null;
    }

    /**
     * Realiza o parse dos valores
     * @param  \Database\Parser\Elementos\CampoPreencher $objCampoPreencher 
     * @return self
     */
    private function parseValores(
        \Database\Parser\Elementos\CampoPreencher $objCampoPreencher
    ) {
        // $objCampoPreencher->getObjTipo();
        $qtd_registros = $this->getObjTabela()
            ->getQtdRegistros();
        
        for ($i=0; $i<$qtd_registros; $i++) {
            $nome_campo = $objCampoPreencher->getNome();
            $this->arrValores[$i][ $nome_campo ] = $objCampoPreencher->getResultado($i);
        }

        return $this;
    }

    /**
     * Retorna o array de campos da tabela
     * @return array of CamposPreencher
     */
    private function getArrObjCamposPreencher()
    {
        return $this->getObjTabela()
            ->getArrObjCamposPreencher();
    }

    
}