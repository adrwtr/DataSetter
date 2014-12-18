<?php
namespace Database\Parser\Elementos\Tipos;

use Database\Parser\Elementos\CampoPreencher;
use Database\FonteDados\FonteAbstrata;
use Database\FonteDados\FonteArquivo;

abstract class Tipo {

    private $objCampoPreencher;

    /**
     * Resultado é sempre um valor unico que o tipo deve retornar
     * @return [type] [description]
     */
    public abstract function getResultado($index = 0);

    /**
     * Construtor padrao para todos os tipos
     * @param CampoPreencher|null $objCampoPreencher [description]
     * @param FonteAbstrata|null  $objFonteDados     [description]
     */
    public abstract function __construct(
        CampoPreencher $objCampoPreencher = null,
        FonteAbstrata $objFonteDados = null
    );

    public function getObjCampoPreencher()
    {
        return $this->objCampoPreencher;
    }

    public function setObjCampoPreencher(CampoPreencher $objCampoPreencher = null)
    {
        $this->objCampoPreencher = $objCampoPreencher;
        return $this;
    }
}