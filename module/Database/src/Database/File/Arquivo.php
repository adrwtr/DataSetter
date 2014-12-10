<?php
namespace Database\File;

/**
 * Representa um arquivo
 */
class Arquivo {

    private $file_path;
    private $conteudo;

    /**
     * Precisa receber um arquivo
     * @param string $file caminho para o arquivo fisico
     */
    public function __construct($file)
    {
        $this->setFilePath($file);

        if ( $this->testaFilePath() == false ) {
            throw new \Exception('Arquivo não encontrado:' . $file);
        }
    }

    /**
     * Retorna o conteudo do arquivo
     * @return string
     */
    public function getConteudo()
    {
        if ($this->conteudo == null) {
            $this->setConteudo(
                file_get_contents($this->getFilePath())
            );
        }

        return $this->conteudo;
    }

    /**
     * seta o caminho fisico do arquivo
     * @param string
     * @return File
     */
    public function setFilePath($valor)
    {
        $this->file_path = $valor;
        return $this;
    }

    /**
     * Retorna o caminho fisico do arquivo
     * @return string
     */
    public function getFilePath()
    {
        return $this->file_path;
    }

    /**
     * retorna se o arquivo fisico realmente existe
     * @return bool
     */
    public function testaFilePath()
    {
        return file_exists($this->getFilePath());
    }

    /**
     * Seta o conteudo do arquivo
     * @param File
     * 
     */
    private function setConteudo($valor)
    {
        $this->conteudo = $valor;
        return $this;
    }
}