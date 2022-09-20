<?php
namespace app\Services;

use app\Framework\Database\Connection;
use SimpleXMLElement;

class XmlFileService extends Connection
{
    public function readFile($file)
    {
        $data = json_decode(json_encode((array) simplexml_load_file($file)), 1);

        $formattedData = [];

        foreach($data['torcedor'] as $row) {
            array_push($formattedData, [
                'nome' => strtoupper($row['@attributes']['nome']),
                'documento' => str_replace(['.', '-', '/'], '', $row['@attributes']['documento']),
                'cep' => str_replace(['.', '-',], '', $row['@attributes']['cep']),
                'endereco' => $row['@attributes']['endereco'],
                'bairro' => $row['@attributes']['bairro'],
                'cidade' => $row['@attributes']['cidade'],
                'uf' => $row['@attributes']['uf'],
                'telefone' => str_replace(['.', '-', '(', ')', ' '], '', $row['@attributes']['telefone']),
                'email' => !empty($row['@attributes']['email']) ? $row['@attributes']['email'] : null,
                'ativo' => intval($row['@attributes']['ativo'])
            ]);
        }
        
        return $formattedData;
    }

}