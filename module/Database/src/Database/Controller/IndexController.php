<?php

namespace Database\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Database\File\ListaArquivosYaml;
use Database\File\ArquivoYaml;

class IndexController extends abstractActionController
{
    public static function getPath()
    {
        return realpath(dirname(__DIR__)) . '\Arquivos';
    }

    private function htmlConteudo($valor)
    {
        $valor = str_replace("\n", "<br>", $valor);
        $valor = str_replace(" ", "&nbsp;", $valor);

        return $valor;
    }

    public function indexAction()
    {
        return new ViewModel();
    }

    public function listaAction()
    {
        $objListaArquivosYaml = new ListaArquivosYaml();

        $arrArquivos = $objListaArquivosYaml->getArquivos(
            $this->getPath()
        );

        return new ViewModel(
            array(
                'arrArquivos' => $arrArquivos
            )
        );

    }

    public function arquivoAction()
    {
        $arquivo = $this->params()->fromRoute('arquivo', '');

        if ($arquivo != '') {
            $objArquivoYaml = new ArquivoYaml(
                $this->getPath() .'\\'. $arquivo
            );

            $conteudo = $objArquivoYaml->getConteudo();
            $conteudo = $this->htmlConteudo($conteudo);
        }

        return new ViewModel(
            array(
                'arquivo'   => $arquivo,
                'conteudo'  => $conteudo
            )
        );
    }
}