<?php
class Filial{
    private $idFilial;
    private $nome;
    private $cidade;
    private $endereco;
    private $fone;
    private $email;

    public function __construct(){}
    public function __destruct(){}

    public function __get($a){
        return $this->$a;
    }
    
    public function __set($a,$v){
        $this->$a = $a;
    }
    
    public function __toString(){
        return nl2br("Código: $this->idFilial
                      Nome: $this->nome
                      Cidade: $this->cidade
                      Endereco: $this->endereco
                      Telefone: $this->fone
                      E-Mail: $this->email");
    }
}
