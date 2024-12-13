<?php
require_once 'models/Usuario.php';

class UsuarioDaoMysql implements UsuarioDAO {
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }


    public function add(Usuario $user) {
        $sql = $this->pdo->prepare('INSERT INTO usuarios (nome,email) VALUES (:nome, :email)');
        $sql->bindValue(':nome',$user->getNome());
        $sql->bindValue(':email',$user->getEmail());
        $sql->execute();

        $user->setId($this->pdo->lastInsertId());

        return $user;
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
            $data =  $sql->fetch();

            $user = new Usuario;
            $user->setId($data['id']);
            $user->setNome($data['nome']);
            $user->setEmail($data['email']);

            return $user;
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