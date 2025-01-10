<?php
    include '../db.php';

    // Form gönderildiyse verileri al ve veritabanına ekle
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Formdan gelen verileri al
        $nameS = $_POST['nameSurname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $adres = $_POST['adres'];

        // SQL sorgusu
        $sql = "INSERT INTO customers (nameSurname, mail, tel, adres) 
                VALUES ('$nameS','$email', '$phone', '$adres')";

        // Sorguyu çalıştır ve kontrol et
        if ($conn->query($sql) === TRUE) {
            header("Location:customer.php");
        } else {
            echo "Hata: " . $sql . "<br>" . $conn->error;
        }
    }
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Müşteri Ekleme Formu</title>
    <link rel="stylesheet" href="../style.css">
    <style>
        /* Genel stil ayarları */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
            color: #555;
        }

        input[type="text"],
        input[type="email"],
        input[type="phone"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0 20px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #5cb85c;
            color: white;
            border: none;
            padding: 12px;
            width: 100%;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #4cae4c;
        }

        /* Hata mesajı için stil */
        .error {
            color: red;
            font-size: 14px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
<div class="sidebar">
        <h2>Menü</h2>
        <ul>
            <li><a href="#">Anasayfa</a></li>
            <li><a href="cars.php">Araçlar</a></li>
            <li><a href="customer.php">Müşteriler</a></li>
            <li><a href="customer-add.php">Müşteri Ekle</a></li>
        </ul>
    </div>
<div class="form-container">
    <h2>Müşteri Ekleme Formu</h2>

    <form action="customer-add.php" method="post">
        <label for="name">Ad-Soyad:</label>
        <input type="text" id="name" name="nameSurname" required>
        
        
        <label for="email">E-posta:</label>
        <input type="email" id="email" name="email" required>
        
        <label for="phone">Telefon:</label>
        <input type="text" id="phone" name="phone" required>

        <label for="adres">Adres:</label>
        <input type="text" id="adres" name="adres" required>


        <input type="submit" name="btn-customer-add" value="Müşteri Ekle">
    </form>
</div>

</body>
</html>
