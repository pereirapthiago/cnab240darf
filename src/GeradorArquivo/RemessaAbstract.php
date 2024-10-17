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
            $value = isset($data[$field['name']]) ? $data[$field['name']] : ''; // Usa o valor do array de dados ou uma string vazia

            // Aplica substr apenas se o valor não estiver vazio
            if (!empty($value)) {
                $value = substr($value, 0, $field['length']);
            }

            // Preenche de acordo com o tipo de campo
            if ($field['type'] === 'numeric') {
                $paddedValue = str_pad($value, $field['length'], '0', STR_PAD_LEFT); // Zeros à esquerda para numéricos
            } else {
                $paddedValue = str_pad($value, $field['length'], ' ', STR_PAD_RIGHT); // Espaços à direita para alfanuméricos

            }
            $linha .= $paddedValue;
        }

        return str_pad($linha, 240, ' '); // Garante 240 caracteres na linha final
    }


}
