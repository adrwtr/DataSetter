<?php
namespace DatabaseTest\FonteDados;

use Database\FonteDados\FonteArquivo;

use Database\File\Arquivo;
use org\bovigo\vfs\vfsStream;

class FonteArquivoTest extends \PHPUnit_Framework_TestCase
{
    public function testGetArrDados()
    {
        $objFonteArquivo = new FonteArquivo(
            $this->criarArquivo()
        );

        $arrValores = array(
            0 => 'Valor 1',            
            1 => 'Valor 2'
        );

        $this->assertEquals(
            $arrValores,
            $objFonteArquivo->getArrDados()
        );
    }


    private function criarArquivo()
    {
        $conteudo = "Valor 1\nValor 2";

        // criando o mock 
        $dir_test = 'exemplo_dir';
        $nome_arquivo = 'arquivo.yaml';

        $dir_mock = vfsStream::setup($dir_test);

        vfsStream::newFile($nome_arquivo)
            ->at($dir_mock)
            ->setContent($conteudo);
                
        return vfsStream::url('exemplo_dir/arquivo.yaml');
    }
}