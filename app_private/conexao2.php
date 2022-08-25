<?php

class Conexao2{

    private $host = 'localhost';
    private $dbname = 'stage_vendas';
    private $user = 'root';
    private $pass = '';

    public function conectar(){
        try {
            $conexao2 = new PDO(
                "mysql:host=$this->host;dbname=$this->dbname",
                "$this->user",
                "$this->pass"
            );
            
            return $conexao2;

        }catch(PDOException $e){
            echo '<p>'.$e->getMessege().'</p>';
        }
    }
}