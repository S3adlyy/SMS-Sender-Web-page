<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $pwd = $_POST["password"];
    $email = $_POST["email"];
    
    try {
        require_once "dbh.inc.php";
        $query = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$username, $email, $pwd]); // Corrected order of parameters
        
        // Close connection and statement properly
        $pdo = null;
        $stmt = null;
        
        // Redirect to index.php after successful insertion
        header("Location: ../index.php");
        exit();
    } catch (PDOException $e) {
        die("Failed: " . $e->getMessage());
    }
} else {
    header("Location: ../index.php");
    exit();
}


 