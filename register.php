<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "swiss_collection";

// Veritabanına bağlantı oluşturma
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    // Kullanıcı adı kontrolü
    $check_sql = "SELECT * FROM users WHERE username = '$username'";
    $check_result = $conn->query($check_sql);

    if ($check_result->num_rows > 0) {
        echo "Bu kullanıcı adı zaten mevcut.";
    } else {
        // Kullanıcı ekleme
        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
        if ($conn->query($sql) === TRUE) {
            echo "Kayıt başarıyla tamamlandı.";
            header("Location: index.php");
        } else {
            echo "Hata: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>
