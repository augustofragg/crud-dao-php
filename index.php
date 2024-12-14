<?php
require "config.php";
require "dao/UsuarioDaoMysql.php";

$usuarioDao = new UsuarioDaoMysql($pdo);
$list = $usuarioDao->findAll();

?>

<a href="adicionar.php">ADICIONAR USUÁRIO</a>

<table border="1" width="40%">
  
    <th>ID</th>
    <th>NOME</th>
    <th>EMAIL</th>
    <th>AÇÕES</th>

  <?php foreach($list as $usuario):?>
    <tr>
        <td><?= $usuario->getId()?></td>
        <td><?= $usuario->getNome()?></td>
        <td><?= $usuario->getEmail()?></td>
        <td>
            <a href="excluir.php?id=<?= $usuario->getId() ?>" onclick="return confirm('Deseja continuar ?')">Excluir</a>
            <a href="atualizar.php?id=<?= $usuario->getId()?>" >Atualizar</a>
        </td> 
    </tr>
  <?php endforeach;?>
  
</table>
 