<?php

session_start();

require("functions/functions.php");

$users = loadUsers();
$products = loadProducts();

if (!$_SESSION['id']) {
  header("Location: login.php");
}

$filtroValor = 1;

if (!empty($_GET['filtro'])) {
  $filtroValor = $_GET['filtro'];
}


require("header/header.php");
?>

<style>
  .conteudoTable {
    max-height: 600px;
    overflow: auto;
  }
</style>

<div class="container mb-5">

  

  <div class="ml-2 mr-2">
        <table class="table">
            <thead>
          <th>Nome</th>
          <th>Email</th>
      
        </tr>
      </thead>
      <tbody>
        <?php foreach ($users as $user) : ?>

          <tr>
            <td><?= $user['nome'] ?></td>
            <td><?= $user['email'] ?></td>
            <td>
              <a href="editUser.php?id=<?= base64_encode($user['id']) ?>" class="btn btn-primary m-1">Editar</a>
              <a href="deleteUser.php?id=<?= $user['id'] ?>" class="btn btn-danger m-1">Excluir</a>
            </td>
          </tr>

        <?php endforeach ?>
      </tbody>
    </table>
  </div>

  <div class="table-resposive mt-3 conteudoTable d-none <?= ($filtroValor == 2) ? "d-block" : ""; ?>">

    
      </tbody>
    </table>

  </div>

</div>

</body>

</html>