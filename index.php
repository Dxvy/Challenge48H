<?php

$file = 'source/restored/login.json'; 

$data = file_get_contents($file); 

$obj = json_decode($data); ;

$identifiant = $obj[0]->mail;
$mdp = $obj[0]->mdp;

global $error;

function cookie(){
    $tab = ["identifiants"=> "admin", "mot de passe"=>"Hacky'Nov"];
    setcookie("IP",json_encode($tab, JSON_PRETTY_PRINT));
    setcookie("DataBase","U2FsdGVkX19LIsnoCniVwLdyfWigXZM+3tRmk+ouGMzjIEDTZOOLQDObWJsx3NRwmulzCuDeAvIyUYZxyLWCfcBjAeRCF8fIONBoLROEbT/sm5Kr/VP39tGiUHHv8w==");
    setcookie("Conception","U2FsdGVkX1+lXTTLCBx16A/W6hpM+2sv4FBDkmJ+sJ7nDSt9qJgK2FswMVsfWkaU0FQ9zJxuXOypc1J5gKcXTtIvPzc=");
    setcookie("Encryption","U2FsdGVkX1/hQh0ZF76a8c2AHMpwzU3y+55h2yOt0vGiMs2gmAs8l/xcrNZVjG8xDh1sZEba5Ltd24eMxT2yqDUgpvpX4NCM0E6iea8OHGGa2A9dZw==");
}

function send(){
    //vraie id
        if (isset($_POST['bouton'])){
            global $identifiant;
            global $mdp;
            global $error;
            $id = $_POST['id'];
            $mp = $_POST['mdp'];
    
            if ($id == $identifiant && md5($mp) == $mdp) {
                session_start();
                $_SESSION['trouvé'] = 'trouvé';
                header('Location: success/final_challenge.php');
            } 
            else if ($id == "admin" && $mp == "Hacky'Nov" ) {
                setcookie("IP",'aller dans le dossier source !');
                $error = "Dommage tu es tombé dans le panneau 😏";
            }
            else if($id == "win" && $mp == "https://www.youtube.com/watch?v=9M2Ce50Hle8" ) {
                header('Location: page/html/windows.html');
            }
            else if($id == "loose" && $mp == "bienvenue dans la matrice" ) {
                header('Location: page/html/charlie.html');
            }
            else if($id == "ynov" && $mp == "Account@Challenge48H@YNOV" ) {
                header('https://welcome.ynov.com/?utm_source=google&utm_medium=cpc&utm_campaign=14458204205&utm_content=129488735667&utm_term=ynov&aid=599130063975&geo=9109220&campagne_id=7012o000000jx21AAA&utm_id=siege&gclid=CjwKCAiAioifBhAXEiwApzCztroJAPBLtgpJiBUcHc3s0cEbxQ4Q53Bn3MgtiCkUTHnErL-azTYZjhoCKskQAvD_BwE');
            }
            else if($id == "ytrack" && $mp == "les chaussettes de l'archi duchesse sont elles sèches" ) {
                header('https://www.youtube.com/watch?v=QH2-TGUlwu4');
            }            else {
                $error = "⚠️ Erreur d'authentifiaction ⚠️";
            }
        }
    }

cookie();
send();

require("page/html/index.html");


?>

<script src="Script/redirection.js"></script>