<?php

namespace Atlantic\Cnab240\GeradorArquivo;

use Atlantic\Cnab240\Interfaces\RemessaInterface;

abstract class RemessaAbstract implements RemessaInterface
{
    /**
     * Method generate linha
     *
     * @param array layout
     * @param array data
     */
    protected function generateLinha(array $layout, array $data): string
    {
        $linha = '';

        foreach ($layout as $field) {
            $value = $data[$field['name']] ?? '';
            if($value != '') {
                $value = substr($data[$field['name']], 0, $field['length']);
            }

            if($field['type'] === 'numeric'){
                $paddedValue = str_pad($value, $field['length'],'0', STR_PAD_LEFT);
            }else{
                $paddedValue = str_pad($value, $field['length'], ' ', STR_PAD_RIGHT);
            }

            $linha .= $paddedValue;
        }

        return str_pad($linha, 240, ' '); // Garante que a linha tenha 240 caracteres
    }
}