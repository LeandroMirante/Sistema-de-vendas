<!doctype html>
<?php
  
  $acao = 'recuperar';
  require "produto_controller.php";

?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de vendas</title>

	<link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel='icon' href='img/icon.png'> 

    <style type="text/css">
      a{
        text-decoration: none;
      }

	  </style>

	  

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
			<h5>Venda cadastrada com sucesso!</h5>
			</div>

			<?php } ?>

    <div class="container app">
      <div class="row">
        <div class="col-md-3">
          <ul class="list-group">
            <li class="list-group-item"><a href="index.php" >Listar Vendas</a></li>
            <li class="list-group-item active"><a href="nova_venda.php">Nova Venda</a></li>
            <li class="list-group-item"><a href="estoque.php">Estoque</a></li>
          </ul>

        </div>

		<div class="col-md-9">
			<form method="post" action="venda_controller.php?acao=inserir">
				<div class="mb-3">
					<label for="produto1" class="form-label">Produto</label>
					<select id='produto_select' class="form-select" name="produto" aria-label="Default select example">
					<option selected>Selecione o produto</option>

					</select>
				</div>

				<div class="row mb-3">
					<div class="col">
						<label for="quantidade_venda" class="form-label">Quantidade</label>

						<select id="quantidade_venda" name="quantidade" class="form-select" aria-label="Default select example">
							<option selected value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8</option>
							<option value="9">9</option>
							<option value="10">10</option>
						</select>
					</div>

					<div class="col">
						<label for="valor" class="form-label">Valor</label>
						<input id="valor" name="valor" type="text" class="form-control" placeholder="Valor da venda" aria-label="First name">
					</div>

					<div class="col">
						<label for="cliente_venda" class="form-label">Cliente</label>
						<input id="cliente_venda" name="cliente" type="text" class="form-control" placeholder="Nome do cliente" aria-label="First name">
					</div>
					
				</div>

				<div class="mb-3">
					<div class="row">
						<div class="col">
							<label for="data_venda" class="form-label">Data</label>
							<input type="date" name="data_cadastro" id="data_venda" class="form-control" placeholder="Data da venda">
						</div>

						<div class="col">
							<label for="status" class="form-label">Status</label>
							<select class="form-select" name="status" aria-label="Default select example">
							<option selected value="2">Pago</option>
							<option value="1">Pendente</option>
							</select>
						</div>
					</div>
				</div>

				<div class="mb-3">
	  				<label for="observacoes_venda">Observações</label>
	  				<input type="text" name="observacoes" id="observacoes_venda" class="form-control" placeholder="Observações">
				</div>

				<button type="submit" class="btn btn-primary">Cadastrar venda</button>
			</form>
		</div>

        
      </div>

      


    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>

  <script>

        let select = document.getElementById('produto_select');
        
        var words = <?php echo json_encode($produtos) ?>;  // don't use quotes

       
        for(var x = 0; x < words.length; x++){
          let option = document.createElement('option')
          option.value = words[x]['nome_produto']
          option.innerHTML = words[x]['nome_produto']         
          select.appendChild(option)
        } 

    </script>
</html>