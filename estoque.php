<!doctype html>
<?php
  
  $acao = 'recuperar';
  require "venda_controller.php";
  require "produto_controller.php";

?>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de vendas</title>

    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel='icon' href='img/icon.png'> 

    <script>
      function editar(id, nome_produto, quantidade, valor_compra, valor_venda){ 

        window.location.replace("editar_produto.php?id="+id+"&nome_produto="+nome_produto+"&quantidade="+quantidade+"&valor_compra="+valor_compra+"&valor_venda="+valor_venda);
      }

      function remover(id){
        location.href = 'estoque.php?acao=remover&id='+id;
      }

     
      function confirmar(id) {
        let text = "Tem certeza que deseja excluir permanentemente o produto?";
        if (confirm(text) == true) {
          remover(id);
        }
      }


    </script>
  </head>
  <body>
    <nav class="navbar navbar-light bg-light">
        <div class="container justify-content-center">
            <a href="index.php" class="navbar-brand" >
                <img src="img/logo.png"  height="80" class="d-inline-block align-top">
            </a>
        </div>
    </nav>

    <nav class="navbar navbar-light bg-light">
        <div class="container justify-content-center" style="border: 2px solid orange;">
           
        </div>
    </nav>

    <?php 
		if( isset($_GET['inclusao']) && $_GET['inclusao'] == 1){ ?>

			<div class="bg-success pt-2 text-white d-flex justify-content-center">
			<h5>Produto cadastrado com sucesso!</h5>
			</div>

			<?php } ?>

    <div class="container app">
      <div class="row">
        <div class="col-md-3">
          <ul class="list-group">
            <li class="list-group-item"><a href="index.php" >Listar Vendas</a></li>
            <li class="list-group-item"><a href="nova_venda.php">Nova Venda</a></li>
            <li class="list-group-item active"><a href="estoque.php">Estoque</a></li>
          </ul>

        </div>

        <div class="col-md-9">
          <a href="novo_produto.php">
			  <button type="button" class="btn btn-primary btn-lg mb-4">Novo produto</button></a>
        <?php
              $total_valor_compra = 0;
              $total_valor_venda = 0;
              foreach($produtos as $indice => $produto){
                $total_valor_compra += $produto->quantidade*$produto->valor_compra;
                $total_valor_venda += $produto->quantidade*$produto->valor_venda;
              }
            ?>
        <div class='row mb-3 '>
          <h5 class='col'>Valor total em compras: </br> R$ <?=$total_valor_compra ?></h5>
          <h5 class='col'>Valor total em vendas: </br> R$ <?=$total_valor_venda ?></h5>
        </div>

        <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Produto</th>
                        <th scope="col">QNT</th>
                        <th scope="col">Valor de Compra</th>
                        <th scope="col">Valor de Venda</th>
                        <th scope="col">Ações</th>
                      </tr>
                    </thead>
                    
                    <tbody>
    
                      <?php  
                      foreach($produtos as $indice => $produto){
                     
                    ?>
                       <tr>
                       
                       
                          <td><?= $produto->id ?></td>
                          <td id="produto_<?= $produto->id ?>"> <?= $produto->nome_produto ?></td>
                          <td id="quantidade_<?= $produto->id ?>"> <?= $produto->quantidade ?></td>
                          <td id="cliente_<?= $produto->id ?>"> R$ <?= $produto->valor_compra ?></td>
                          <td id="data_<?= $produto->id ?>">R$ <?= $produto->valor_venda ?></td>
                
                          <td id="acoes_<?= $produto->id ?>">
                              <i class="fas fa-trash-alt fa-lg text-danger" onclick="confirmar(<?= $produto->id ?>)"></i>
                              <i class="fas fa-edit fa-lg text-info" onclick="editar(<?= $produto->id ?>, '<?= $produto->nome_produto ?>', <?= $produto->quantidade ?>, '<?= $produto->valor_compra ?>', '<?= $produto->valor_venda ?>')"></i>
                          </td>
                              
                      </tr>


                    <?php } ?>
                    
                     
                      
                    </tbody>
                    
                  </table>
          
      </div>

      


    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>