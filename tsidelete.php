<?php
require_once 'tsidb_connection.php';

//To Handle Delete Logic
try {
  $delete_query = "DELETE FROM tsi_user_registrations 
    WHERE user_id = 3;";

  $stmt = $pdo->prepare($delete_query);


  $stmt->execute();
  $pdo = null;
  $stmt = null;
  die();
} catch (PDOException $e) {
  die("Error : " . $e->getMessage());
}
