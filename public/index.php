<?php
// si le controller est defini
if(!empty($_GET['controller']))
{
    $controller = $_GET['controller'];
}
else
{
    $controller = 'home';
}

//si le controlleur est defini on verifie que le fichier Maj.'Controller.php' existe
if(file_exists('../src/controller/' . ucfirst($controller) . 'Controller.php'))
{
    require '../src/controller/' . ucfirst($controller) . 'Controller.php';

    // on check si l'action est parametré
    if(!empty($_GET['action']))
    {
        $action = $_GET['action'];
    }

    else
    //si action n'est pas defini on donne a $action la valeur index
    {
        $action = 'index';
    }

    // si le parametre 'action' est defini on verifie si la methode existe
    $Namecontroller = ucfirst($controller) . 'Controller';
    $item = new $Namecontroller;
    if(method_exists($item, $action))
    // si la methode $action ( donc index()) existe on renvoi vers index()
    {
        
        $item->$action(); 
    }
    // si l'action entrée en url n'existe pas on affiche erreur
    else{
        header("HTTP/1.1 404 Not Found");
        echo "Erreur2 404 Not Found";
    }

}
// si le controller Maj.'Controller.php' n'existe pas on renvoie une erreur
else
{
    header("HTTP/1.1 404 Not Found");
    echo "Erreur1 404 Not Found";
}
?>
