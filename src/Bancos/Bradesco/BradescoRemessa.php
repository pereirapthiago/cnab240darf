<?php
declare(strict_types=1);

namespace Atlantic\Cnab240\Bancos\Bradesco;

use Atlantic\Cnab240\GeradorArquivo\RemessaAbstract;
use Atlantic\Cnab240\Layouts\BradescoLayout;


class BradescoRemessa extends RemessaAbstract
{
    private array $dadosEmpresa;
    private $dataGeracao;
    private $horaGeracao;

    private $dadosBanco = [
        'codigo_banco' => '237',
        'n_versao_layout' => '089',
        'nome' => 'BRADESCO'

    ];

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
            'codigo_banco' => $this->dadosBanco['codigo_banco'],
            'lote_servico' => '0000',
            'tipo_registro' => '0',
            'tipo_inscricao' => '2',
            'cnpj' => $this->dadosEmpresa['Empresa']['cnpj'],
            'codigo_convenio_banco' => $this->dadosEmpresa['DadosBancario']['codigo_convenio_banco'],
            'agencia' => $this->dadosEmpresa['DadosBancario']['agencia'],
            'digito_agencia' => $this->dadosEmpresa['DadosBancario']['digito_agencia'],
            'conta' => $this->dadosEmpresa['DadosBancario']['conta'],
            'digito_conta' => $this->dadosEmpresa['DadosBancario']['digito_conta'],
            'nome_empresa' => $this->dadosEmpresa['Empresa']['razaoSocial'],
            'nome_banco' => $this->dadosBanco['nome'],
            'arquivo_codigo' => '1',
            'data_geracao' => $this->dataGeracao,
            'hora_geracao' => $this->horaGeracao,
            'numero_seq_arquivo' => 1,
            'n_versao_layout' => '089'
        ];

        return $this->generateLinha(BradescoLayout::getHeaderArquivoLayout(), $dadosHeaderArquivo);
    }


    /**
     * Gerador de header do lote
     */
    private function genareteHeaderLote(): string
    {
        $dadosHeaderLote = [
            'codigo_banco' => $this->dadosBanco['codigo_banco'],
            'codigo_lote' => '0001',
            'tipo_registro' => '1',
            'tipo_operacao' => 'C',
            'tipo_servico' => '22',
            'forma_lancamento' => '16',
            'layout_lote' => '030',
            'complemento_registro' => '',
            'tipo_inscricao' => '2',
            'cnpj_cpf' => $this->dadosEmpresa['Empresa']['cnpj'],
            'codigo_convenio_banco' => '',
            'agencia' => $this->dadosEmpresa['DadosBancario']['agencia'],
            'digito_agencia' => $this->dadosEmpresa['DadosBancario']['digito_agencia'],
            'conta' => $this->dadosEmpresa['DadosBancario']['conta'],
            'digito_conta' => $this->dadosEmpresa['DadosBancario']['digito_conta'],
            'nome_empresa' => $this->dadosEmpresa['Empresa']['razaoSocial'],
            'endereco_empresa' => $this->dadosEmpresa['Empresa']['endereco'],
            'numero_empresa' => $this->dadosEmpresa['Empresa']['numero'],
            'complemento_empresa' => $this->dadosEmpresa['Empresa']['complemento'],
            'cidade_empresa' => $this->dadosEmpresa['Empresa']['cidade'],
            'cep_empresa' => $this->dadosEmpresa['Empresa']['cep'],
            'estado' => $this->dadosEmpresa['Empresa']['uf'],
            'ind_forma_pag_compr' => '01',
        ];
        return $this->generateLinha(BradescoLayout::getHeaderLoteLyout(), $dadosHeaderLote);
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
            'codigo_banco' => $this->dadosBanco['codigo_banco'],
            'codigo_lote' => '0001',
            'tipo_registro' => '3',
            'numero_registro' => str_pad((string)$numeroLinha, 5, '0', STR_PAD_LEFT),
            'codigo_segmento' => 'N',
            'tipo_movimento' => '0',
            'codigo_movimento' => '00',
            'numero_atribuido_empresa' => '',
            'nome_contribuinte' => '',
            'data_pagamento' => '',
            'valor_pagamento' => '',
            'identificacao_tributo' => '0190',
            'tipo_inscricao' => '1',
            'cpf_contribuinte' => '',
            'codigo_identificacao_tributo' => '16',
            'periodo_apuracao' => '',
            'referencia' => '',
            'valor_principal' => '',
            'valor_multa' => '',
            'valor_juros' => '',
            'data_vencimento' => '',
        ];

        $dadosLote = array_merge($dadosFixos, $data);
        return $this->generateLinha(BradescoLayout::getLoteLayout(), $dadosLote);
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
            return $carry += $item['valor_pagamento'];
        }, 0);

        $dadosTrailerLote = [
            'codigo_banco' => $this->dadosBanco['codigo_banco'],
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
        return $this->generateLinha(BradescoLayout::getTrailerLoteLayout(), $dadosTrailerLote);
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
            'codigo_banco' => $this->dadosBanco['codigo_banco'],
            'codigo_lote' => '9999',
            'tipo_registro' => '9',
            'complemento_registro' => '',
            'quantidade_lotes' => $qtdLotes,
            'quantidade_registros' => $qtdRegistros,
            'complemento_registro' => '',
        ];
        return $this->generateLinha(BradescoLayout::getTrailerArquivoLayout(), $dadosTrailerArquivo);
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

        return $arquivo;
    }
}
