<?php
require_once 'models/Usuario.php';

class UsuarioDaoMysql implements UsuarioDAO {
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }


    public function add(Usuario $usuario) {

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
    
    public function update(Usuario $usuario) {

    }
    public function delete($id) {

    }
}