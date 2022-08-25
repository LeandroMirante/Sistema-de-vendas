<?php

class Venda{
    private $id;
    private $produto;
    private $quantidade;
    private $cliente;
    private $valor;
    private $status;
    private $data_cadastrado;
    private $observacoes;

    public function __get($attr){
        return $this->$attr;
    }

    public function __set($attr, $valor){
        $this->$attr = $valor;
    }
}


						
