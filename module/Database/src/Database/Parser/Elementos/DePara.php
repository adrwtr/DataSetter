<?php
namespace Database\Parser\Elementos;

class DePara {
    
    /**
     * Nome do campo
     * @var string
     */
    private $nome_tabela;

    /**
     * Campo de Origem
     * @var string
     */
    private $campo_origem;

    /**
     * campo de destino
     * @var string
     */
    private $campo_destino;

    /**
     * Quantidade de registros
     * @var int
     */
    private $qtd_registros;
    

    public function __construct(
        $nome_tabela,
        $campo_origem,
        $campo_destino,
        $qtd_registros
    ) {
        $this->setNomeTabela($nome_tabela);
        $this->setCampoOrigem($campo_origem);
        $this->setCampoDestino($campo_destino);
        $this->setQtdRegistros($qtd_registros);
    }

    /**
     * Recupera nome da tabela
     * @return string
     */
    public function getNomeTabela()
    {
        return $this->nome_tabela;
    }

    /**
     * Seta o nome da tabela
     *
     * @param string $nome the nome
     * @return self
     */
    public function setNomeTabela($nome_tabela)
    {
        $this->nome_tabela = $nome_tabela;
        return $this;
    }

    /**
     * Recupera nome do campo de origem
     * @return string
     */
    public function getCampoOrigem()
    {
        return $this->campo_origem;
    }

    /**
     * Seta o nome do campo de origem
     *
     * @param string $nome the nome
     * @return self
     */
    public function setCampoOrigem($campo_origem)
    {
        $this->campo_origem = $campo_origem;
        return $this;
    }
    
    /**
     * Recupera nome do campo de destino
     * @return string
     */
    public function getCampoDestino()
    {
        return $this->campo_destino;
    }

    /**
     * Seta o nome do campo de Destino
     *
     * @param string $nome the nome
     * @return self
     */
    public function setCampoDestino($campo_destino)
    {
        $this->campo_destino = $campo_destino;
        return $this;
    }

    /**
     * Recupera a quantidade de registros
     * @return string
     */
    public function getQtdRegistros()
    {
        return $this->qtd_registros;
    }

    /**
     * Seta o nome do campo de Destino
     *
     * @param string $nome the nome
     * @return self
     */
    public function setQtdRegistros($qtd)
    {
        $this->qtd_registros = $qtd;
        return $this;
    }
}