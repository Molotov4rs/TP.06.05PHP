<?php require_once('./requete_sql/connexion.php') ?>
<?php require_once('./requete_sql/fonctions_sql.php') ?>
<?php require_once('./template/fonctions_render.php') ?>

<?php require_once('./template/_header.php') ?>
<?php require_once('./template/_navbar.php') ?>

<h1>Accueil</h1>
<form method='POST'>
  <select name="brand" >
    <option value="0">Toutes les marques</option>
    <?php get_all_brand() ?>
  </select>
  <input type="submit" value="OK">
</form>
<div class="d-flex flex-wrap justify-content-center">
  <?php get_all_toys($brand_id, $order) ?>
</div>

<?php require_once('./template/_footer.php') ?>
