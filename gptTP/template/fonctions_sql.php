<?php
// Fonctions SQL pour interagir avec la base de données

// Inclure le fichier de connexion à la base de données
require_once('connexion.php');

// Fonction pour récupérer toutes les consoles depuis la base de données
function get_all_consoles() {
  global $conn;
  $query = "SELECT * FROM console";
  $result = mysqli_query($conn, $query);
  $consoles = mysqli_fetch_all($result, MYSQLI_ASSOC);
  return $consoles;
}

// Fonction pour récupérer le nombre de jeux disponibles pour une console donnée
function get_game_count_by_console($console_id) {
  global $conn;
  $query = "SELECT COUNT(*) AS count FROM game_console WHERE console_id = $console_id";
  $result = mysqli_query($conn, $query);
  $count = mysqli_fetch_assoc($result)['count'];
  return $count;
}

// Autres fonctions SQL à ajouter selon les besoins
?>
