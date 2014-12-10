<?php
namespace Database\Parser;

use Database\File\ArquivoYaml;
use Database\Parser\Elementos\Tabela;


class DataParser {

    /**
     * array de conteudo 
     * @var array
     */
    private $arrConteudo;

    /**
     * Array de Tabelas 
     * @var Tabela
     */
    private $arrObjTabelas;

    /**
     * Construtor da classe
     * @param str $file_path arquivo yaml
     */
    public function __construct($arrConteudo)
    {
        $this->setArrConteudo($arrConteudo);
    }

    /**
     * Seta o conteudo a ser parseado
     * @param array $arrConteudo 
     */
    private function setArrConteudo($arrConteudo)
    {
        $this->arrConteudo = $arrConteudo;
        return $this;
    }

    /**
     * Retorna o conteudo a ser parseado
     * @return array
     */
    private function getArrConteudo()
    {
        return $this->arrConteudo;
    }

    /**
     * Realiza o parser de tabelas
     * @return DataParser
     */
    public function parseTabelas()
    {
        foreach ($this->getArrConteudo() as $nome_tabela => $conteudo_v) {
            $this->addTabela(
                $nome_tabela,
                $conteudo_v
            );
        }

        return $this;
    }

    /**
     * Adiciona uma nova tabela a lista de tabelas
     * @param string nome da tabela
     * @param array valores da tabela
     * @return  self
     */
    private function addTabela($nome_tabela, $arrValores)
    {
        $objTabela = new Tabela($nome_tabela, $arrValores);
        $this->arrObjTabelas[] = $objTabela;
        return $this;
    }

    /**
     * Retorna todos os objetos de tabelas
     * @return array of Tabela
     */
    public function getArrObjTabelas()
    {
        return $this->arrObjTabelas;
    }
}