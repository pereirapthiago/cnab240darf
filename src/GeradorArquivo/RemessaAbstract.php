<?php
declare(strict_types=1);

namespace Atlantic\Cnab240\GeradorArquivo;

use Atlantic\Cnab240\Helpers\UtilHelper;
use Atlantic\Cnab240\Interfaces\RemessaInterface;

abstract class RemessaAbstract implements RemessaInterface
{

    /**
     * @param array $layout
     * @param array $data
     * @return string
     */
    protected function generateLinha(array $layout, array $data): string
    {
        $linha = '';

        foreach ($layout as $field) {
            $value = $data[$field['name']] ?? ''; // Usa o valor do array de dados ou uma string vazia

            // Aplica substr apenas se o valor não estiver vazio
            if (!empty($value)) {
                $value = substr((string)$value, 0, intval($field['length']));
            }

            // Preenche de acordo com o tipo de campo
            if ($field['type'] === 'numeric') {
                $paddedValue = str_pad($value, $field['length'], '0', STR_PAD_LEFT); // Zeros à esquerda para numéricos
            } else {
                $value = UtilHelper::removerAcentuacao($value);
                $paddedValue = str_pad($value, $field['length'], ' ', STR_PAD_RIGHT); // Espaços à direita para alfanuméricos
            }

            $linha .= $paddedValue;
        }

        return str_pad($linha, 240, ' '); // Garante 240 caracteres na linha final
    }

    /**
     * Transforma o arquivo gerado de UNIX para Windows (CRLF)
     * @description Basicamente substitui as quebras de linhas "\n" que o php utiliza por "\r\n"
     *
     * @param string $file
     * @return string
     */
    protected function transformaWindowFile(string $stringFile): string
    {
        return str_replace(PHP_EOL, "\r\n", $stringFile);
    }
}
