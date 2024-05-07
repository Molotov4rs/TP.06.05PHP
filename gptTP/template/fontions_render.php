<?php
// Fonctions de rendu pour afficher les données dans les pages

// Inclure le fichier de fonctions SQL
require_once('./requete_sql/fonctions_sql.php');

// Fonction pour afficher toutes les marques dans un menu déroulant
function get_all_brand() {
  global $conn;
  $query = "SELECT * FROM marque";
  $result = mysqli_query($conn, $query);
  while ($row = mysqli_fetch_assoc($result)) {
    echo "<option value='{$row['id_marque']}'>{$row['nom_marque']}</option>";
  }
}

// Fonction pour afficher tous les jouets en fonction de la marque et du tri
function get_all_toys($brand_id, $order) {
  global $conn;
  $query = "SELECT * FROM jouet";
  if ($brand_id != 0) {
    $query .= " WHERE id_marque = $brand_id";
  }
  if (!empty($order)) {
    $query .= " ORDER BY $order";
  }
  $result = mysqli_query($conn, $query);
  while ($row = mysqli_fetch_assoc($result)) {
    echo "<div>{$row['nom_jouet']}</div>";
  }
}

// Autres fonctions de rendu à ajouter selon les besoins
?>
