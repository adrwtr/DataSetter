<?php
namespace Database\Parser\Elementos\Tipos;

use Database\Parser\Elementos\CampoPreencher;
use Database\FonteDados\FonteAbstrata;
use Database\FonteDados\FonteArquivo;

/**
 * Deve retornar o próprio nome do field
 */
class TipoNomeField extends Tipo {
    
    public function __construct(
        CampoPreencher $objCampoPreencher = null,
        FonteAbstrata $objFonteDados = null
    ) {
        // $this->objCampoPreencher = $objCampoPreencher;
        $this->setObjCampoPreencher(
            $objCampoPreencher
        );
    }


    public function getResultado($index = 0)
    {
        $nome = '';

        if ( $this->getObjCampoPreencher() != null ) {
            $nome = $this->getObjCampoPreencher()
                ->getNome();
        }

        return '\''. $nome .'\'';
    }
}