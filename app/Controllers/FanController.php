<?php
namespace app\Controllers;

use app\Framework\Database\Connection;
use app\Models\Fan;
use app\Services\XmlFileService;

class FanController extends Connection
{
    private $fan, $xmlService;

    public function __construct()
    {
        $this->xmlService = new XmlFileService;
        $this->fan = new Fan;
    }

    public function edit()
    {
        $id = $_GET['id'];
        $fan = $this->fan->getById($id);

        if(!$fan) {
            return redirect('/');
        }

        return view('edit', ['fan' => $fan]);
    }

    public function create()
    {
        return view('create');
    }

    public function update()
    {
        $data = [];
        if(!$_GET['id']) {
            return redirect('/');
        }

        $id = $_GET['id'];        

        array_push($data, [
            'nome' => strtoupper($_POST['nome']),
            'documento' => str_replace(['.', '-', '/'], '', $_POST['documento']),
            'cep' => str_replace(['.', '-',], '', $_POST['cep']),
            'endereco' => $_POST['endereco'],
            'bairro' => $_POST['bairro'],
            'cidade' => $_POST['cidade'],
            'uf' => $_POST['uf'],
            'telefone' => str_replace(['.', '-', '(', ')', ' '], '', $_POST['telefone']),
            'email' => !empty($_POST['email']) ? $_POST['email'] : null,
            'ativo' => intval($_POST['ativo'])
        ]);

        $this->fan->update($id, $data);

        return redirect('/', 'Registro atualizado com sucesso.');
    }
    
    public function store()
    {
        $data = $this->xmlService->readFile($_FILES['xml-file']['tmp_name']);
        $this->fan->store($data);

        return redirect('/', 'Registros importados com sucesso.'); 
    }

    public function singleStore()
    {
        $data = [];     
        
        array_push($data, [
            'nome' => strtoupper($_POST['nome']),
            'documento' => str_replace(['.', '-', '/'], '', $_POST['documento']),
            'cep' => str_replace(['.', '-',], '', $_POST['cep']),
            'endereco' => $_POST['endereco'],
            'bairro' => $_POST['bairro'],
            'cidade' => $_POST['cidade'],
            'uf' => $_POST['uf'],
            'telefone' => str_replace(['.', '-', '(', ')', ' '], '', $_POST['telefone']),
            'email' => !empty($_POST['email']) ? $_POST['email'] : null,
            'ativo' => intval($_POST['ativo'])
        ]);
        
        $this->fan->singleStore($data);

        return redirect('/', 'Registro inserido com sucesso.'); 
    }

}