<?php

namespace Database\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Database\Controller\IndexController;

use Database\File\ArquivoYaml;
use Database\Parser\DataParser;
use Database\Acoes\AcaoGerarInsert;


class ProcessarController extends abstractActionController
{
    public function processarAction()
    {
        $arquivo = $this->params()
            ->fromRoute('arquivo', '');


        $objDataParser = $this->processar($arquivo);

        foreach ($objDataParser->getArrObjTabelas() as $value) {
            $objAcaoGerarInsert = new AcaoGerarInsert($value);
            $objAcaoGerarInsert->executar();
            $sql .= $objAcaoGerarInsert->getLog();
        }

        return new ViewModel(array('sql' => $sql));
    }

    /**
     * processa o arquivo
     * @param  string arquivo
     * @return DataParser
     */
    private function processar($arquivo)
    {
        if ($arquivo != '') {
            $objArquivoYaml = new ArquivoYaml(
                IndexController::getPath() .'\\'. $arquivo
            );

            $arrYaml = $objArquivoYaml->getYaml();
            $objDataParser = new DataParser($arrYaml);
            $objDataParser->parseTabelas();
            return $objDataParser;
        }
    }
}