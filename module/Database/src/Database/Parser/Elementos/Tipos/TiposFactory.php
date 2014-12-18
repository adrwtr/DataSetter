<?php
namespace Database\Parser\Elementos\Tipos;

class TiposFactory {

    /**
     * Cria um campo baseado no tipo enviado
     * @param  string tipo do campo
     * @param  mixed possíveis parametros de geração de campo
     * @return Tipo
     */
    public static function criarTipo($tipo, $parametros = null)
    {
        $nome = self::getNomeClass($tipo);
        return new $nome($parametros);
    }

    private static function getNomeClass($nome)
    {
        $arrClasses = array(
            'tipo_nome_proprio' => 'Database\Parser\Elementos\Tipos\TipoNomeProprio',
            'tipo_bool' => 'Database\Parser\Elementos\Tipos\TipoBool',
            'tipo_nome_field' => 'Database\Parser\Elementos\Tipos\TipoNomeField'
        );
        
        if (array_key_exists($nome, $arrClasses) == false) {
            throw new \Exception('O tipo especificado no YAML não existe: '. $nome);
        }

        return $arrClasses[$nome];
    }
}