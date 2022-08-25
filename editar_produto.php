<!doctype html>

<?php
  
  $acao = 'recuperar';
  require "produto_controller.php";
  

  function verificaGet($attr){
    if(isset($_GET[$attr])){
      return $_GET[$attr];
    }else{
      return '';
    }
  }


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
        <h2 class="mb-3">Editar Produto</h2>
        <form method="post" action="produto_controller.php?acao=atualizar">
          <div class="mb-3">

            <label for="produto" class="form-label">Produto</label>
            <input value='<?=$_GET['nome_produto']?>' id="produto" name="produto" type="text" class="form-control" placeholder="Nome do produto" aria-label="First name">
          </div>

          <div class="row mb-3">
            <div class="col">
              <label for="quantidade_venda" class="form-label">Quantidade</label>
              <input value=<?= $_GET['quantidade'] ?> id="quantidade" name="quantidade" type="text" class="form-control" placeholder="Quantidade em estoque" aria-label="First name">
            </div>

            <div class="col">
              <label for="valor" class="form-label">Valor de compra</label>
              <input value=<?= $_GET['valor_compra'] ?> id="valor_compra" name="valor_compra" type="text" class="form-control" placeholder="Valor de compra" aria-label="First name">
            </div>

            <div class="col">
              <label for="cliente_venda" class="form-label">Valor de venda</label>
              <input value=<?= $_GET['valor_venda'] ?> id="valor_venda" name="valor_venda" type="text" class="form-control" placeholder="Valor de venda" aria-label="First name">
            </div>
            
          </div>

          <input type="hidden" name='id' value=<?= $_GET['id'] ?>>

          <button type="submit" class="btn btn-info">Atualizar</button>
			  </form>
		</div>


          
        </div>
      </div>

      


    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>

  <script>
        // Função que retorna os parâmetros encaminhados via GET
        getParameter = (key) => {
        
        // Address of the current window
        address = window.location.search

        // Returns a URLSearchParams object instance
        parameterList = new URLSearchParams(address)

        // Returning the respected value associated
        // with the provided key
        return parameterList.get(key)
        }
        //------------------------------------------------------------

        let select = document.getElementById('produto_select');
        
        var words = <?php echo json_encode($produtos) ?>;  // don't use quotes
        nome_produto = getParameter('nome_produto')

       
        for(var x = 0; x < words.length; x++){
          let option = document.createElement('option')
          option.value = words[x]['nome_produto']
          option.innerHTML = words[x]['nome_produto']         
            if(words[x]['nome_produto'] == nome_produto) {
              option.selected = 1
            }
          select.appendChild(option)
        } 

    </script>

 
</html>