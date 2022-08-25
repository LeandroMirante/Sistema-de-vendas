<?php

class Produto{
    private $id;
    private $nome_produto;
    private $quantidade;
    private $valor_compra;
    private $valor_venda;

    public function __get($attr){
        return $this->$attr;
    }

    public function __set($attr, $valor){
        $this->$attr = $valor;
    }
}