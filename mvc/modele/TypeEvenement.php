<?php


class TypeEvenement{

    private $id;
    protected $code;
    protected $libelle;


    public function __construct(){

        $num = func_num_args();

        switch ($num) {
            case 3:
                $this->id = func_get_arg(0);
                $this->code = func_get_arg(1);
                $this->libelle = func_get_arg(2);
                break;

            case 2:
                $this->code = func_get_arg(0);
                $this->libelle = func_get_arg(1);
                break;

            default:
        }


    }


    public function getId()
    {
        return $this->id;
    }


    public function getCode()
    {
        return $this->code;
    }


    public function setCode($code)
    {
        $this->code = $code;
    }


    public function getLibelle()
    {
        return $this->libelle;
    }


    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
    }



}