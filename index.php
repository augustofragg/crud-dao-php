<?php
require "config.php";
require "dao/UsuarioDaoMysql.php";

$user = new UsuarioDaoMysql($pdo);
$list = $user->findAll();

?>

<a href="adicionar.php">ADICIONAR USUÁRIO</a>

<table border="1" width="40%">
  
    <th>ID</th>
    <th>NOME</th>
    <th>EMAIL</th>
    <th>AÇÕES</th>

  <?php foreach($list as $user):?>
    <tr>
        <td><?= $user->getId()?></td>
        <td><?= $user->getNome()?></td>
        <td><?= $user->getEmail()?></td>
        <td>
            <a href="excluir.php?id=<?= $user->getId() ?>" onclick="return confirm('Deseja continuar ?')">Excluir</a>
            <a href="atualizar.php?id=<?= $user->getId()?>" >Atualizar</a>
        </td> 
    </tr>
  <?php endforeach;?>
  
</table>
 