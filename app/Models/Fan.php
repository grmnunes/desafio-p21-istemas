<?php
namespace app\Models;

use app\Framework\Database\Connection;

class Fan extends Connection
{
    private $table;

    public function __construct()
    {
        parent::__construct();
        $this->table = 'torcedores';
    }

    public function all()
    {
        return self::$connection->query("SELECT * FROM $this->table")->fetchAll();
    }

    public function getById(int $id)
    {
        $query = self::$connection->prepare("SELECT * FROM $this->table WHERE id= :id");
        $query->execute([
            'id' => $id,
        ]);

        return $query->fetchObject();
    }

    public function singleStore($data)
    {
        $sql = "INSERT INTO
            $this->table(nome,documento,cep,endereco,bairro,cidade,uf,telefone,email,ativo)
            VALUES(:nome,:documento,:cep,:endereco,:bairro,:cidade,:uf,:telefone,:email,:ativo)"
        ;
        $query = self::$connection->prepare($sql);
        $query->execute($data[0]);
    }

    public function store($data)
    {
        $sql = "INSERT INTO
            $this->table(nome,documento,cep,endereco,bairro,cidade,uf,telefone,email,ativo)
            VALUES(:nome,:documento,:cep,:endereco,:bairro,:cidade,:uf,:telefone,:email,:ativo)"
        ;
        $query = self::$connection->prepare($sql);

        foreach($data as $row) {
            $query->execute($row);
        }
    }

    public function update($id, $data)
    {
        $sql = "
            UPDATE $this->table SET
                nome=:nome,
                documento=:documento,
                cep=:cep,
                endereco=:endereco,
                bairro=:bairro,
                cidade=:cidade,
                uf=:uf,
                telefone=:telefone,
                email=:email,
                ativo=:ativo
            WHERE id= $id"
        ;
        $query = self::$connection->prepare($sql);
        $query->execute($data[0]);

    }
}