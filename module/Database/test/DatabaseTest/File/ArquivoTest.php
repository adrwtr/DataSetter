<?php
namespace DatabaseTest\file;

use Database\File\Arquivo;
use org\bovigo\vfs\vfsStream;

class ArquivoTest extends \PHPUnit_Framework_TestCase
{    

    public function testgetConteudo()
    {
        // criando o mock
        $dir_test = 'exemplo_dir';
        $nome_arquivo = 'arquivo.yaml';

        $dir_mock = vfsStream::setup($dir_test);

        vfsStream::newFile($nome_arquivo)
            ->at($dir_mock)
            ->setContent("conteudo");

        $objArquivo = new Arquivo(
            vfsStream::url('exemplo_dir/arquivo.yaml')
        );
        $conteudo_arquivo = $objArquivo->getConteudo();

        $this->assertEquals(
            'conteudo', 
            $conteudo_arquivo
        );        
    }

    public function testsetFilePath()
    {
        $path = 'exemplo_dir/arquivo.yaml';

        $objArquivo = new Arquivo(
            vfsStream::url($path)
        );

        $this->assertEquals(
            'vfs://exemplo_dir/arquivo.yaml',
            $objArquivo->getFilePath()
        );
    }

    /**
     * @expectedException Exception
     */
    public function testFileNaoExiste()
    {
        $objArquivo = new Arquivo(
            'arquivo que nao existe'
        );
    }
}