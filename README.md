# CNAB240 File Generator

Este projeto é um gerador de arquivos CNAB240 para pagamentos de **DARF**.

## Instalação

Antes de usar o projeto, é necessário instalar as dependências via [Composer](https://getcomposer.org/).

```bash
composer require pereirapthiago/cnab240
```

## Como utilizar
```
require __DIR__ . '/vendor/autoload.php';

use Atlantic\Cnab240\Factory\RemessaFactory;

// Informações da empresa
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

// Informações do lote de tributos
$dadosLote = [
    [
        'identificacao_tributo' => '02', // DARF 
        'codigo_receita' => '0190', // Código carne leão
        'tipo_inscricao' => '1', // 1 CPF | 2 CNPJ
        'cpf' => str_pad('44592475003', 14, '0', STR_PAD_RIGHT),
        'periodo_apuracao' => '30062024', // DDMMYYYY
        'referencia' => '01A', // Número de referência
        'valor_principal' => '250050', // Tamanho 12 e 2 decimal (Ex: 250050 = 2500.50)
        'valor_juros' => '0', // Tamanho 12 e 2 decimal
        'valor_total' => '0', // Tamanho 12 e 2 decimal
        'data_vencimento' => '30082024', // DDMMYYYY
        'data_pagamento' => '30092024',  // DDMMYYYY
        'contribuinte' => 'THIAGO PEREIRA' // Nome + Sobrenome
    ],
    [
        'identificacao_tributo' => '02', // DARF
        'codigo_receita' => '0190', // Código carne leão
        'tipo_inscricao' => '1', // 1 CPF | 2 CNPJ
        'cpf' => str_pad('29685888000', 14, '0', STR_PAD_RIGHT),
        'periodo_apuracao' => '30062024', // DDMMYYYY
        'referencia' => '02A', // Número de referência
        'valor_principal' => '350080', // Tamanho 12 e 2 decimal (Ex: 350080 = 3500.80)
        'valor_juros' => '0', // Tamanho 12 e 2 decimal
        'valor_total' => '0', // Tamanho 12 e 2 decimal
        'data_vencimento' => '30082024', // DDMMYYYY
        'data_pagamento' => '30092024',  // DDMMYYYY
        'contribuinte' => 'DANIEL PIRES' // Nome + Sobrenome
    ]
];

// Criação da remessa para o banco Itaú
$fabrica = RemessaFactory::create('itau');
$file = $fabrica->generateFile($dadosEmpresa, $dadosLote);

// Salvando o arquivo gerado
file_put_contents('CNAB2401.rem', $file);

// Exibindo o conteúdo gerado
echo '<pre>';
echo $file;
echo '</pre>';
```
