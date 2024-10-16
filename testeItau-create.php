<?php

require __DIR__ . '/vendor/autoload.php';

use Atlantic\Cnab240\Factory\RemessaFactory;

$dadosEmpresa = [
    'Empresa' => [
        'razaoSocial' => 'ATLANTIC GLOBAL MANAGEMENT SOLUTIONS LTDA',
        'cnpj' => '10236805000192',
        'endereco' => 'RUA OTAVIO CARNEIRO',
        'numero' => '100',
        'bairro' => 'ICARAI',
        'cep' => '24230191',
        'complemento' => 'SALA COMERCIAL',
        'cidade' => 'NITEROI',
        'uf' => 'RJ'
    ],
    'DadosBancario' => [
        'agencia' => '0720',
        'conta' => '98732',
        'digito' => '0',
        'numero_doc_atribuido_empresa' => '987456',
    ],
];

$dadosLote = [
    [
        'identificacao_tributo' => '02',//DARF
        'codigo_receita' => '0190', // Codigo carne leao
        'tipo_inscricao' => '1', // 1 CPF | 2 CNPJ
        'cpf' => str_pad('44592475003', 14, '0', STR_PAD_RIGHT),
        'periodo_apuracao' => '30082024', // DDMMYYYY
        'referencia' => '01A', // Numero de referencia
        'valor_principal' => '5000', // Tamanho 12 e 2 decimal (Ex: 250050 = 2500.50)
        'valor_juros' => '0', // Tamanho 12 e 2 decimal (Ex: 250050 = 2500.50)
        'valor_total' => '0', // Tamanho 12 e 2 decimal (Ex: 250050 = 2500.50)
        'data_vencimento' => '30092024', // DDMMYYYY
        'data_pagamento' => '12092024',  // DDMMYYYY
        'contribuinte' => 'THIAGO PEREIRA' // Nome + Sobrenome
    ],
    [
        'identificacao_tributo' => '02',//DARF
        'codigo_receita' => '0190', // Carne Leao
        'tipo_inscricao' => '1', // 1 CPF | 2 CNPJ
        'cpf' => str_pad('29685888000', 14, '0', STR_PAD_RIGHT),
        'periodo_apuracao' => '30082024', // DDMMYYYY
        'referencia' => '02A', // Numero de referencia
        'valor_principal' => '3500', // Tamanho 12 e 2 decimal (Ex: 250050 = 2500.50)
        'valor_juros' => '0', // Tamanho 12 e 2 decimal (Ex: 250050 = 2500.50)
        'valor_total' => '0', // Tamanho 12 e 2 decimal (Ex: 250050 = 2500.50)
        'data_vencimento' => '30092024', // DDMMYYYY
        'data_pagamento' => '12092024',  // DDMMYYYY
        'contribuinte' => 'DANIEL PIRES' // Nome + Sobrenome
    ]
];


$fabrica = RemessaFactory::create('itau');
$file = $fabrica->generateFile($dadosEmpresa, $dadosLote);

file_put_contents('00000001.rem', $file);

echo '<pre>';
echo $file;
echo '</pre>';
