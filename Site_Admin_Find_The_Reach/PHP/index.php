<?PHP
date_default_timezone_set('Europe/Paris');
$servername = "ysljzoal";
$username = "Nils";
$password = "VrL3OIhz4ARkCYzGJmwNeFn3wAdkUhG0";
$dbname = "test bd s3";

try {
  $conn = new PDO("pgsql:host=$servername;dbname=$dbname", $username, $password);
  // définir le mode exception d'erreur PDO 
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 
  $id = $mysqli->query("SELECT MAX(IDUSER) FROM user");
  $id = $id + 1;

  $score = 0;

  $sql = "INSERT INTO user_ ( ID_USER , NICKNAME , EMAIL , SCORE , PSW)
  VALUES( .$id. , '.$_POST.[pseudo]' , '.$_POST.[ardmail]', .$score. , '.$_POST.[password]')";
  // utiliser la fonction exec() car aucun résultat n'est renvoyé

  $conn->exec($sql);
  echo "Nouveaux enregistrement ajoutés avec sucéés<br> <a href='index.html'>Retour au formulaire</a>";
} catch(PDOException $e) {
  echo  "<br>" . $e->getMessage();
}
$conn = null;
?>