<?php
require_once "config/conexaobanco.class.php";

class FilialDAO{

    private $conexao = null;

    public function __construct(){
        $this->conexao = ConexaoBanco::getInstance();
    }
    public function __destruct(){}

    public function cadastrarFilial($f){
        try{
            $stat = $this->conexao->prepare("insert into filial(idFilial,nome,cidade,endereco,fone,email)values(null,?,?,?,?,?)");
            
            $stat->bindValue(1, $f->nome);
            $stat->bindValue(2, $f->cidade);
            $stat->bindValue(3, $f->endereco);
            $stat->bindValue(4, $f->fone);
            $stat->bindValue(5, $f->email);

            $stat->execute();
        }catch(PDOException $e){
            echo "Erro ao cadastrar!".$e;
        }
    }
}
