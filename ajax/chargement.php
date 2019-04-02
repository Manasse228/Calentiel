<?php
include_once '../mvc/controleur/autoload.php';
$pdo = Connection::getConnexion();

if(isset($_POST['type'])){

    switch ($_POST['type']){

        case  "Chargement_Evenement":
            if( isset($_POST['id']) ){
                $evenementManager = new  EvenementManager($pdo);
                $tab =  $evenementManager->getEvenementsByType($_POST['id']);
                $design = "<option value=''> -- Selectionner --</option>";
                foreach ($tab as $tab_value){
                    foreach ($tab_value as $key => $value){
                        $design .= "<option value='".$key."'>".$value."</option>";
                    }
                }
                echo $design;
            }


            break;


        default:


            break;

    }

}


?>