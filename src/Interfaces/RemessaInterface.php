<?php

namespace Atlantic\Cnab240\Interfaces;

interface RemessaInterface
{
    /**
     * Method que irá gerar o arquivo completo
     *
     * @param array $dadosEmpresa;
     * @param array $dataLotes;
     */
    public function generateFile(array $dadosEmpresa, array $dadosLotes): string;
}
