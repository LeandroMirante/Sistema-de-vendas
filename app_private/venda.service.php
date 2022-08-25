<?php
//CRUD
class VendaService{

    private $conexao;
    private $venda;

    public function __construct(Conexao $conexao,Venda $venda){
        $this->conexao = $conexao->conectar();
        $this->venda = $venda;
    }

    public function inserir(){
        $query = 'insert into vendas(produto,quantidade,cliente,valor,status,data_cadastrado,observacoes)value(:produto,:quantidade,:cliente,:valor,:status,:data_cadastro,:observacoes)';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':produto', $this->venda->__get('produto'));
        $stmt->bindValue(':quantidade', $this->venda->__get('quantidade'));
        $stmt->bindValue(':cliente', $this->venda->__get('cliente'));
        $stmt->bindValue(':valor', $this->venda->__get('valor'));
        $stmt->bindValue(':status', $this->venda->__get('status'));
        $stmt->bindValue(':data_cadastro', $this->venda->__get('data_cadastrado'));
        $stmt->bindValue(':observacoes', $this->venda->__get('observacoes'));
        $stmt->execute();

    }
    public function recuperar(){
        $query ='
        select 
            v.id, v.produto, v.quantidade, v.cliente, v.valor, s.status, v.data_cadastrado, v.observacoes
        from 
            vendas as v 
            left join status_venda as s on (v.status = s.id)
        ';
        $stmt = $this->conexao->prepare($query);
        $stmt -> execute();
        return $stmt -> fetchAll(PDO::FETCH_OBJ);


        
    }
    public function atualizar(){

        $query = "
        update 
            vendas set 
                produto = :produto,
                quantidade = :quantidade,
                cliente = :cliente,
                valor = :valor,         
                status = :status,         
                data_cadastrado = :data_cadastrado,        
                observacoes = :observacoes
        where 
            id = :id";
        
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':produto', $this->venda->__get('produto'));
        $stmt->bindValue(':quantidade', $this->venda->__get('quantidade'));
        $stmt->bindValue(':cliente', $this->venda->__get('cliente'));
        $stmt->bindValue(':valor', $this->venda->__get('valor'));
        $stmt->bindValue(':status', $this->venda->__get('status'));
        $stmt->bindValue(':data_cadastrado', $this->venda->__get('data_cadastrado'));
        $stmt->bindValue(':observacoes', $this->venda->__get('observacoes'));
        $stmt->bindValue(':id', $this->venda->__get('id'));
        return $stmt->execute();
        
    }
    public function remover(){

        $query = "delete from vendas where id = :id";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue('id', $this->venda->__get('id'));
        $stmt->execute();
        
    }
}