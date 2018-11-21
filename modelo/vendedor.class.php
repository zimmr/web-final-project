<?php
class Vendedor{
    private $idVendedor;
    private $nome;
    private $sobrenome;
    private $fone;
    private $email;
    private $idFilial;

    public function __construct(){}
    public function __destruct(){}

    public function __get($a){ return $this->$a;}
    public function __set($a,$v){ $this->$a = $v;}

    public function __tostring(){
        return nl2br("
                  Código: $this->codigo
                  Nome: $this->nome
                  Sobrenome: $this->sobrenome
                  Fone: $this->fone
                  Email: $this->email
                  Filial: $this->idFilial");
    }//fecha toString
}//fecha classe
