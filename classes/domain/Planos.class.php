<?php

class Planos{
    private $id;
    private $carteirinha;
    private $plano;
    private $pessoasid;

    public function __construct($carteirinha, $plano, $pessoasid)
    {
        $this->carteirinha = $carteirinha;
        $this->plano = $plano;
        $this->pessoasid = $pessoasid;
    }


    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
    public function getCarteirinha()
    {
        return $this->carteirinha;
    }
    public function setCarteirinha($carteirinha)
    {
        $this->carteirinha = $carteirinha;

        return $this;
    }
    public function getPlano()
    {
        return $this->plano;
    }
    public function setPlano($plano)
    {
        $this->plano = $plano;

        return $this;
    }
    public function getPessoasid()
    {
        return $this->pessoasid;
    }
    public function setPessoasid($pessoasid)
    {
        $this->pessoasid = $pessoasid;

        return $this;
    }
}



?>