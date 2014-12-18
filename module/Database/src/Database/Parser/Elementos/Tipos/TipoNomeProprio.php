<?php
namespace Database\Parser\Elementos\Tipos;

use Database\FonteDados\FonteAbstrata;
use Database\FonteDados\FonteArquivo;

use Database\Parser\Elementos\CampoPreencher;


class TipoNomeProprio extends Tipo {

    const PATH_PADRAO = '\Arquivos\tipo_nome.txt';

    /**
     * Fonte dos nomes
     * @var array
     */
    private $arrFonteDados;

    /**
     * Recebe uma fonte de dados não obrigatória
     * A fonte deve retornar nomes de pessoas
     * @param FonteDados|null $objFonteDados
     */
    public function __construct(
        CampoPreencher $objCampoPreencher = null,
        FonteAbstrata $objFonteDados = null
    ) {
        $objFonteDados = $this->verificaFonteDados(
            $objFonteDados
        );

        $this->setArrFonteDados(
            $objFonteDados->getArrDados()
        );
    }

    /**
     * Retorna um resultado da tabela de dados
     * @param  integer $index posição do resultado
     * @return string
     */
    public function getResultado($index = 0)
    {
        return '\''. $this->getValor($index) .'\'';
    }

    /**
     * Seta a fonte de dados e já realiza o random
     * @param array
     */
    public function setArrFonteDados($arrValores)
    {
        shuffle($arrValores);
        $this->arrFonteDados = $arrValores;
        
        return $this;
    }

    /**
     * Retorna um valor da fonte de dados
     * @param  int $index [description]
     * @return string
     */
    public function getValor($index = 0)
    {
        $index = $this->corrigeIndex(
            $index,
            count($this->arrFonteDados)
        );
        return $this->arrFonteDados[$index];
    }

    /**
     * Verifica se foi enviado uma fonte de dados
     * Caso não tenha sido enviado, le um arquivo padrao
     * 
     * @param  FonteDados|null $objFonteDados
     * @return FonteDados
     */
    private function verificaFonteDados(FonteAbstrata $objFonteDados = null)
    {
        if ( $objFonteDados == null ) {
            $objFonteDados = new FonteArquivo(
                realpath(dirname(__DIR__)) . '..\\..\\..\\' . self::PATH_PADRAO
            );
        }

        return $objFonteDados;
    }

    /**
     * Corrige o index para sempre ter um elemento
     * @param  integer $index [description]
     * @param  integer $total [description]
     * @return [type]         [description]
     */
    private function corrigeIndex($index = 0, $total = 1)
    {
        if ($index > $total ) {
            $index = ( $index - ($total*floor($index/$total)));
        }
        $index = $index - 1 ;

        return ( $index < 0 ? 0 : $index );
    }
}