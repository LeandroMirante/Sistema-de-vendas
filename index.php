<!doctype html>

<?php
  
  $acao = 'recuperar';
  require "venda_controller.php";

  $date = date_create($venda->__get('data_cadastrado'));
  $date_format = date_format($date,"d/m/Y");


?>


<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de vendas</title>

    <link rel="stylesheet" type='text/css' href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel='icon' href='img/icon.png'> 

    <script>
      function editar(id, produto_txt, quantidade_txt, cliente_txt, data_txt, valor_txt, status_txt, observacoes_txt){
        console.log(status_txt)
        window.location.replace("editar_venda.php?id="+id+"&produto="+produto_txt+"&quantidade="+quantidade_txt+"&cliente="+cliente_txt+"&data="+data_txt+"&valor="+valor_txt+"&status="+ status_txt+"&observacoes="+ observacoes_txt);

      }

      function remover(id){
        location.href = 'index.php?acao=remover&id='+id;
      }

      function confirmar(id) {
        let text = "Tem certeza que deseja excluir permanentemente o produto?";
        if (confirm(text) == true) {
          remover(id);
        }
      }

    </script>

    <style type="text/css">
      a{
        text-decoration: none;
      }

    </style>
  </head>
  <body>
    <nav class="navbar navbar-light bg-light">
        <div class="container justify-content-center">
            <a href="#" class="navbar-brand" >
                <img src="img/logo.png"  height="80" class="d-inline-block align-top">
            </a>
        </div>
    </nav>

    <nav class="navbar navbar-light bg-light">
        <div class="container justify-content-center" style="border: 2px solid orange;">
           
        </div>
    </nav>

    <div class="container app">
      <div class="row">
        <div class="col-md-3">
          <ul class="list-group">
            <li class="list-group-item active"><a href="" >Listar Vendas</a></li>
            <li class="list-group-item"><a href="nova_venda.php">Nova Venda</a></li>
            <li class="list-group-item"><a href="estoque.php">Estoque</a></li>
          </ul>

        </div>

        <div class="col-md-9">
          <h2 class="mb-3">Todas as vendas</h2>
          <?php
              $totalPaga = 0;
              $totalPendente = 0;
              $total = 0;
              foreach($vendas as $indice => $venda){
                $total += $venda->valor;;
                if($venda->status == 'Pago'){
                  $totalPaga += $venda->valor;
                }else if($venda->status == 'Pendente'){
                  $totalPendente +=  $venda->valor;
                }
              }
            ?>
        <div class='row mb-3 '>
          <h5 class='col'>Total em vendas <strong> pagas </strong>: </br> R$ <?=$totalPaga ?></h5>
          <h5 class='col'>Total em vendas <strong>pendentes:</strong> </br> R$ <?=$totalPendente ?></h5>
          <h5 class="col">Valor total em vendas: </br> R$ <?=$total ?></h5>
        </div>
        
          <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Produto</th>
                        <th scope="col">QNT</th>
                        <th scope="col">Cliente</th>
                        <th scope="col">Data</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Status</th>
                        <th scope="col" style='max-width: 500px;'>Observações</th>
                        <th scope="col">Ações</th>
                      </tr>
                    </thead>
                    
                    <tbody>
                    
                    <?php

                      foreach($vendas as $indice => $venda){
                   
                    ?>
                       <tr>
                       
                          <td><?= $venda->id ?></td>
                          <td  style="width: 15%" > <?= $venda->produto ?></td>
                          <td > <?= $venda->quantidade ?></td>
                          <td   style="width: 15%" id="cliente_<?= $venda->id ?>"> <?= $venda->cliente ?></td>
                          <td> <?= $date_format ?></td>
                          <td  style="width: 10%">R$ <?= $venda->valor ?></td>
                          <td  style="width: 15%"
                          <?php 
                              if($venda->status == 'Pendente' ) {
                          ?> 
                              class='bg-warning text-dark'
                          <?php
                              }else if($venda->status == 'Pago'){
                          ?> 
                              class='bg-success text-light'
                          <?php } ?>>
                                
                          <?= $venda->status ?></td>

                          <td style='max-width: 200px;'><?= $venda->observacoes ?></td>
                          <td id="acoes_<?= $venda->id ?>" style="width: 70px">
                              <i class="fas fa-trash-alt fa-lg text-danger" onclick="confirmar(<?= $venda->id ?>)"></i>
                              <i class="fas fa-edit fa-lg text-info" onclick="editar(<?= $venda->id ?>, '<?= $venda->produto ?>', <?= $venda->quantidade ?>, '<?= $venda->cliente ?>', '<?= $venda->data_cadastrado ?>', '<?= $venda->valor ?>', '<?= $venda->status ?>', '<?= $venda->observacoes ?>')"></i>
                          </td>
                              
                      </tr>


                    <?php } ?>

                    
                    
                     
                      
                    </tbody>
                    
          </table>
        </div>
      </div>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>

                                
</html>