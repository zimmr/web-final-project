<?php
require_once "config/conexaobanco.class.php";

class AutomovelDAO{

    private $conexao = null;

    public function __construct(){
        $this->conexao = ConexaoBanco::getInstance();
    }
    public function __destruct(){}

    public function cadastrarAutomovel($auto){
        try{
            $stat=$this->conexao->prepare("insert into automovel(idCarro,marca,modelo,cor,ano,placa,km,combustivel,portas,cambio,preco,idFilial)values(null,?,?,?,?,?,?,?,?,?,?,?)");

            $stat->bindValue(1, $auto->marca);
            $stat->bindValue(2, $auto->modelo);
            $stat->bindValue(3, $auto->cor);
            $stat->bindValue(4, $auto->ano);
            $stat->bindValue(5, $auto->placa);
            $stat->bindValue(6, $auto->km);
            $stat->bindValue(7, $auto->combustivel);
            $stat->bindValue(8, $auto->portas);
            $stat->bindValue(9, $auto->cambio);
            $stat->bindValue(10, $auto->preco);
            $stat->bindValue(11, $auto->idFilial);

            $stat->execute();
        }catch(PDOException $e){
            echo "Erro ao cadastrar automovel! ".$e;
        }//fecha catch
    }//fecha metodo

    public function buscarAutomoveis(){
        try{
            $stat = $this->conexao->query("select * from automovel");
            $array = $stat->fetchAll(PDO::FETCH_CLASS, "Automovel");
            return $array;
        }catch(PDOException $e){
            echo "Erro ao buscar automóveis!".$e;
        }//fecha catch
    }//fecha método
    
    public function filtrar($filtro, $pesquisa){
        try{
            $query = "";
            switch($filtro){
            case "codigo":
                $query = "where idCarro=".$pesquisa;
                break;
            case "modelo":
                $query="where modelo like '%".$pesquisa."%'";
                break;
            case "marca":
                $query="where marca like '%".$pesquisa."%'";
                break;
            case "cor":
                $query="where cor like '%".$pesquisa."%'";
                break;
            case "ano":
                $query="where ano like '%".$pesquisa."%'";
                break;
            case "combustivel":
                $query="where combustivel like '%".$pesquisa."%'";
                break;
            case "cambio":
                $query="where cambio like '%".$pesquisa."%'";
                break;
            }//fecha switch

            if(empty($pesquisa)){
                $query = "";
            }

            $stat = $this->conexao->query("select * from automovel ".$query);
            $array = $stat->fetchAll(PDO::FETCH_CLASS, "Automovel");
            return $array;
        }catch(PDOException $e){
            echo "Erro ao filtrar automoveis!".$e;
        }//fecha catch
    }//fecha filtrar

    public function deletarAutomovel($id){
        try{
            $stat = $this->conexao->prepare("delete from automovel where idCarro = ?");
            $stat->bindValue(1, $id);
            $stat->execute();
        }catch(PDOException $e){
            echo "Erro ao deletar automóvel!".$e;
        }
    }//fecha deletarAutomovel
}
