<?php

use Atlantic\Cnab240\Layouts\ItauLayout;
use PHPUnit\Framework\TestCase;
use Atlantic\Cnab240\Bancos\Itau\ItauRemessa;

class ItauRemessaTest extends TestCase
{
    public function testGenerateHeader()
    {
        $itauRemessa = new ItauRemessa();
        $itauHeaderLayout = ItauLayout::getHeaderArquivoLayout();

        $dataHeader = [
            'codigo_banco' => '341',
            'tipo_registro' => '0',
            'layout_arquivo' => '080',
            'tipo_inscricao' => '2',
            'nome_banco' => 'ITAU',
            'arquivo_codigo' => '1',
            'lote_servico' => '0001',
            'cnpj' => '32190125000118',
            'agencia' => '123',
            'conta' => '5432',
            'nome_empresa' => strtoupper('Atlantic Global Management Solutions LTDA'),
            'data_geracao' => '10062024',
            'hora_geracao' => '150523',
        ];

        $header = $itauRemessa->generateHeaderArquivo($dataHeader);
        $this->assertNotEmpty($header, 'O header não pode ser vazio');

        foreach ($itauHeaderLayout as $linha) {
            $valor = $dataHeader[$linha['name']];
            if($valor != '') {
                $valor = substr($dataHeader[$linha['name']], 0, $linha['length']);
            }
            $valor = str_pad($valor, $linha['length'], $linha['type'] === 'numeric' ? '0' : ' ', STR_PAD_LEFT);
            $valorExtraido = substr($header, $linha['start'] - 1, $linha['length']);
            $this->assertEquals($valorExtraido, $valor, $linha['description']);
        }
    }

    public function testGenerateLote()
    {
        $itauRemessa = new ItauRemessa();
        $itauLoteLayout = ItauLayout::getLoteLayout();

        $dataLotes = [
            [
                'teste'=>'',
                'identificacao_tributo' => '02',//DARF
                'codigo_receita' => '0190', // Carne Leao
                'tipo_inscricao' => '1', // 1 CPF | 2 CNPJ
                'cpf' => str_pad('44592475003', 14, '0', STR_PAD_RIGHT),
                'periodo_apuracao' => '30062024', // DDMMYYYY
                'referencia' => '01A', // Numero de referencia
                'valor_principal' => '250050', // Tamanho 12 e 2 decimal (Ex: 250050 = 2500.50)
                'valor_juros' => '0', // Tamanho 12 e 2 decimal (Ex: 250050 = 2500.50)
                'valor_total' => '0', // Tamanho 12 e 2 decimal (Ex: 250050 = 2500.50)
                'data_vencimento' => '30062024', // DDMMYYYY
                'data_pagamento' => '30072024',  // DDMMYYYY
                'contribuinte' => 'THIAGO PEREIRA' // Nome + Sobrenome
            ],
        ];


        $lote = $itauRemessa->generateLote($dataLotes);
        $this->assertNotEmpty($lote, 'O Lote não pode ser vazio');

        foreach ($itauLoteLayout as $linha) {
            $valor = $dataLotes[$linha['name']];
            if($valor != '') {
                $valor = substr($dataLotes[$linha['name']], 0, $linha['length']);
            }
            $valor = str_pad($valor, $linha['length'], $linha['type'] === 'numeric' ? '0' : ' ', STR_PAD_LEFT);
            $valorExtraido = substr($lote, $linha['start'] - 1, $linha['length']);
            $this->assertEquals($valorExtraido, $valor, $linha['description']. ' - ' .$valorExtraido);
        }
    }

//    public function testGenerateTrailer()
//    {
//        $itauRemessa = new ItauRemessa();
//
//        $dataTrailer = [
//            'quantidade_registros' => '10',
//            'valor_total' => '10000',
//        ];
//
//        $trailer = $itauRemessa->generateTrailer($dataTrailer);
//        $this->assertNotEmpty($trailer, 'O Trailer não pode ser vazio');
//
//        foreach ($itauLoteLayout as $linha) {
//            $valor = $dataLotes[$linha['name']];
//            if($valor != '') {
//                $valor = substr($dataLotes[$linha['name']], 0, $linha['length']);
//            }
//            $valor = str_pad($valor, $linha['length'], $linha['type'] === 'numeric' ? '0' : ' ', STR_PAD_LEFT);
//            $valorExtraido = substr($lote, $linha['start'] - 1, $linha['length']);
//            $this->assertEquals($valorExtraido, $valor, $linha['description']. ' - ' .$valorExtraido);
//        }
//    }

}
