<?php

namespace Atlantic\Cnab240\Interfaces;

interface RemessaReaderInterface
{
    /**
     * Method que irá ler o arquivo completo
     *
     * @param string $dadosEmpresa;
     */
    public function reader(string $caminhoArquivo): array;

}
