<?php
require "config.php";
$list = [];
$sql = $pdo->query("SELECT * FROM usuarios");
$list = $sql->fetchAll(PDO::FETCH_ASSOC);
?>

<a href="adicionar.php">ADICIONAR USUÁRIO</a>

<table border="1" width="40%">
  
    <th>ID</th>
    <th>NOME</th>
    <th>EMAIL</th>
    <th>AÇÕES</th>

  <?php foreach($list as $usuario):?>
    <tr>
        <td><?= $usuario['id'] ?></td>
        <td><?= $usuario['nome'] ?></td>
        <td><?= $usuario['email'] ?></td>
        <td>
            <a href="excluir.php?id=<?= $usuario['id'] ?>" onclick="return confirm('Deseja continuar ?')">Excluir</a>
            <a href="atualizar.php?id=<?= $usuario['id'] ?>" >Atualizar</a>
        </td> 
    </tr>
  <?php endforeach;?>
  
</table>
 