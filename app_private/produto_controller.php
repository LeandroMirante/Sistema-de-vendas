<?php

    require "app_private/produto.model.php";
    require "app_private/conexao2.php";
    require "app_private/produto.service.php";

    $acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;




//CRUD
    if($acao == 'inserir'){ 
        
        $produto = new Produto();

        $produto->__set('nome_produto', $_POST['nome_produto']);
        $produto->__set('quantidade', $_POST['quantidade']);
        $produto->__set('valor_compra', $_POST['valor_compra']);
        $produto->__set('valor_venda', $_POST['valor_venda']);

        $conexao2 = new Conexao2();
        $produtoService = new ProdutoService($conexao2, $produto);

        $produtoService->inserir();

        header('Location: estoque.php?inclusao=1');

    }else if($acao == 'recuperar'){
        $produto = new Produto();
        $conexao2 = new Conexao2();

        $produtoService = new ProdutoService($conexao2, $produto);

        $produtos = $produtoService->recuperar();


    }else if( $acao== 'atualizar'){
        $produto = new Produto;
        $produto->__set('id',$_POST['id']);
        $produto->__set('nome_produto',$_POST['produto']);
        $produto->__set('quantidade',$_POST['quantidade']);
        $produto->__set('valor_compra',$_POST['valor_compra']);
        $produto->__set('valor_venda',$_POST['valor_venda']);

        $conexao2 = new Conexao2();
        $produtoService = new ProdutoService($conexao2, $produto);
        if($produtoService -> atualizar()){
            header('location: estoque.php');
        }
        
    }else if($acao== 'remover'){

        $produto = new Produto();
        $produto->__set('id',$_GET['id']);     
        $conexao2 = new Conexao2();

        $produtoService = new ProdutoService($conexao2, $produto);
        $produtoService->remover();
        header('location: estoque.php');

    }
