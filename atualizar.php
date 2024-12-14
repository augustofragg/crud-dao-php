<?php 
require "config.php";
require 'dao/UsuarioDaoMysql.php';

$usuarioDao = new UsuarioDaoMysql($pdo);

$usuario = false;
$id = filter_input(INPUT_GET,'id');
if($id) {
    $usuario = $usuarioDao->findById($id);
}

if($usuario === false) {
    header('Location: index.php');
    exit;
}
?>

<h1>Atualizar usuario</h1>
<form  method="post" action="atualizar_action.php">
    <input type="hidden" name="id" id="id" value="<?=$usuario->getId(); ?>">

    <label>
        Nome:<br/>
        <input type="text" name="name" id="name" value="<?= $usuario->getNome();?>">
    </label><br><br>

    <label>
        E-mail:<br/>
        <input type="email" name="email" id="email" value="<?= $usuario->getEmail(); ?>">
    </label><br><br>

    <input type="submit" value="Atualizar">
</form>