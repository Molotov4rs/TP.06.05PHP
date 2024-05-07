<div class="navbar">
  <a href="index.php">Accueil</a>
  <div class="dropdown">
    <button class="dropbtn">Par console</button>
    <div class="dropdown-content">
      <?php 
      // Récupération de la liste des consoles depuis la base de données
      $consoles = get_all_consoles();
      foreach ($consoles as $console) {
        $console_id = $console['console_id'];
        $console_name = $console['console_name'];
        $console_count = get_game_count_by_console($console_id);
        echo "<a href='liste.php?console_id=$console_id'>$console_name ($console_count)</a>";
      }
      ?>
    </div>
  </div>
</div>
