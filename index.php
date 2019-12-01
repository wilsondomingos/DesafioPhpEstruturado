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


  
  
  <div class="container mb-5">

  

  <div class="ml-2 mr-2">
        <table class="table">
        <table class="table">
            <thead>
          <th>Nome</th>
          <th>Descrição</th>
          <th>Preço</th>
        </tr>
      </thead>
      <tbody>

        <?php foreach ($products as $product) : ?>

          <tr>
            <td class="pt-5 pt-md-4"><?= $product['nome'] ?></td>
            <td class="pt-5 pt-md-4"><?= $product['descricao'] ?></td>
            <td class="pt-5 pt-md-4">R$ <?= $product['preco'] ?></td>

            <td>
              <a href="showProduto.php?id=<?= $product['id'] ?>" class="btn btn-info m-1">Ver</a>
              <a href="editProduct.php?id=<?=base64_encode($product['id'])?>" class="btn btn btn-primary m-1">Editar</a>
              <a href="deleteProduct.php?id=<?= $product['id'] ?>" class="btn btn-danger m-1">Excluir</a>
            </td>
          </tr>

        <?php endforeach ?>

      </tbody>
    </table>

  </div>

</div>

</body>

</html>