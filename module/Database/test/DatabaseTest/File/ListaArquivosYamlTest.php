<?php
namespace DatabaseTest\file;

use Database\File\ListaArquivosYaml;
use org\bovigo\vfs\vfsStream;

class ListaArquivosYamlTest extends \PHPUnit_Framework_TestCase
{    

    public function testgetArquivos()
    {
        // criando o mock
        $dir_test = 'exemplo_dir';
        $nome_arquivo = 'arquivo.txt';

        $dir_mock = vfsStream::setup($dir_test);

        vfsStream::newFile($nome_arquivo)
            ->at($dir_mock)
            ->setContent("The new contents of the file");


        // teste da classe
        $objDiretorioManipulation = new ListaArquivosYaml();
        $arrArquivos = $objDiretorioManipulation->getArquivos(
            vfsStream::url($dir_test)
        );

        $this->assertEquals(
            null, 
            $arrArquivos
        );        
    }

    public function testgetArquivosYaml()
    {
        // criando o mock
        $dir_test = 'exemplo_dir';
        $nome_arquivo = 'arquivo.yaml';

        $dir_mock = vfsStream::setup($dir_test);

        vfsStream::newFile($nome_arquivo)
            ->at($dir_mock)
            ->setContent("The new contents of the file");

        $arrArquivosTest = array(
            0 => $nome_arquivo
        );

        // teste da classe
        $objDiretorioManipulation = new ListaArquivosYaml();
        $arrArquivos = $objDiretorioManipulation->getArquivos(
            vfsStream::url($dir_test)
        );

        $this->assertEquals(
            $arrArquivosTest, 
            $arrArquivos
        );
    }

   
}