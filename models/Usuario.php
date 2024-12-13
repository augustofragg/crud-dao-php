<?php
class Usuario {
    private int $id;
    private string $nome;
    private string $email;

    public function getId():int {
        return $this->id;
    }

    public function setId(int $id):void {
        $this->id = trim($id);
    }

    public function getNome():string {
        return $this->nome;
    }

    public function setNome(string $name):void {
        $this->nome = ucwords(trim($name));
    }

    public function getEmail():string {
        return $this->email;
    }

    public function setEmail(string $email):void {
        $this->email = strtolower(trim($email));
    }
}

interface UsuarioDAO {
    public function add(Usuario $usuario);
    public function findAll();
    public function findById($id);
    public function findByEmail($email);
    public function update(Usuario $usuario);
    public function delete($id);
}