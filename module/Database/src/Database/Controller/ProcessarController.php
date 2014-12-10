<?php

namespace Database\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Database\File\ArquivoYaml;
use Database\Parser\DataParser;

class ProcessarController extends abstractActionController
{
    public function processarAction()
    {
        $arquivo = $this->params()
            ->fromRoute('arquivo', '');

        $this->process($arquivo);

        return new ViewModel();
    }

    private function process($arquivo)
    {
        if ($arquivo != '') {
            $objArquivoYaml = new ArquivoYaml(
                $this->getPath() .'\\'. $arquivo
            );

            $arrYaml = $objArquivoYaml->getYaml();
            $objDataParser = new DataParser($arrYaml);
            return $objDataParser;
        }
    }
}