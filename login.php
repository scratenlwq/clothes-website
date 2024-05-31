<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "swiss_collection";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $users = $result->fetch_assoc();
        if ($users['adminMode'] == 0) 
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            header("Location: adminPanel.php");
            exit();
        } else {
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            header("Location: index.php");
            exit();
        }
    } else {
        echo "Kullanıcı adı veya şifre yanlış.";
    }


$conn->close();
?>
