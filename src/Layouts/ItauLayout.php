<?php

namespace Atlantic\Cnab240\Layouts;


class ItauLayout
{
    /**
     * Retorna a estrutura do layout para o header do arquivo.
     *
     * @return array
     */
    public static function getHeaderArquivoLayout(): array
    {
        return [
            ['start' => 1, 'end' => 3, 'name' => 'codigo_banco', 'length' => 3, 'description' => 'Código do banco = 341', 'type' => 'numeric'],
            ['start' => 4, 'end' => 7, 'name' => 'lote_servico', 'length' => 4, 'description' => 'Lote de serviço = 0000', 'type' => 'numeric'],
            ['start' => 8, 'end' => 8, 'name' => 'tipo_registro', 'length' => 1, 'description' => 'Tipo de registro = 0', 'type' => 'numeric'],
            ['start' => 9, 'end' => 14, 'name' => 'uso_febraban', 'length' => 6, 'description' => 'Brancos', 'type' => 'alpha'],
            ['start' => 15, 'end' => 17, 'name' => 'layout_arquivo', 'length' => 3, 'description' => 'N da versao do layout do arquivo = 080', 'type' => 'alpha'],
            ['start' => 18, 'end' => 18, 'name' => 'tipo_inscricao', 'length' => 1, 'description' => 'Tipo de inscrição da empresa 1=CPF|2=CNPJ', 'type' => 'numeric'],
            ['start' => 19, 'end' => 32, 'name' => 'cnpj', 'length' => 14, 'description' => 'CNPJ empresa debitada', 'type' => 'numeric'],
            ['start' => 33, 'end' => 52, 'name' => 'complemento_registro', 'length' => 20, 'description' => 'Brancos', 'type' => 'alpha'],
            ['start' => 53, 'end' => 57, 'name' => 'agencia', 'length' => 5, 'description' => 'Número da agencia', 'type' => 'numeric'],
            ['start' => 58, 'end' => 58, 'name' => 'complemento_registro2', 'length' => 1, 'description' => 'Branco', 'type' => 'alpha'],
            ['start' => 59, 'end' => 70, 'name' => 'conta', 'length' => 12, 'description' => 'Número de C/C debitada', 'type' => 'numeric'],
            ['start' => 71, 'end' => 71, 'name' => 'complemento_registro3', 'length' => 1, 'description' => 'Branco', 'type' => 'alpha'],
            ['start' => 72, 'end' => 72, 'name' => 'dac', 'length' => 1, 'description' => 'Dac da agencia/conta debitada', 'type' => 'numeric'],
            ['start' => 73, 'end' => 102, 'name' => 'nome_empresa', 'length' => 30, 'description' => 'Nome da empresa', 'type' => 'alpha'],
            ['start' => 103, 'end' => 132, 'name' => 'nome_banco', 'length' => 30, 'description' => 'Nome do banco', 'type' => 'alpha'],
            ['start' => 133, 'end' => 142, 'name' => 'complemento_registro4', 'length' => 10, 'description' => 'Brancos', 'type' => 'alpha'],
            ['start' => 143, 'end' => 143, 'name' => 'arquivo_codigo', 'length' => 1, 'description' => 'Codigo 1=remessa|2=retorno', 'type' => 'numeric'],
            ['start' => 144, 'end' => 151, 'name' => 'data_geracao', 'length' => 8, 'description' => 'Data de geração do arquivo = DDMMAAAA', 'type' => 'numeric'],
            ['start' => 152, 'end' => 157, 'name' => 'hora_geracao', 'length' => 6, 'description' => 'Hora de geração do arquivo = HHMMSS', 'type' => 'numeric'],
            ['start' => 158, 'end' => 166, 'name' => 'complemento_registro5', 'length' => 9, 'description' => 'Zeros', 'type' => 'numeric'],
            ['start' => 167, 'end' => 171, 'name' => 'unidade_densidade', 'length' => 5, 'description' => 'Densidade de gravação', 'type' => 'numeric'],
            ['start' => 172, 'end' => 240, 'name' => 'complemento_registro6', 'length' => 69, 'description' => 'Brancos', 'type' => 'alpha'],
        ];
    }

    /**
     * Retorna a estrutura do layout para o header do lote.
     *
     * @return array
     */
    public static function getHeaderLoteLyout(): array{
        return [
            ['start' => 1, 'end' => 3, 'name' => 'codigo_banco', 'length' => 3, 'description' => 'Código banco na compensacao = 341', 'type' => 'numeric'],
            ['start' => 4, 'end' => 7, 'name' => 'codigo_lote', 'length' => 4, 'description' => 'Lote identificacao de pagtos', 'type' => 'numeric'],
            ['start' => 8, 'end' => 8, 'name' => 'tipo_registro', 'length' => 1, 'description' => 'Registro header de lote = 1', 'type' => 'numeric'],
            ['start' => 9, 'end' => 9, 'name' => 'tipo_operacao', 'length' => 1, 'description' => 'Tipo de operação = C (Credito)', 'type' => 'alpha'],
            ['start' => 10, 'end' => 11, 'name' => 'tipo_pagamento', 'length' => 2, 'description' => 'Tipo de pagamento = 22 (Tributos)', 'type' => 'numeric'],
            ['start' => 12, 'end' => 13, 'name' => 'forma_pagamento', 'length' => 2, 'description' => 'Forma de pagamento = 01 (Credito em conta corrente)', 'type' => 'numeric'],
            ['start' => 14, 'end' => 16, 'name' => 'layout_lote', 'length' => 3, 'description' => 'Numero da versao do layout do lote = 030', 'type' => 'numeric'],
            ['start' => 17, 'end' => 17, 'name' => 'complemento_registro', 'length' => 1, 'description' => 'Brancos', 'type' => 'alpha'],
            ['start' => 18, 'end' => 18, 'name' => 'tipo_inscricao', 'length' => 1, 'description' => 'Tipo de inscricao 1=CPF/2=CNPJ', 'type' => 'numeric'],
            ['start' => 19, 'end' => 32, 'name' => 'cnpj_cpf', 'length' => 14, 'description' => 'CNPJ EMPRESA ou CPF Debitado', 'type' => 'numeric'],
            ['start' => 33, 'end' => 52, 'name' => 'complemento_registro2', 'length' => 20, 'description' => 'Brancos', 'type' => 'alpha'],
            ['start' => 53, 'end' => 57, 'name' => 'agencia', 'length' => 5, 'description' => 'Agencia debitada', 'type' => 'numeric'],
            ['start' => 58, 'end' => 58, 'name' => 'complemento_registro3', 'length' => 1, 'description' => 'Brancos', 'type' => 'alpha'],
            ['start' => 59, 'end' => 70, 'name' => 'conta', 'length' => 12, 'description' => 'Numero da C/C debitada', 'type' => 'numeric'],
            ['start' => 71, 'end' => 71, 'name' => 'complemento_registro4', 'length' => 1, 'description' => 'Brancos', 'type' => 'alpha'],
            ['start' => 72, 'end' => 72, 'name' => 'dac', 'length' => 1, 'description' => 'DAC da agencia/conta debitada', 'type' => 'numeric'],
            ['start' => 73, 'end' => 102, 'name' => 'nome_empresa', 'length' => 30, 'description' => 'Nome da empresa', 'type' => 'alpha'],
            ['start' => 103, 'end' => 132, 'name' => 'finalidade_lote', 'length' => 30, 'description' => 'Finalidade dos pagamentos do lote', 'type' => 'alpha'],
            ['start' => 133, 'end' => 142, 'name' => 'historico_cc', 'length' => 10, 'description' => 'Complemento historico c/c debitada', 'type' => 'alpha'],
            ['start' => 143, 'end' => 172, 'name' => 'endereco_empresa', 'length' => 30, 'description' => 'Nome da rua, av, pça etc', 'type' => 'alpha'],
            ['start' => 173, 'end' => 177, 'name' => 'numero_empresa', 'length' => 05, 'description' => 'Numero do local', 'type' => 'numeric'],
            ['start' => 178, 'end' => 192, 'name' => 'complemento_empresa', 'length' => 15, 'description' => 'Complemento (Casa,apto, sala, etc)', 'type' => 'alpha'],
            ['start' => 193, 'end' => 212, 'name' => 'cidade_empresa', 'length' => 20, 'description' => 'Nome da cidade', 'type' => 'alpha'],
            ['start' => 213, 'end' => 220, 'name' => 'cep_empresa', 'length' => 8, 'description' => 'CEP', 'type' => 'numeric'],
            ['start' => 221, 'end' => 222, 'name' => 'estado', 'length' => 2, 'description' => 'Estado sigla', 'type' => 'alpha'],
            ['start' => 223, 'end' => 230, 'name' => 'complemento_registro5', 'length' => 8, 'description' => 'Brancos', 'type' => 'alpha'],
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
            ['start' => 1, 'end' => 3, 'name' => 'codigo_banco', 'length' => 3, 'description' => 'Codigo do banco = 341', 'type' => 'numeric'],
            ['start' => 4, 'end' => 7, 'name' => 'codigo_lote', 'length' => 4, 'description' => 'Lote de servico', 'type' => 'numeric'],
            ['start' => 8, 'end' => 8, 'name' => 'tipo_registro', 'length' => 1, 'description' => 'Tipo de registro = 3', 'type' => 'numeric'],
            ['start' => 9, 'end' => 13, 'name' => 'numero_registro', 'length' => 5, 'description' => 'Numero sequencial registro lote', 'type' => 'numeric'],
            ['start' => 14, 'end' => 14, 'name' => 'codigo_segmento', 'length' => 1, 'description' => 'Codigo segmento reg detalhe = N', 'type' => 'alpha'],
            ['start' => 15, 'end' => 17, 'name' => 'tipo_movimento', 'length' => 3, 'description' => 'Tipo de movimento = 000', 'type' => 'numeric'],
            ['start' => 18, 'end' => 19, 'name' => 'identificacao_tributo', 'length' => 2, 'description' => 'IDENTIFICAÇÃO DO TRIBUTO = 02', 'type' => 'numeric'],
            ['start' => 20, 'end' => 23, 'name' => 'codigo_receita', 'length' => 4, 'description' => 'CÓDIGO DA RECEITA', 'type' => 'numeric'],
            ['start' => 24, 'end' => 24, 'name' => 'tipo_inscricao', 'length' => 1, 'description' => 'TIPO DE INSCRIÇÃO DO CONTRIBUINTE 1=CPF|2=CNPJ', 'type' => 'numeric'],
            ['start' => 25, 'end' => 38, 'name' => 'cpf', 'length' => 14, 'description' => 'CPF OU CNPJ DO CONTRIBUINTE', 'type' => 'numeric'],
            ['start' => 39, 'end' => 46, 'name' => 'periodo_apuracao', 'length' => 8, 'description' => 'PERÍODO DE APURAÇÃO DDMMAAAA', 'type' => 'numeric'],
            ['start' => 47, 'end' => 63, 'name' => 'referencia', 'length' => 17, 'description' => 'NÚMERO DE REFERÊNCIA', 'type' => 'numeric'],
            ['start' => 64, 'end' => 77, 'name' => 'valor_principal', 'length' => 14, 'description' => 'VALOR PRINCIPAL', 'type' => 'numeric'],
            ['start' => 78, 'end' => 91, 'name' => 'valor_multa', 'length' => 14, 'description' => 'VALOR DA MULTA', 'type' => 'numeric'],
            ['start' => 92, 'end' => 105, 'name' => 'valor_juros', 'length' => 14, 'description' => 'VALOR DOS JUROS/ENCARGOS', 'type' => 'numeric'],
            ['start' => 106, 'end' => 119, 'name' => 'valor_total', 'length' => 14, 'description' => 'VALOR TOTAL A SER PAGO', 'type' => 'numeric'],
            ['start' => 120, 'end' => 127, 'name' => 'data_vencimento', 'length' => 8, 'description' => 'DATA DE VENCIMENTO DDMMAAAA', 'type' => 'numeric'],
            ['start' => 128, 'end' => 135, 'name' => 'data_pagamento', 'length' => 8, 'description' => 'DATA DO PAGAMENTO DDMMAAAA', 'type' => 'numeric'],
            ['start' => 136, 'end' => 165, 'name' => 'complemento_registro', 'length' => 30, 'description' => 'COMPLEMENTO DE REGISTRO', 'type' => 'alpha'],
            ['start' => 166, 'end' => 195, 'name' => 'contribuinte', 'length' => 30, 'description' => 'NOME DO CONTRIBUINTE', 'type' => 'alpha'],
            ['start' => 196, 'end' => 215, 'name' => 'numero_doc_atribuido_empresa', 'length' => 20, 'description' => 'Nº DOCTO ATRIBUÍDO PELA EMPRESA', 'type' => 'alpha'],
            ['start' => 216, 'end' => 230, 'name' => 'nosso_numero', 'length' => 15, 'description' => 'NÚMERO ATRIBUÍDO PELO BANCO', 'type' => 'alpha'],
            ['start' => 231, 'end' => 240, 'name' => 'codigo_ocorrencia', 'length' => 10, 'description' => 'CÓDIGO DE OCORRÊNCIAS P/ RETORNO', 'type' => 'alpha'],
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
            ['start' => 24, 'end' => 37, 'name' => 'valor_total', 'length' => 14, 'description' => 'SOMA VALOR PRINCIPAL DOS PGTOS DO LOTE', 'type' => 'numeric'],
            ['start' => 38, 'end' => 51, 'name' => 'total_outras_ent', 'length' => 14, 'description' => 'SOMA VALORES DE OUTRAS ENTIDADES DO LOTE', 'type' => 'numeric'],
            ['start' => 52, 'end' => 65, 'name' => 'total_valores_multa_mora', 'length' => 14, 'description' => 'SOMA VALORES ATUALIZ. MONET/MULTA/MORA', 'type' => 'numeric'],
            ['start' => 66, 'end' => 79, 'name' => 'total_valor_arrecadado', 'length' => 14, 'description' => 'SOMA VALOR DOS PAGAMENTOS DO LOTE', 'type' => 'numeric'],
            ['start' => 80, 'end' => 230, 'name' => 'complemento_registro2', 'length' => 151, 'description' => 'COMPLEMENTO DE REGISTRO', 'type' => 'alpha'],
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
            ['start' => 1, 'end' => 3, 'name' => 'codigo_banco', 'length' => 3, 'description' => 'CÓDIGO BANCO NA COMPENSAÇÃO = 341', 'type' => 'numeric'],
            ['start' => 4, 'end' => 7, 'name' => 'codigo_lote', 'length' => 4, 'description' => 'LOTE DE SERVIÇO = 9999', 'type' => 'numeric'],
            ['start' => 8, 'end' => 8, 'name' => 'tipo_registro', 'length' => 1, 'description' => 'REGISTRO TRAILER DE ARQUIVO = 9', 'type' => 'numeric'],
            ['start' => 9, 'end' => 17, 'name' => 'complemento_registro', 'length' => 9, 'description' => 'COMPLEMENTO DE REGISTRO', 'type' => 'alpha'],
            ['start' => 18, 'end' => 23, 'name' => 'quantidade_lotes', 'length' => 6, 'description' => 'QTDE LOTES DO ARQUIVO', 'type' => 'numeric'],
            ['start' => 24, 'end' => 29, 'name' => 'quantidade_registros', 'length' => 6, 'description' => 'QTDE REGISTROS DO ARQUIVO', 'type' => 'numeric'],
            ['start' => 30, 'end' => 240, 'name' => 'complemento_registro2', 'length' => 211, 'description' => 'COMPLEMENTO DE REGISTRO', 'type' => 'alpha'],
        ];
    }
}
