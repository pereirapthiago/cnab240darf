<?php

namespace Atlantic\Cnab240\Factory;

namespace Atlantic\Cnab240\Factory;

use Atlantic\Cnab240\Bancos\Itau\ItauRemessaReader;
use Atlantic\Cnab240\Interfaces\RemessaReaderInterface;


class RemessaReaderFactory
{
    /**
     * @param string $bank
     * @return RemessaReaderInterface
     * @throws \Exception
     */
    public static function create(string $bank): RemessaReaderInterface
    {
        switch ($bank) {
            case 'itau':
                return new ItauRemessaReader();
            default:
                throw new \Exception("Banco não suportado.");
        }
    }

}