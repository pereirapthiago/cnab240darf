<?php

namespace Atlantic\Cnab240\Layouts;


class BradescoLayout
{
    /**
     * Retorna a estrutura do layout para o header do arquivo.
     *
     * @return array
     */
    public static function getHeaderArquivoLayout(): array
    {
        return [
            ['start' => 1, 'end' => 3, 'name' => 'codigo_banco', 'length' => 3, 'description' => 'Código do banco', 'type' => 'numeric'],
            ['start' => 4, 'end' => 7, 'name' => 'lote_servico', 'length' => 4, 'description' => 'Lote de serviço = 0000', 'type' => 'numeric'],
            ['start' => 8, 'end' => 8, 'name' => 'tipo_registro', 'length' => 1, 'description' => 'Tipo de registro = 0', 'type' => 'numeric'],
            ['start' => 9, 'end' => 17, 'name' => 'uso_febraban', 'length' => 9, 'description' => 'Brancos', 'type' => 'alpha'],
            ['start' => 18, 'end' => 18, 'name' => 'tipo_inscricao', 'length' => 1, 'description' => 'Tipo de inscrição da empresa 1=CPF|2=CNPJ', 'type' => 'numeric'],
            ['start' => 19, 'end' => 32, 'name' => 'cnpj', 'length' => 14, 'description' => 'CNPJ empresa debitada', 'type' => 'numeric'],
            ['start' => 33, 'end' => 52, 'name' => 'codigo_convenio_banco', 'length' => 20, 'description' => 'Código do Convênio no Banco', 'type' => 'alpha'],
            ['start' => 53, 'end' => 57, 'name' => 'agencia', 'length' => 5, 'description' => 'Número da agencia', 'type' => 'numeric'],
            ['start' => 58, 'end' => 58, 'name' => 'digito_agencia', 'length' => 1, 'description' => 'Dígito Verificador da Agência', 'type' => 'alpha'],
            ['start' => 59, 'end' => 70, 'name' => 'conta', 'length' => 12, 'description' => 'Número de C/C debitada', 'type' => 'numeric'],
            ['start' => 71, 'end' => 71, 'name' => 'digito_conta', 'length' => 1, 'description' => 'Dígito Verificador da Conta', 'type' => 'alpha'],
            ['start' => 72, 'end' => 72, 'name' => 'dac', 'length' => 1, 'description' => 'Dac da agencia/conta debitada', 'type' => 'alpha'],
            ['start' => 73, 'end' => 102, 'name' => 'nome_empresa', 'length' => 30, 'description' => 'Nome da empresa', 'type' => 'alpha'],
            ['start' => 103, 'end' => 132, 'name' => 'nome_banco', 'length' => 30, 'description' => 'Nome do banco', 'type' => 'alpha'],
            ['start' => 133, 'end' => 142, 'name' => 'uso_febraban', 'length' => 10, 'description' => 'Brancos', 'type' => 'alpha'],
            ['start' => 143, 'end' => 143, 'name' => 'arquivo_codigo', 'length' => 1, 'description' => 'Codigo 1=remessa|2=retorno', 'type' => 'numeric'],
            ['start' => 144, 'end' => 151, 'name' => 'data_geracao', 'length' => 8, 'description' => 'Data de geração do arquivo = DDMMAAAA', 'type' => 'numeric'],
            ['start' => 152, 'end' => 157, 'name' => 'hora_geracao', 'length' => 6, 'description' => 'Hora de geração do arquivo = HHMMSS', 'type' => 'numeric'],
            ['start' => 158, 'end' => 163, 'name' => 'numero_seq_arquivo', 'length' => 6, 'description' => 'Número Seqüencial do Arquivo', 'type' => 'numeric'],
            ['start' => 164, 'end' => 166, 'name' => 'n_versao_layout', 'length' => 3, 'description' => 'Numero da Versão do Layout do Arquivo = 089', 'type' => 'numeric'],
            ['start' => 167, 'end' => 171, 'name' => 'unidade_densidade', 'length' => 5, 'description' => 'Densidade de Gravação do Arquivo', 'type' => 'numeric'],
            ['start' => 172, 'end' => 191, 'name' => 'uso_reservado_banco', 'length' => 20, 'description' => 'Para Uso Reservado da Banco', 'type' => 'alpha'],
            ['start' => 192, 'end' => 211, 'name' => 'uso_reservado_emp', 'length' => 20, 'description' => 'Para Uso Reservado da Empresa', 'type' => 'alpha'],
            ['start' => 212, 'end' => 240, 'name' => 'uso_febraban2', 'length' => 29, 'description' => 'Brancos', 'type' => 'alpha'],
        ];
    }

    /**
     * Retorna a estrutura do layout para o header do lote.
     *
     * @return array
     */
    public static function getHeaderLoteLyout(): array
    {
        return [
            ['start' => 1, 'end' => 3, 'name' => 'codigo_banco', 'length' => 3, 'description' => 'Código banco na compensacao', 'type' => 'numeric'],
            ['start' => 4, 'end' => 7, 'name' => 'codigo_lote', 'length' => 4, 'description' => 'Lote identificacao de pagtos', 'type' => 'numeric'],
            ['start' => 8, 'end' => 8, 'name' => 'tipo_registro', 'length' => 1, 'description' => 'Registro header de lote = 1', 'type' => 'numeric'],
            ['start' => 9, 'end' => 9, 'name' => 'tipo_operacao', 'length' => 1, 'description' => 'Tipo de operação = C', 'type' => 'alpha'],
            ['start' => 10, 'end' => 11, 'name' => 'tipo_servico', 'length' => 2, 'description' => 'Tipo do Serviço = 22 (Tributos)', 'type' => 'numeric'],
            ['start' => 12, 'end' => 13, 'name' => 'forma_lancamento', 'length' => 2, 'description' => 'Forma de pagamento = 16', 'type' => 'numeric'],
            ['start' => 14, 'end' => 16, 'name' => 'layout_lote', 'length' => 3, 'description' => 'Numero da versao do layout do lote = 012', 'type' => 'numeric'],
            ['start' => 17, 'end' => 17, 'name' => 'complemento_registro', 'length' => 1, 'description' => 'Brancos', 'type' => 'alpha'],
            ['start' => 18, 'end' => 18, 'name' => 'tipo_inscricao', 'length' => 1, 'description' => 'Tipo de inscricao 1=CPF/2=CNPJ', 'type' => 'numeric'],
            ['start' => 19, 'end' => 32, 'name' => 'cnpj_cpf', 'length' => 14, 'description' => 'CNPJ EMPRESA ou CPF Debitado', 'type' => 'numeric'],
            ['start' => 33, 'end' => 52, 'name' => 'codigo_convenio_banco', 'length' => 20, 'Código do Convênio no Banco' => 'Brancos', 'type' => 'alpha'],
            ['start' => 53, 'end' => 57, 'name' => 'agencia', 'length' => 5, 'description' => 'Agência Mantenedora da Conta', 'type' => 'numeric'],
            ['start' => 58, 'end' => 58, 'name' => 'digito_agencia', 'length' => 1, 'description' => 'Dígito Verificador da Agência', 'type' => 'alpha'],
            ['start' => 59, 'end' => 70, 'name' => 'conta', 'length' => 12, 'description' => 'Numero da C/C debitada', 'type' => 'numeric'],
            ['start' => 71, 'end' => 71, 'name' => 'digito_conta', 'length' => 1, 'description' => 'Dígito Verificador da Conta', 'type' => 'alpha'],
            ['start' => 72, 'end' => 72, 'name' => 'dac', 'length' => 1, 'description' => 'DAC da agencia/conta debitada', 'type' => 'alpha'],
            ['start' => 73, 'end' => 102, 'name' => 'nome_empresa', 'length' => 30, 'description' => 'Nome da empresa', 'type' => 'alpha'],
            ['start' => 103, 'end' => 142, 'name' => 'mensagem', 'length' => 40, 'Mensagem', 'type' => 'alpha'],
            ['start' => 143, 'end' => 172, 'name' => 'endereco_empresa', 'length' => 30, 'description' => 'Nome da rua, av, pça etc', 'type' => 'alpha'],
            ['start' => 173, 'end' => 177, 'name' => 'numero_empresa', 'length' => 5, 'description' => 'Numero do local', 'type' => 'numeric'],
            ['start' => 178, 'end' => 192, 'name' => 'complemento_empresa', 'length' => 15, 'description' => 'Complemento (Casa,apto, sala, etc)', 'type' => 'alpha'],
            ['start' => 193, 'end' => 212, 'name' => 'cidade_empresa', 'length' => 20, 'description' => 'Nome da cidade', 'type' => 'alpha'],
            ['start' => 213, 'end' => 220, 'name' => 'cep_empresa', 'length' => 8, 'description' => 'CEP', 'type' => 'numeric'],
            ['start' => 221, 'end' => 222, 'name' => 'estado', 'length' => 2, 'description' => 'Estado sigla', 'type' => 'alpha'],
            ['start' => 223, 'end' => 224, 'name' => 'ind_forma_pag_compr', 'length' => 2, 'description' => 'Indicativo da Forma de Pagamento do Compromisso = 01', 'type' => 'numeric'],
            ['start' => 225, 'end' => 230, 'name' => 'uso_febraban', 'length' => 6, 'description' => 'Brancos', 'type' => 'alpha'],
            ['start' => 231, 'end' => 240, 'name' => 'codigo_ocorrencia', 'length' => 10, 'description' => 'Codigo ocorrencia p/retorno', 'type' => 'alpha'],
        ];
    }

    /**
     * Retorna a estrutura do layout para os lotes do arquivo.
     * @description De acordo com o layout a composição fica (SEGMENTO N + ANEXO C/DARF)
     *
     * @return array
     */
    public static function getLoteLayout(): array
    {
        return [
            ['start' => 1, 'end' => 3, 'name' => 'codigo_banco', 'length' => 3, 'description' => 'Codigo do banco = 237', 'type' => 'numeric'],
            ['start' => 4, 'end' => 7, 'name' => 'codigo_lote', 'length' => 4, 'description' => 'Lote de servico', 'type' => 'numeric'],
            ['start' => 8, 'end' => 8, 'name' => 'tipo_registro', 'length' => 1, 'description' => 'Tipo de registro = 3', 'type' => 'numeric'],
            ['start' => 9, 'end' => 13, 'name' => 'numero_registro', 'length' => 5, 'description' => 'Numero sequencial registro lote', 'type' => 'numeric'],
            ['start' => 14, 'end' => 14, 'name' => 'codigo_segmento', 'length' => 1, 'description' => 'Codigo segmento reg detalhe = N', 'type' => 'alpha'],
            ['start' => 15, 'end' => 15, 'name' => 'tipo_movimento', 'length' => 1, 'description' => 'Tipo de movimento = 0', 'type' => 'numeric'],
            ['start' => 16, 'end' => 17, 'name' => 'codigo_movimento', 'length' => 2, 'description' => 'Codigo da Instrução de Movimento = 00', 'type' => 'numeric'],
            ['start' => 18, 'end' => 37, 'name' => 'numero_atribuido_empresa', 'length' => 20, 'description' => 'Nº do Docto Atribuído pela Empresa', 'type' => 'alpha'],
            ['start' => 38, 'end' => 57, 'name' => 'numero_atribuido_banco', 'length' => 20, 'description' => 'N do Docto Atribuído pelo Banco', 'type' => 'alpha'],
            ['start' => 58, 'end' => 87, 'name' => 'nome_contribuinte', 'length' => 30, 'description' => 'Nome do Contribuinte', 'type' => 'alpha'],
            ['start' => 88, 'end' => 95, 'name' => 'data_pagamento', 'length' => 8, 'description' => 'Data do Pagamento', 'type' => 'numeric'],
            ['start' => 96, 'end' => 110, 'name' => 'valor_pagamento', 'length' => 15, 'description' => 'Valor do Total do Pagamento', 'type' => 'numeric'],
            ['start' => 111, 'end' => 116, 'name' => 'codigo_receita_tributo', 'length' => 6, 'description' => 'Codigo da receita do Tributo', 'type' => 'alpha'],
            ['start' => 117, 'end' => 118, 'name' => 'tipo_inscricao', 'length' => 2, 'description' => 'Tipo de Identificacao do Contribuinte = 02', 'type' => 'numeric'],
            ['start' => 119, 'end' => 132, 'name' => 'cpf_contribuinte', 'length' => 14, 'description' => 'CPF ou CNPJ do contribuinte', 'type' => 'number'],
            ['start' => 133, 'end' => 134, 'name' => 'codigo_iden_tributo', 'length' => 2, 'description' => 'Codigo de Identificação do Tributo = 16', 'type' => 'alpha'],
            ['start' => 135, 'end' => 142, 'name' => 'periodo_apuracao', 'length' => 8, 'description' => 'Período de Apuracao', 'type' => 'numeric'],
            ['start' => 143, 'end' => 159, 'name' => 'referencia', 'length' => 17, 'description' => 'Numero de Referencia', 'type' => 'numeric'],
            ['start' => 160, 'end' => 174, 'name' => 'valor_principal', 'length' => 15, 'description' => 'Valor Principal', 'type' => 'numeric'],
            ['start' => 175, 'end' => 189, 'name' => 'valor_multa', 'length' => 15, 'description' => 'Valor da Multa', 'type' => 'numeric'],
            ['start' => 190, 'end' => 204, 'name' => 'valor_juros', 'length' => 15, 'description' => 'Valor juros', 'type' => 'numeric'],
            ['start' => 205, 'end' => 212, 'name' => 'data_vencimento', 'length' => 8, 'description' => 'Data de Vencimento', 'type' => 'numeric'],
            ['start' => 213, 'end' => 230, 'name' => 'uso_febraban', 'length' => 18, 'description' => 'Uso Exclusivo FEBRABAN/CNAB', 'type' => 'alpha'],
            ['start' => 231, 'end' => 240, 'name' => 'codigo_ocorrencias', 'length' => 10, 'description' => 'Codigos das Ocorrencias p/ Retorno', 'type' => 'alpha'],
        ];
    }


    /**
     * Retorna a estrutura do layout para o trailer do lote.
     *
     * @return array
     */
    public static function getTrailerLoteLayout(): array
    {
        return [
            ['start' => 1, 'end' => 3, 'name' => 'codigo_banco', 'length' => 3, 'description' => 'CÓDIGO BANCO NA COMPENSAÇÃO', 'type' => 'numeric'],
            ['start' => 4, 'end' => 7, 'name' => 'codigo_lote', 'length' => 4, 'description' => 'LOTE DE SERVIÇO', 'type' => 'numeric'],
            ['start' => 8, 'end' => 8, 'name' => 'tipo_registro', 'length' => 1, 'description' => 'REGISTRO TRAILER DE LOTE = 5', 'type' => 'numeric'],
            ['start' => 9, 'end' => 17, 'name' => 'complemento_registro', 'length' => 9, 'description' => 'COMPLEMENTO DE REGISTRO', 'type' => 'alpha'],
            ['start' => 18, 'end' => 23, 'name' => 'quantidade_registros', 'length' => 6, 'description' => 'QTDE REGISTROS DO LOTE', 'type' => 'numeric'],
            ['start' => 24, 'end' => 41, 'name' => 'valor_total', 'length' => 18, 'description' => 'Somatória de Valores', 'type' => 'numeric'],
            ['start' => 42, 'end' => 59, 'name' => 'qtd_moedas', 'length' => 18, 'description' => 'Somatória de Quantidade de Moedas', 'type' => 'numeric'],
            ['start' => 60, 'end' => 65, 'name' => 'numero_aviso_debito', 'length' => 6, 'description' => 'Número Aviso de Débito', 'type' => 'numeric'],
            ['start' => 66, 'end' => 230, 'name' => 'uso_febraban', 'length' => 165, 'description' => 'Uso febraban brancos', 'type' => 'alpha'],
            ['start' => 231, 'end' => 240, 'name' => 'codigo_ocorrencia', 'length' => 10, 'description' => 'CÓDIGOS OCORRÊNCIAS P/ RETORNO', 'type' => 'alpha'],
        ];
    }


    /**
     * Retorna a estrutura do layout para o trailer do arquivo.
     *
     * @return array
     */
    public static function getTrailerArquivoLayout(): array
    {
        return [
            ['start' => 1, 'end' => 3, 'name' => 'codigo_banco', 'length' => 3, 'description' => 'CÓDIGO BANCO NA COMPENSAÇÃO', 'type' => 'numeric'],
            ['start' => 4, 'end' => 7, 'name' => 'codigo_lote', 'length' => 4, 'description' => 'LOTE DE SERVIÇO = 9999', 'type' => 'numeric'],
            ['start' => 8, 'end' => 8, 'name' => 'tipo_registro', 'length' => 1, 'description' => 'REGISTRO TRAILER DE ARQUIVO = 9', 'type' => 'numeric'],
            ['start' => 9, 'end' => 17, 'name' => 'complemento_registro', 'length' => 9, 'description' => 'COMPLEMENTO DE REGISTRO', 'type' => 'alpha'],
            ['start' => 18, 'end' => 23, 'name' => 'quantidade_lotes', 'length' => 6, 'description' => 'QTDE LOTES DO ARQUIVO', 'type' => 'numeric'],
            ['start' => 24, 'end' => 29, 'name' => 'quantidade_registros', 'length' => 6, 'description' => 'QTDE REGISTROS DO ARQUIVO', 'type' => 'numeric'],
            ['start' => 30, 'end' => 35, 'name' => 'quantidade_contas', 'length' => 6, 'description' => 'Qtde de Contas p/ Conc. (Lotes)', 'type' => 'numeric'],
            ['start' => 36, 'end' => 240, 'name' => 'complemento_registro2', 'length' => 205, 'description' => 'COMPLEMENTO DE REGISTRO', 'type' => 'alpha'],
        ];
    }
}
