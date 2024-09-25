<?php

require __DIR__ . '/vendor/autoload.php';

use Atlantic\Cnab240\Factory\RemessaReaderFactory;


$reader = RemessaReaderFactory::create('itau');
$load = $reader->reader('00000001.rem');

echo '<pre>';
print_r($load);
echo '</pre>';
