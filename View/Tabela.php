<table class="table">
<thead>
  <tr>
    <th scope="col">id</th>
    <th scope="col">Produtor</th>
    <th scope="col">Nome</th>
    <th scope="col">Categoria</th>
    <th scope="col">Preço</th>
    <th scope="col">Data de adição</th>
    <th scope="col">Data de modificação</th>
    <th scope="col">Imagem</th>
    <th scope="col">Editar</th>
    <th scope="col">Excluir</th>
  </tr>
</thead>
<?php
  if ($produtos == NULL) {
    echo "Você não possui produtos cadastrados";
  } else {
    foreach ($produtos as $produto) {
?>
      <tbody>
        <tr>
          <th scope='row'><?php echo $produto->id; ?></th>
          <td><?php echo $produto->produtor; ?></td>
          <td><?php echo $produto->nome; ?></td>
          <td><?php echo $produto->categoria; ?></td>
          <td><?php echo $produto->preco; ?></td>
          <td><?php echo $produto->dt_adicao; ?></td>
          <td><?php echo $produto->dt_modif; ?></td>
          <td><img src="imagens/<?php echo $produto->imagem; ?>" height="30px"></td>
          <form method="POST" action="EditaProduto.php">
            <input type="hidden" name="id" id="id" value="<?php echo $produto->id; ?>">
            <td><input type="submit" class="btn btn-success" name="acao" value="Editar" /></td>
          </form>
          <form method="POST" action="../Controller/Produto.php">
            <td><input type="submit" class="btn btn-danger" name="acao" value="Excluir" /></td>
          </form>
        </tr>
      </tbody>
<?php
    }         
  }
?>
</table>
