<?php
include_once 'mvc/controleur/autoload.php';
session_start();

?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Publier un évènement (suite) </title>

    <?php include 'include/headerfile.php' ?>


    <link href="css/upload.css" rel="stylesheet"/>

    <link rel="stylesheet" href="css/pulierArticle.css">


    <script type="text/javascript" src="js/upload.js"></script>

</head>
<body>


<?php include 'include/navbar.php' ;



ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$target_path = "images/";
$tab = array();


if (($_SERVER['REQUEST_METHOD'] == 'POST') && ($_POST['submitPublication'] == 'valider')) {

    global $target_path, $tab;
    $tab = array();

    for ($i = 0; $i < count($_FILES['file_couv']['name']); $i++) {

        $ext = explode('.', basename($_FILES['file_couv']['name'][$i]));
        $file_extension = end($ext);

        $newFileName = md5(uniqid()) . "." . $file_extension;

        $tab[] = ["typePhoto" => 1, "fileName" => $newFileName];

        if (move_uploaded_file($_FILES['file_couv']['tmp_name'][$i], $target_path . $newFileName)) {
        } else {
             echo  "<span id='error'>Erreur lors d'envoi du fichier au serveur! Ressayer </span><br/><br/>";
        }

    }

    for ($i = 0; $i < count($_FILES['file_spon']['name']); $i++) {

        $ext = explode('.', basename($_FILES['file_spon']['name'][$i]));
        $file_extension = end($ext);

        $newFileName = md5(uniqid()) . "." . $file_extension;

        $tab[] = ["typePhoto" => 3, "fileName" => $newFileName];

        if (move_uploaded_file($_FILES['file_spon']['tmp_name'][$i], $target_path . $newFileName)) {
        } else {
            // echo  "<span id='error'>Erreur lors d'envoi du fichier au serveur! Ressayer </span><br/><br/>";
        }

    }

    for ($i = 0; $i < count($_FILES['file_autr']['name']); $i++) {

        $ext = explode('.', basename($_FILES['file_autr']['name'][$i]));
        $file_extension = end($ext);

        $newFileName = md5(uniqid()) . "." . $file_extension;

        $tab[] = ["typePhoto" => 4, "fileName" => $newFileName];

        if (move_uploaded_file($_FILES['file_autr']['tmp_name'][$i], $target_path . $newFileName)) {
        } else {
            // echo  "<span id='error'>Erreur lors d'envoi du fichier au serveur! Ressayer </span><br/><br/>";
        }
    }


    for ($i = 0; $i < count($_FILES['file_rep']['name']); $i++) {

        $ext = explode('.', basename($_FILES['file_rep']['name'][$i]));
        $file_extension = end($ext);

        $newFileName = md5(uniqid()) . "." . $file_extension;

        $tab[] = ["typePhoto" => 5, "fileName" => $newFileName];

        if (move_uploaded_file($_FILES['file_rep']['tmp_name'][$i], $target_path . $newFileName)) {
        } else {
            // echo  "<span id='error'>Erreur lors d'envoi du fichier au serveur! Ressayer </span><br/><br/>";
        }

    }


    $pdo = Connection::getConnexion();

    $evenementManager = new EvenementManager($pdo);
    $photoManager = new PhotosManager($pdo);

    $evenementManager->createEvenement($_SESSION['Evenement'], $tab);
    unset($_SESSION['Evenement']);

    $msg = new FlashMessages();
    $msg->success('Votre évènement est pris en compte avec succés;', 'index.php');



}

?>


<form class="form-horizontal" id="formPubSuite" enctype="multipart/form-data" method="post"
      action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI'], ENT_QUOTES); ?>">
    <fieldset>


        <legend>Publication d'évènement (2/2)</legend>

        <div class="row">

            <div class="col-xs-12 col-md-12 col-lg-3">

                <div class="form-group">
                    <h4>Photo de couverture</h4>
                    <div id="filediv_couv">
                        <input class="form-control" accept="image/*"
                               name="file_couv[]" type="file" id="file_couv"/></div>
                </div>
                <br/>
                <input type="button" id="add_more_couv" class="upload" value="Plus de photos"/>

            </div>


            <div class="col-xs-12 col-md-12 col-lg-3 ">

                <div class="form-group">
                    <h4>Sponsor</h4>
                    <div id="filediv_spon"><input accept="image/*"
                                                  name="file_spon[]" type="file" id="file_spon"/></div>
                </div>
                <br/>
                <input type="button" id="add_more_spon" class="upload" value="Plus de photos"/>

            </div>

            <div class="col-xs-12 col-md-12 col-lg-3 ">

                <div class="form-group">
                    <h4>Photo représentative</h4>
                    <div id="filediv_rep">
                        <input accept="image/*" id="file_rep" type="file"
                               class="form-control" name="file_rep[]"/>
                    </div>
                </div>

                <br/>

            </div>

            <div class="col-xs-12 col-md-12 col-lg-3">

                <div class="form-group">
                    <h4>Autres</h4>
                    <div id="filediv_autr"><input accept="image/*" name="file_autr[]"
                                                  type="file" id="file_autr"/></div>
                </div>

                <br/>
                <input type="button" id="add_more_autr" class="upload" value="Plus de photos"/>
            </div>


        </div>
        <br/>


        <div class="form-group">
            <label class="col-md-4 control-label"></label>
            <div class="col-md-8">

                <button onclick="window.location.href='nvoeve.php'; return false;"
                        type="button" class="btn btn-warning btn-lg btn3d">
                    <span class="glyphicon glyphicon-arrow-left"></span> Retour
                </button>

                <button type="submit" class="btn btn-success btn-lg btn3d" data-loading-text="Enregistrement ..."
                        id="valider" name="submitPublication" value="valider">
                    <span class="glyphicon glyphicon-ok"></span> Valider
                </button>

            </div>
        </div>

    </fieldset>
</form>


<?php


?>


</body>
</html>
