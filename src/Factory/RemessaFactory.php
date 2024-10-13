<?php

namespace Atlantic\Cnab240\Factory;

use Atlantic\Cnab240\Bancos\Bradesco\BradescoRemessa;
use Atlantic\Cnab240\Bancos\Itau\ItauRemessa;
use Atlantic\Cnab240\Interfaces\RemessaInterface;

date_default_timezone_set('America/Sao_Paulo');
class RemessaFactory {

    /**
     * @param string $bank
     * @return RemessaInterface
     * @throws \Exception
     */
    public static function create(string $bank): RemessaInterface {
        switch ($bank) {
            case 'itau':
                return new ItauRemessa();
            case 'bradesco':
                return new BradescoRemessa();
            default:
                throw new \Exception("Banco não suportado.");
        }
    }
}
