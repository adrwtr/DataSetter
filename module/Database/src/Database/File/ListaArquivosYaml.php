<?php
namespace Database\File;

class ListaArquivosYaml {

    const EXTENSAO = 'yaml';

    /**
     * Retorna um array com todos os arquivos
     * @param  [str] $dir_path [description]
     * @return [array]           [description]
     */
    public function getArquivos($dir_path)
    {
        $arrArquivos = null;

        if ($handle = opendir($dir_path)) {
            while (false !== ($file = readdir($handle))) {
                if (
                    $file != "." &&
                    $file != ".." &&
                    $this->testaYaml($dir_path . $file)
                ) {
                    $arrArquivos[] = $file;
                }
            }

            closedir($handle);
        }

        return $arrArquivos;
    }

    /**
     * Verifica se a extensão é yaml
     * @param  [str] $dir_path
     * @return [bool] 
     */
    public function testaYaml($dir_path)
    {
        return pathinfo($dir_path, PATHINFO_EXTENSION) == self::EXTENSAO;
    }
}