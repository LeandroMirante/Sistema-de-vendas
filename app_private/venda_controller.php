<?php

    require "app_private/venda.model.php";
    require "app_private/conexao.php";
    require "app_private/conexao3.php";
    require "app_private/venda.service.php";


    $acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;





    if($acao == 'inserir'){ 

        $venda = new Venda();

        $venda->__set('produto', $_POST['produto']);
        $venda->__set('quantidade', $_POST['quantidade']);
        $venda->__set('cliente', $_POST['cliente']);
        $venda->__set('valor', $_POST['valor']);
        $venda->__set('status', $_POST['status']);
        /*
        $date = date_create($_POST['data_cadastro']);
        $date_format = date_format($date,"d/m/Y");*/

        $venda->__set('data_cadastrado', $_POST['data_cadastro']);

        $venda->__set('observacoes', $_POST['observacoes']);

        $conexao = new Conexao();
        $vendaService = new VendaService($conexao, $venda);

        $vendaService->inserir();

        $conexao3 = new Conexao3();
        $temp = $conexao3->conectar();

        $query = 'update estoque set quantidade = quantidade-? where nome_produto= ?';

        $stmt = $temp->prepare($query);
        $stmt->bindValue(1, $_POST['quantidade']);
        $stmt->bindValue(2,$_POST['produto']);
        $stmt->execute();

        header('Location: nova_venda.php?inclusao=1');

    }else if($acao == 'recuperar'){
        $venda = new Venda();
        $conexao = new Conexao();

        $vendaService = new VendaService($conexao, $venda);

        $vendas = $vendaService->recuperar();


    }else if( $acao == 'atualizar'){

        $venda = new Venda;
        $venda->__set('id',$_POST['id']);
        $venda->__set('produto',$_POST['produto']);
        $venda->__set('quantidade',$_POST['quantidade']);
        $venda->__set('cliente',$_POST['cliente']);
        $venda->__set('valor',$_POST['valor']);
        $venda->__set('status',$_POST['status']);
        $venda->__set('data_cadastrado',$_POST['data_cadastrado']);
        $venda->__set('observacoes',$_POST['observacoes']);

        $conexao = new Conexao();
        $vendaService = new VendaService($conexao, $venda);
        if($vendaService -> atualizar()){
            header('location: index.php');
        }

    }else if($acao == 'remover'){
        $venda = new Venda();
        $venda->__set('id',$_GET['id']);     
        $conexao = new Conexao();

        $vendaService = new VendaService($conexao, $venda);
        $vendaService->remover();
        header('location: index.php');
    }
