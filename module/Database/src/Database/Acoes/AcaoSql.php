<?php
namespace Database\Acoes;

use Database\Acoes\Acao;

class AcaoSql extends Acao {

    /**
     * Execução abstrata
     */
    public function executar()
    {
        $this->setLog(null);
    }

}