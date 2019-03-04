<?php
$liste_pages = array(
  'Quiberon vers Le Palais' => 'page.php',
  'Le Palais vers Quiberon' => 'index.php?page=X',
  'Quiberon vers Sauzon' => 'dossier/page.html'
  'Sauzon vers Quiberon' => 'page.php',
  'Vannes vers Le Palais' => 'index.php?page=X',
  'Le Palais vers Vannes' => 'dossier/page.html'
  'Quiberon vers Port St Gildas' => 'page.php',
  'Port St Gildas vers Quiberon' => 'index.php?page=X',
  'Lorient vers Port-Tudy' => 'dossier/page.html'
  'Port-Tudy vers Lorient' => 'page.php',
);

if(!empty($_POST['redir']) AND in_array($_POST['redir'], $liste_pages)){
  header('Location: '.$_POST['redir']);
  exit();
}

echo '<form action="" method="post">
  <div>
    <select name="redir" onchange="if(this.value.length != 0) window.location = this.value;">
      <option value="">Pages</option>'.PHP_EOL;
foreach($liste_pages as $nom => $url)
  echo '      <option value="'.$url.'">'.$nom.'</option>'.PHP_EOL;
echo '    </select> <input type="submit" value="Go" />
  </div>
</form>';
?>