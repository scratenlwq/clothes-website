<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ürünler</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 90%;
            margin: auto;
            overflow: hidden;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #333;
            color: #fff;
            padding: 10px 0;
        }
        .header h1 {
            margin: 0;
            padding-left: 20px;
        }
        .header .auth {
            margin-right: 20px;
            position: relative;
        }
        .auth i {
            cursor: pointer;
            font-size: 24px;
        }
        .auth-form {
            display: none;
            position: absolute;
            top: 50px;
            right: 0;
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            z-index: 1000;
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 300%;
        }
        .auth-form input[type="text"],
        .auth-form input[type="password"],
        .auth-form input[type="submit"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            box-sizing: border-box;
        }
        .auth-form input[type="submit"] {
            width: auto;
        }
        .auth-form.register-form, .auth-form.login-form {
            display: none;
        }
        .products {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }
        .product {
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            width: calc(33.333% - 40px);
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .product img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
            max-height: 150px;
        }
        .product h2 {
            margin: 10px 0;
            font-size: 1.25em;
            text-align: center;
        }
        .product p {
            margin: 5px 0;
            text-align: center;
        }
        .product .price {
            color: #b12704;
            font-weight: bold;
        }
        

    </style>
</head>
<body>
    <div class="header">
        <h1>Ürünler</h1>
        <div class="auth">
            <?php
            session_start();
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                echo "<a href='logout.php'><i class='fas fa-sign-out-alt'></i></a>";
            } else {
                echo "<i class='fas fa-user' onclick=\"document.querySelector('.login-form').style.display = 'block'; document.querySelector('.register-form').style.display = 'none';\"></i> | ";
                echo "<i class='fas fa-user-plus' onclick=\"document.querySelector('.register-form').style.display = 'block'; document.querySelector('.login-form').style.display = 'none';\"></i>";
            }
            ?>
            <div class="auth-form login-form" style="display: none;">
                <form action="login.php" method="post">
                    <input type="text" name="username" placeholder="Kullanıcı Adı" required autocomplete="off">
                    <input type="password" name="password" placeholder="Şifre" required>
                    <input type="submit" value="Giriş Yap">
                </form>
            </div>

            <div class="auth-form register-form" style="display: none;">
                <form action="register.php" method="post">
                    <input type="text" name="username" placeholder="Kullanıcı Adı" required autocomplete="off">
                        <input type="password" name="password" placeholder="Şifre" required>
                        <input type="submit" value="Kayıt Ol">
                </form>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="products">
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "swiss_collection";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Bağlantı hatası: " . $conn->connect_error);
        }

        $sql = "SELECT product_id, product_name, price, product_desc, product_image FROM product";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div class='product'>";
                echo "<img src='" . htmlspecialchars($row["product_image"]) . "' alt='" . htmlspecialchars($row["product_name"]) . "'>";
                echo "<h2>" . htmlspecialchars($row["product_name"]) . "</h2>";
                echo "<p class='price'>Fiyat: " . htmlspecialchars($row["price"]) . " TL</p>";
                echo "<p>" . htmlspecialchars($row["product_desc"]) . "</p>";
                echo "</div>";
            }
        } else {
            echo "<p>0 sonuç</p>";
        }

        $conn->close();
        ?>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>
