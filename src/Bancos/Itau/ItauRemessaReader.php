<?php
declare(strict_types=1);

namespace Atlantic\Cnab240\Bancos\Itau;

use Atlantic\Cnab240\Interfaces\RemessaReaderInterface;
use Atlantic\Cnab240\Layouts\ItauLayout;
use Exception;

class ItauRemessaReader implements RemessaReaderInterface
{
    private string $filePath;
    private array $fileLines = [];
    private array $arquivo = [];


    /**
     * Carrega o arquivo e armazena as linhas.
     *
     * @throws \PHPUnit\Exception Se o arquivo não for encontrado ou estiver inválido.
     * @throws Exception
     */
    private function loadFile(): void
    {
        if (!file_exists($this->filePath)) {
            throw new Exception('Arquivo não encontrado: ' . $this->filePath);
        }

        $this->fileLines = file($this->filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        if (count($this->fileLines) < 4) {
            throw new Exception('Arquivo com formato inválido ou linhas insuficientes.');
        }
    }

    /**
     * Retorna o header do arquivo (primeira linha).
     *
     * @throws Exception
     */
    private function getHeaderArquivo(): void
    {
        try {
            $linha = $this->fileLines[0];
            $headerLayout = ItauLayout::getHeaderArquivoLayout();
            $header = [];
            foreach ($headerLayout as $layout) {
                $aux = $layout;
                $aux['conteudo'] = substr($linha, $layout['start'] - 1, $layout['length']);
                $header[] = $aux;
            }

            $this->arquivo['HeaderArquivo'] = $header;
        } catch (Exception $e) {
            throw new Exception('Erro ao ler header do arquivo: ' . $e->getMessage());
        }
    }

    /**
     * Retorna o header do lote (segunda linha).
     *
     * @throws Exception
     */
    private function getHeaderLote(): void
    {
        try {
            $linha = $this->fileLines[1];
            $headerLoteLayout = ItauLayout::getHeaderLoteLyout();
            $headerLote = [];
            foreach ($headerLoteLayout as $layout) {
                $aux = $layout;
                $aux['conteudo'] = substr($linha, $layout['start'] - 1, $layout['length']);
                $headerLote[] = $aux;
            }

            $this->arquivo['HeaderLote'] = $headerLote;
        } catch (Exception $e) {
            throw new Exception('Erro ao ler header do lote: ' . $e->getMessage());
        }
    }

    /**
     * Retorna as linhas intermediárias que compõem o lote.
     *
     * @throws Exception
     */
    private function getLinhasLote(): void
    {
        try {
            $linhasLote = array_slice($this->fileLines, 2, count($this->fileLines) - 4);
            $lote = [];
            $headerLayout = ItauLayout::getLoteLayout();
            foreach ($linhasLote as $linha) {
                $l = [];
                foreach ($headerLayout as $layout) {
                    $aux = $layout;
                    $aux['conteudo'] = substr($linha, $layout['start'] - 1, $layout['length']);
                    $l[] = $aux;
                }
                $lote[] = $l;
            }

            $this->arquivo['Lote'] = $lote;
        } catch (Exception $e) {
            throw new Exception('Erro ao ler lote: ' . $e->getMessage());
        }
    }

    /**
     * Retorna o trailer do lote (penúltima linha).
     *
     * @throws Exception
     */
    public function getTrailerLote(): void
    {
        try {
            $linhaTrailerLote = $this->fileLines[count($this->fileLines) - 2];
            $layoutTrailerLote = ItauLayout::getTrailerLoteLayout();

            $trailerLote = [];
            foreach ($layoutTrailerLote as $l) {
                $aux = $l;
                $aux['conteudo'] = substr($linhaTrailerLote, $l['start'] - 1, $l['length']);
                $trailerLote[] = $aux;
            }

            $this->arquivo['TrailerLote'] = $trailerLote;
        } catch (Exception $e) {
            throw new Exception('Erro ao ler trailer do lote: ' . $e->getMessage());
        }
    }

    /**
     * Retorna o trailer do arquivo (última linha).
     *
     * @throws Exception
     */
    private function getTrailerArquivo(): void
    {
        try {
            $linhaTrailerArquivo = $this->fileLines[count($this->fileLines) - 1];
            $layoutTrailerArquivo = ItauLayout::getTrailerLoteLayout();

            $trailerLote = [];
            foreach ($layoutTrailerArquivo as $l) {
                $aux = $l;
                $aux['conteudo'] = substr($linhaTrailerArquivo, $l['start'] - 1, $l['length']);
                $trailerLote[] = $aux;
            }

            $this->arquivo['TrailerArquivo'] = $trailerLote;
        } catch (Exception $e) {
            throw new Exception('Erro ao ler trailer do arquivo: ' . $e->getMessage());
        }
    }


    /**
     * @param string $caminhoArquivo
     * @return array
     * @throws Exception
     */
    public function reader(string $caminhoArquivo): array
    {
        try {
            $this->filePath = $caminhoArquivo;
            $this->loadFile();

            $this->getHeaderArquivo();
            $this->getHeaderLote();
            $this->getLinhasLote();
            $this->getTrailerLote();
            $this->getTrailerArquivo();

            return $this->arquivo;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

}
