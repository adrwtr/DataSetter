<?php
namespace DatabaseTest\file;

use Database\File\ArquivoYaml;
use org\bovigo\vfs\vfsStream;

class ArquivoYamlTest extends \PHPUnit_Framework_TestCase
{  
    private function mockConteudo()
    {
        return '
Arquivo:
    Valor: 10        
        ';
    }

    private function mockArquivo()
    {        
        $dir_test = 'exemplo_dir';
        $nome_arquivo = 'arquivo.yaml';

        $dir_mock = vfsStream::setup($dir_test);

        vfsStream::newFile($nome_arquivo)
            ->at($dir_mock)
            ->setContent(
                $this->mockConteudo()
            );

        $objArquivo = new ArquivoYaml(
            vfsStream::url('exemplo_dir/arquivo.yaml')
        );

        return $objArquivo;
    }

    public function testSetGet()
    {
        $objArquivoYaml = $this->mockArquivo();

        $arrConteudo = array(
            'Arquivo' => array(
                'Valor' => 10
            )
        );

        $this->assertEquals(
            $arrConteudo,
            $objArquivoYaml->getYaml()
        );
    }

}


