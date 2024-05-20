
<?php

$host = 'postgres';
$dbname = 'cadastros';
$user = 'postgres';
$password = 'root';

try {
 
  $pdo = new PDO("pgsql:host=$host;port=5432;dbname=$dbname", $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

  //echo "Conectado no banco de dados!!!";

} catch (PDOException $e) {
  echo "Falha ao conectar ao banco de dados. <br/>";
  die($e->getMessage());
}

?>
