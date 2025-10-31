<?php
require_once 'tsidb_connection.php';

    //Handle Update Logic
    try {
        $update_query = "UPDATE tsi_user_registrations SET 
        user_name = 'foomoo', user_email = 'foomoo@gmail.com'  WHERE user_id = 2;";

        $stmt = $pdo->prepare($update_query);

        $stmt->execute();

        $pdo = null;
        $stmt = null;
        die();
    } catch (PDOException $e) {
        die("Error :" . $e->getMessage());
    }
