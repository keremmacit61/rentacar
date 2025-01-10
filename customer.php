<?php
    include '../db.php';

    $sql = "SELECT * FROM customers"; 
    $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Müşteri Listeleme</title>
    <link rel="stylesheet" href="../style.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f4f4f4;
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        thead {
            background-color: #1abc9c;
            color: white;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            text-transform: uppercase;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        img {
            width: 100px;
            height: auto;
            border-radius: 5px;
        }

        .details-btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #1abc9c;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .details-btn:hover {
            background-color: #16a085;
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
    <div class="container">
        <h1>Müşteriler</h1>
        <table>
            <thead>
                <tr>
                    <th>Ad Soyad</th>
                    <th>E-posta</th>
                    <th>Telefon</th>
                    <th>Adres</th>
                    <th>İşlem</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['nameSurname']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['mail']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['tel']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['adres']) . "</td>";
                        echo "<td><a href='#' class='details-btn'>Sil</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Hiç müşteri bulunamadı.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
