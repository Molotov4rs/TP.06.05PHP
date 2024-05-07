<?php require_once('./requete_sql/connexion.php') ?>
<?php require_once('./requete_sql/fonctions_sql.php') ?>
<?php require_once('./template/fonctions_render.php') ?>

<?php require_once('./template/_header.php') ?>
<?php require_once('./template/_navbar.php') ?>

<?php 
// Récupération de l'id du jeu depuis l'URL
$game_id = intval($_GET['game_id']);
?>

<h1>Détail du Jeu</h1>
<div class="d-flex flex-wrap justify-content-center">
  <?php get_game_details($game_id) ?>
</div>

<?php require_once('./template/_footer.php') ?>
