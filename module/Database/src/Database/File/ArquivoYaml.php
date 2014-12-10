<?php
namespace Database\File;

use Database\File\Arquivo;
use Symfony\Component\Yaml\Yaml;

class ArquivoYaml extends Arquivo{

    /**
     * conteudo formatado
     * @var array
     */
    private $yaml;

    /**
     * Construtor da classe
     * @param str $file_path arquivo yaml
     */
    public function __construct($file_path)
    {
        parent::__construct($file_path);
        
        $this->setYaml(
            $this->getConteudo()
        );
    }

    /**
     * Seta e realiza o parse do conteudo do arquivo yaml
     * @param string
     */
    private function setYaml($conteudo)
    {
        $this->yaml = Yaml::parse($conteudo);
        return $this;
    }

    /**
     * Retorna o array do conteudo lido
     * @return array
     */
    public function getYaml()
    {
        return $this->yaml;
    }
}