<?php
namespace Database\Parser\Elementos\Tipos;

use Database\Parser\Elementos\CampoPreencher;
use Database\FonteDados\FonteAbstrata;
use Database\FonteDados\FonteArquivo;

class TipoBool extends Tipo {
    
    public function __construct(
        CampoPreencher $objCampoPreencher = null,
        FonteAbstrata $objFonteDados = null
    ) {
        // ..
    }

    /**
     * Retorna true of false
     * @return int
     */
    public function getResultado($index = 0)
    {
        return rand(0, 1);
    }
}