
<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=volca", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
  $stmt = $conn->prepare("SELECT * FROM flights");
  $stmt->execute();
  foreach ($stmt->fetchAll() as $key => $value) {
      echo $value['departure'];
      echo '<br>';
  }
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>