<?php
//CRUD
class ProdutoService{

    private $conexao;
    private $produto;

    public function __construct(Conexao2 $conexao,Produto $produto){
        $this->conexao = $conexao->conectar();
        $this->produto = $produto;
    }

    public function inserir(){
        $query = 'insert into estoque(nome_produto,quantidade,valor_compra,valor_venda)value(:nome_produto,:quantidade,:valor_compra,:valor_venda)';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':nome_produto', $this->produto->__get('nome_produto'));
        $stmt->bindValue(':quantidade', $this->produto->__get('quantidade'));
        $stmt->bindValue(':valor_compra', $this->produto->__get('valor_compra'));
        $stmt->bindValue(':valor_venda', $this->produto->__get('valor_venda'));
        
        $stmt->execute();

    }
    public function recuperar(){
        $query ='
        select 
            id, nome_produto, quantidade, valor_compra, valor_venda
        from 
            estoque
        ';
        $stmt = $this->conexao->prepare($query);
        $stmt -> execute();
        return $stmt -> fetchAll(PDO::FETCH_OBJ);


        
    }
    public function atualizar(){
        $query = "
        update 
            estoque set 
                nome_produto = :produto,
                quantidade = :quantidade,
                valor_compra = :valor_compra,
                valor_venda = :valor_venda            
        where 
            id = :id";
        
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':produto', $this->produto->__get('nome_produto'));
        $stmt->bindValue(':quantidade', $this->produto->__get('quantidade'));
        $stmt->bindValue(':valor_compra', $this->produto->__get('valor_compra'));
        $stmt->bindValue(':valor_venda', $this->produto->__get('valor_venda'));
        $stmt->bindValue(':id', $this->produto->__get('id'));
        return $stmt->execute();
    }
    public function remover(){
        $query = 'delete from estoque where id = :id';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue('id', $this->produto->__get('id'));
        return $stmt->execute();
    }
}