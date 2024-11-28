<?php

namespace Atlantic\Cnab240\Helpers;

class UtilHelper
{

    /**
     * Remover Acentuação
     *
     * @param $texto
     * @return string
     */
    static function removerAcentuacao($texto)
    {
        // Converte caracteres acentuados para suas versões sem acento
        $texto = iconv('UTF-8', 'ASCII//TRANSLIT', $texto);

        // Remove outros caracteres especiais como apóstrofos, pontos, vírgulas, etc.
        $texto = preg_replace('/[^a-zA-Z0-9 ]/', '', $texto);

        return $texto;
    }
}
