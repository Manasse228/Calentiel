<?php

include_once 'User.php';

class Message{

    private $id;
    protected $expediteur;
    protected $destinataire;
    protected $dateEnvoi;
    protected $sujet;
    protected $message;


    public function __construct(){

        $num = func_num_args();

        switch ($num) {
            case 6:
                $this->id = func_get_arg(0);
                if(func_get_arg(1) instanceof User){
                    $this->expediteur = func_get_arg(1);
                }
                if(func_get_arg(2) instanceof User){
                    $this->destinataire = func_get_arg(2);
                }
                $this->dateEnvoi = func_get_arg(3);
                $this->sujet = func_get_arg(4);
                $this->message = func_get_arg(5);
                break;

            case 5:
                if(func_get_arg(0) instanceof User){
                    $this->expediteur = func_get_arg(0);
                }
                if(func_get_arg(1) instanceof User){
                    $this->destinataire = func_get_arg(1);
                }
                $this->id = func_get_arg(2);
                $this->id = func_get_arg(3);
                $this->id = func_get_arg(4);
                break;

            default:
        }

    }


    public function getId(){
        return $this->id;
    }


    public function getExpediteur()
    {
        return $this->expediteur;
    }

    public function setExpediteur($expediteur){

        if($expediteur instanceof User){
            $this->expediteur = $expediteur;
        }

    }


    public function getDestinataire()
    {
        return $this->destinataire;
    }


    public function setDestinataire($destinataire){

        if($destinataire instanceof User){
            $this->destinataire = $destinataire;
        }

    }


    public function getDateEnvoi()
    {
        return $this->dateEnvoi;
    }


    public function setDateEnvoi($dateEnvoi)
    {
        $this->dateEnvoi = $dateEnvoi;
    }


    public function getSujet()
    {
        return $this->sujet;
    }


    public function setSujet($sujet)
    {
        $this->sujet = $sujet;
    }


    public function getMessage()
    {
        return $this->message;
    }

    public function setMessage($message)
    {
        $this->message = $message;
    }



}