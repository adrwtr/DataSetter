<?php
namespace Database\Parser\Elementos\Tipos;

class TiposFactory {

    public static function criarTipo($tipo)
    {
        $nome = self::getNomeClass($tipo);
        return new $nome;
    }

    private static function getNomeClass($nome)
    {
        $arrClasses = array(
            'tipo_nome_proprio' => 'Database\Parser\Elementos\Tipos\TipoNomeProprio',
            'tipo_bool' => 'Database\Parser\Elementos\Tipos\TipoBool'
        );

        return $arrClasses[$nome];
    }
}