<?php require_once('./requete_sql/connexion.php') ?>
<?php require_once('./requete_sql/fonctions_sql.php') ?>
<?php require_once('./template/fonctions_render.php') ?>

<?php require_once('./template/_header.php') ?>
<?php require_once('./template/_navbar.php') ?>

<h1>Liste des Jeux</h1>
<div class="d-flex flex-wrap justify-content-center">
  <?php get_all_games() ?>
</div>

<?php require_once('./template/_footer.php') ?>
