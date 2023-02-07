<?php
session_start();
if (isset($_SESSION['trouvé'])) {
    $response = "<h1 class='text-center color'>Félicitation vous avez trouvé le mot de passe !!!!!!</h1>";
    $flag = "<img src='../../img/flag.JPG' alt='flag'> <!-- Le mot de passe est 48H -->";
    require("../../page/html/success.html");

} else {
    $response = "<h1 class='text-center color'>Bien essayer petit malin mais il faudra quand meme trouver le mot de passe !!!!!!</h1>";
    $flag = "";
    require("../../page/html/success.html");
}

