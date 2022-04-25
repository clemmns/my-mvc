<?php

if(!empty($_GET['controller']))
{
    $controller = $_GET['controller'];
}
else
{
    $controller = 'home';
}

if(file_exists('controller/' . $controller . '-controller.php'))
{
    require 'controller/' . $controller . '-controller.php';

    if(!empty($_GET['action']))
    {
        $action = $_GET['action'];
    }
    else
    //on donne a $action la valeur index
    {
        $action = 'index';
    }
    
    if(function_exists($action))
    // si la fonction $action ( donc index()) existe on renvoi vers index()
    {
        $action(); 
    }
    // si l'action entrée en url n'existe pas on affiche erreur
    else{
        header("HTTP/1.1 404 Not Found");
        echo "Erreur 404 Not Found";
    }

}
else
{
    header("HTTP/1.1 404 Not Found");
    echo "Erreur 404 Not Found";
}
?>
