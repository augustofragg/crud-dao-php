<?php
require_once 'models/Usuario.php';

class UsuarioDaoMysql implements UsuarioDAO {
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }


    public function add(Usuario $usuario) {
        $sql = $this->pdo->prepare('INSERT INTO usuarios (nome,email) VALUES (:nome, :email)');
        $sql->bindValue(':nome',$usuario->getNome());
        $sql->bindValue(':email',$usuario->getEmail());
        $sql->execute();

        $usuario->setId($this->pdo->lastInsertId());

        return $usuario;
    }
    public function findAll() {
        $array = [];
        
        $sql = $this->pdo->query('SELECT * FROM usuarios');
        if($sql->rowCount() > 0) {
            $data = $sql->fetchAll();   

            foreach($data as $userData) {
                $usuario = new Usuario();
                $usuario->setId($userData['id']); 
                $usuario->setNome($userData['nome']);
                $usuario->setEmail($userData['email']);
                $array[] = $usuario;
            }
        }

        return $array;
    }    
    
    public function findById($id) {

    }

    public function findByEmail($email) {
        $sql = $this->pdo->prepare('SELECT * FROM usuarios WHERE email = :email');
        $sql->bindValue(':email',$email);
        $sql->execute();
        if($sql->rowCount() > 0) {
            return $email;
        }
        else {
            return false;
        }
    }
    
    public function update(Usuario $usuario) {

    }
    public function delete($id) {

    }
}