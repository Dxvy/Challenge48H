<?php
session_start();
if (isset($_SESSION['trouvé'])) {
    $response = "<h1 class='text-center color'>Félicitation vous avez trouvé le mot de passe !!!!!!</h1>";
    $flag = "<h4 class='text-center color'>Le flag est : HACKYNOV{Kin0@d3r@T0t3n}</h4>";
    require("../../page/success.html");

} else {
    $response = "<h1 class='text-center color'>Bien essayer petit malin mais il faudra quand meme trouver le mot de passe !!!!!!</h1>";
    $flag = "";
    require("../../page/success.html");
}

