<?php
$liste_pages = array(
  'Quiberon vers Le Palais' => 'page.php',
  'Le Palais vers Quiberon' => 'index.php?page=X',
  'Nom page 3' => 'dossier/page.html'
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