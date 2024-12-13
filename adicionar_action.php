<?php
require 'config.php';
require 'dao/UsuarioDaoMysql.php';

$user = new UsuarioDaoMysql($pdo);

$name = filter_input(INPUT_POST,"name");
$email = filter_input(INPUT_POST,"email",FILTER_VALIDATE_EMAIL);

if($name && $email) {

    if($user->findByEmail($email) === false) {
        $novoUsuario = new Usuario();
        $novoUsuario->setNome($name);
        $novoUsuario->setEmail($email);
        
        $user->add($novoUsuario);
        
        header('Location: index.php');
        exit;
    }
    else {
        header("Location: adicionar.php");
        exit;
    }
}
else {
    header("Location: adicionar.php");
    exit;
}

// Utilizando a query pura deixa o banco de dados vuneravel a ataques
// $pdo->prepare("INSERT INTO usuarios (nome,email) VALUES ($name,$email)");
//PrepareStatment deixa o banco de dados mais protegido
