<?php
  class Automovel{

  private $idCarro;
  private $marca;
  private $modelo;
  private $cor;
  private $ano;
  private $placa;
  private $km;
  private $combustivel;
  private $portas;
  private $cambio;
  private $preco;
  private $idFilial;

  public function __construct(){}
  public function __destruct(){}
  public function __get($a){
    return $this->$a;
  }
  public function __set($a,$v){
    $this->$a = $v;
  }

  public function __tostring(){
    return nl2br("Código: $this->idCarro
                  Marca: $this->marca
                  Modelo: $this->modelo
                  Ano: $this->ano
                  Placa: $this->placa
                  Cor: $this->cor
                  Combustivel: $this->combustivel
                  Km: $this->km
                  Portas: $this->portas
                  Câmbio: $this->cambio");
        }//fecha toString
  }//fecha classe
