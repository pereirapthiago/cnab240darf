<?php

namespace Atlantic\Cnab240\Bancos\Itau;

use Atlantic\Cnab240\GeradorArquivo\RemessaAbstract;
use Atlantic\Cnab240\Layouts\ItauLayout;

class ItauRemessa extends RemessaAbstract
{
    private array $dadosEmpresa;
    private $dataGeracao;
    private $horaGeracao;

    public function __construct()
    {
        $this->dataGeracao = date('dmY');
        $this->horaGeracao = date('His');
    }

    /**
     * Geradar do header do arquivo
     *
     * @param array $data
     * return string
     */
    private function generateHeaderArquivo(): string
    {
        $dadosHeaderArquivo = [
            'codigo_banco' => '341',
            'tipo_registro' => '0',
            'layout_arquivo' => '080',
            'tipo_inscricao' => '2',
            'nome_banco' => 'ITAU',
            'arquivo_codigo' => '1',
            'lote_servico' => '0000',
            'cnpj' => $this->dadosEmpresa['Empresa']['cnpj'],
            'agencia' => $this->dadosEmpresa['DadosBancario']['agencia'],
            'conta' => $this->dadosEmpresa['DadosBancario']['conta'],
            'nome_empresa' => $this->dadosEmpresa['Empresa']['razaoSocial'],
            'data_geracao' => $this->dataGeracao,
            'hora_geracao' => $this->horaGeracao,
        ];
        return $this->generateLinha(ItauLayout::getHeaderArquivoLayout(), $dadosHeaderArquivo);
    }


    /**
     * Gerador de header do lote
     */
    private function genareteHeaderLote(): string
    {
        $dadosHeaderLote = [
            'codigo_banco' => '341',
            'codigo_lote' => '0001',
            'tipo_registro' => '1',
            'tipo_operacao' => 'C',
            'tipo_pagamento' => '22',
            'forma_pagamento' => '16',
            'layout_lote' => '030',
            'complemento_registro' => '',
            'tipo_inscricao' => '2',
            'cnpj_cpf' => $this->dadosEmpresa['Empresa']['cnpj'],
            'complemento_registro2' => '',
            'agencia' => $this->dadosEmpresa['DadosBancario']['agencia'],
            'complemento_registro3' => '',
            'conta' => $this->dadosEmpresa['DadosBancario']['conta'],
            'complemento_registro4' => '',
            'dac' => $this->dadosEmpresa['DadosBancario']['digito'],
            'nome_empresa' => $this->dadosEmpresa['Empresa']['razaoSocial'],
            'finalidade_lote' => '',
            'historico_cc' => '',
            'endereco_empresa' => $this->dadosEmpresa['Empresa']['endereco'],
            'numero_empresa' => $this->dadosEmpresa['Empresa']['numero'],
            'complemento_empresa' => $this->dadosEmpresa['Empresa']['complemento'],
            'cidade_empresa' => $this->dadosEmpresa['Empresa']['cidade'],
            'cep_empresa' => $this->dadosEmpresa['Empresa']['cep'],
            'estado' => $this->dadosEmpresa['Empresa']['uf'],
            'complemento_registro5' => '',
            'codigo_ocorrencia' => ''
        ];
        return $this->generateLinha(ItauLayout::getHeaderLoteLyout(), $dadosHeaderLote);
    }

    /**
     * Geradar da linha do lote
     *
     * @param array $data
     * return string
     */
    private function generateLote(array $data, int $numeroLinha): string
    {
        $dadosFixos = [
            'codigo_banco' => '341',
            'codigo_lote' => '0001',
            'tipo_registro' => '3',
            'numero_registro' => str_pad($numeroLinha, 5, '0', STR_PAD_LEFT),
            'codigo_segmento' => 'N',
            'tipo_movimento' => '000',
            'codigo_ocorrencia' => ''
        ];
        $dadosLote = array_merge($dadosFixos, $data);
        return $this->generateLinha(ItauLayout::getLoteLayout(), $dadosLote);
    }

    /**
     * Geradar do trailer do Lote
     *
     * @param array $dadosLote
     * return string
     */
    private function generateTrailerLote(array $dadosLote): string
    {
        $valorTotal = array_reduce($dadosLote, function ($carry, $item) {
            return $carry += $item['valor_total'];
        }, 0);

        $dadosTrailerLote = [
            'codigo_banco' => '341',
            'codigo_lote' => '0001',
            'tipo_registro' => '5',
            'complemento_registro' => '',
            'quantidade_registros' => count($dadosLote),
            'valor_total' => $valorTotal,
            'total_outras_ent' => '',
            'total_valores_multa_mora' => '',
            'total_valor_arrecadado' => '',
            'complemento_registro2' => '',
            'codigo_ocorrencia' => '',
        ];
        return $this->generateLinha(ItauLayout::getTrailerLoteLayout(), $dadosTrailerLote);
    }

    /**
     * Geradar do trailer do arquivo
     *
     * @param array $data
     * return string
     */
    private function generateTrailerArquivo(int $qtdLotes, int $qtdRegistros): string
    {
        $dadosTrailerArquivo = [
            'codigo_banco' => '341',
            'codigo_lote' => '9999',
            'tipo_registro' => '9',
            'complemento_registro' => '',
            'quantidade_lotes' => $qtdLotes,
            'quantidade_registros' => $qtdRegistros,
            'complemento_registro' => '',
        ];
        return $this->generateLinha(ItauLayout::getTrailerArquivoLayout(), $dadosTrailerArquivo);
    }


    /**
     * Gerar o arquivo completo
     *
     * @param array $dadosEmpresa
     * @param array $dadosLotes
     * @return string
     */
    public function generateFile(array $dadosEmpresa, array $dadosLotes): string
    {
        $this->dadosEmpresa = $dadosEmpresa;

        $headerArquivo = $this->generateHeaderArquivo();
        $headerLote = $this->genareteHeaderLote();
        $l = '';
        $totalRegistros = 0;
        foreach ($dadosLotes as $lote) {
            $totalRegistros++;
            $l .= $this->generateLote($lote, $totalRegistros) . PHP_EOL;
        }
        $trailerLote = $this->generateTrailerLote($dadosLotes);
        $trailerArquivo = $this->generateTrailerArquivo(1, $totalRegistros);

        $arquivo = $headerArquivo . PHP_EOL;
        $arquivo .= $headerLote . PHP_EOL;
        $arquivo .= $l;
        $arquivo .= $trailerLote . PHP_EOL;
        $arquivo .= $trailerArquivo . PHP_EOL;

        // Trasnforma em windows CRLF
        return $this->transformaWindowFile($arquivo);
    }
}
