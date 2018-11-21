<?php
require_once "config/conexaobanco.class.php";

class VendedorDAO{

    private $conexao = null;

    public function __construct(){
        $this->conexao = ConexaoBanco::getInstance();
    }
    public function __destruct(){}

    public function cadastrarVendedor($vend){
        try{
            $stat=$this->conexao->prepare("insert into vendedor(idVendedor,nome,sobrenome,fone,email,idFilial)values(null,?,?,?,?,?)");

            $stat->bindValue(1, $vend->nome);
            $stat->bindValue(2, $vend->sobrenome);
            $stat->bindValue(3, $vend->fone);
            $stat->bindValue(4, $vend->email);
            $stat->bindValue(5, $vend->idFilial);


            $stat->execute();
        }catch(PDOException $e){
            echo "Erro ao cadastrar vendedor! ".$e;
        }//fecha catch
    }//fecha metodo
}
