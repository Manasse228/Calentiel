<?php

include_once 'Evenement.php';
include_once 'User.php';


class Participation{

    private $id;
    protected $evenement;
    protected $user;


    public function __construct($id){

        $num = func_num_args();

        switch ($num) {
            case 3:
                $this->id = func_get_arg(0);
                if(func_get_arg(1) instanceof Evenement){
                    $this->evenement = func_get_arg(1);
                }
                if(func_get_arg(2) instanceof User){
                    $this->user = func_get_arg(2);
                }
                break;

            case 2:
                if(func_get_arg(1) instanceof Evenement){
                    $this->evenement = func_get_arg(0);
                }
                if(func_get_arg(2) instanceof User){
                    $this->user = func_get_arg(1);
                }
                break;

            default:
        }

    }


    public function getId(){
        return $this->id;
    }


    public function getEvenement()
    {
        return $this->evenement;
    }


    public function setEvenement($evenement){

        if($evenement instanceof Evenement){
            $this->evenement = $evenement;
        }

    }


    public function getUser()
    {
        return $this->user;
    }


    public function setUser($user){

        if($user  instanceof User){
            $this->user = $user;
        }

    }



}