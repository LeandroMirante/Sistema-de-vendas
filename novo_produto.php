<!doctype html>

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
            <h2>Novo produto</h2>
			<form method="post" action="produto_controller.php?acao=inserir">
				<div class="mb-3">
					<label for="novo_produto" class="form-label">Produto</label>
					<input id="nome_produto" name="nome_produto" type="text" class="form-control" placeholder="Nome do produto" aria-label="First name">
				</div>

				<div class="row mb-3">
					<div class="col">
						<label for="quantidade_venda" class="form-label">Quantidade</label>
						<input id="quantidade" name="quantidade" type="text" class="form-control" placeholder="Quantidade em estoque" aria-label="First name">
					</div>

					<div class="col">
						<label for="valor" class="form-label">Valor de compra</label>
						<input id="valor_compra" name="valor_compra" type="text" class="form-control" placeholder="Valor de compra" aria-label="First name">
					</div>

					<div class="col">
						<label for="cliente_venda" class="form-label">Valor de venda</label>
						<input id="valor_venda" name="valor_venda" type="text" class="form-control" placeholder="Valor de venda" aria-label="First name">
					</div>
					
				</div>

				<button type="submit" class="btn btn-primary">Cadastrar produto</button>
			</form>
		</div>

        
      </div>

      


    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>