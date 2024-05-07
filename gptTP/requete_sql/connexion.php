<?php 

//on déclare nos constantes de connexion à la base de données
define('DB_HOST', 'database');
define('DB_USER', 'admin');
define('DB_PASS', 'admin');
define('DB_NAME', 'toys-r-us');

//on crée la connxion à la base de données
$connexion = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

//on vérifie si la connexion a échoué
if(!$connexion){
    die('Erreur de connexion '.mysqli_connect_error());
}

//on force l'encodage en utf8
mysqli_set_charset($connexion, 'utf8');
