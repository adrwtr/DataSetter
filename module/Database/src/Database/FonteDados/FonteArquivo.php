<?php
namespace Database\FonteDados;

use Database\FonteDados\FonteAbstrata;
use Database\File\Arquivo;

class FonteArquivo extends FonteAbstrata{
    
    private $objArquivo;

    public function __construct($path_arquivo)
    {
        $this->setObjArquivo($path_arquivo);
    }

    private function setObjArquivo($path_arquivo)
    {
        $this->objArquivo = new Arquivo($path_arquivo);
    }

    /**
     * Retorna o conteudo das linhas em um array
     * @return array 
     */
    public function getArrDados()
    {
        $conteudo = $this->objArquivo->getConteudo();
        $arrValores = explode("\n", $conteudo);

        return $arrValores;
    }
}